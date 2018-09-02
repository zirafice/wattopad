<?php
/**
 * Created by PhpStorm.
 * User: krystofkosut
 * Date: 30.08.18
 * Time: 15:23
 */

// PDO Singleton
class databaseModel extends PDO
{
    // Private attributes
    private static  $instance;
    // Public attributes
    public static   $config;
    public static   $mode;

    public          $statement;

    /**
     * get instance of database wrapper
     * @return databaseModel
     */
    static public function getInstance(){

        if(self::$instance == null){

            $config = ''; // Protoze PHP debug byl zmateny kvuli var $config
            self::$mode     = self::$config['mode']();
            // Database connection data
            $database   = self::$config['database'][self::$mode]['database'];
            $host       = self::$config['database'][self::$mode]['host'];
            $username   = self::$config['database'][self::$mode]['user'];
            $password   = self::$config['database'][self::$mode]['password'];

            $dsn = "mysql:dbname=$database;host=$host;charset=utf8"; // TODO: Add charset to config file?
            $options = [
                PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES      => false,
                PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC
            ]; // TODO: Options to config file?

            self::$instance = new self($dsn, $username, $password, $options);
        }
        return self::$instance;
    }

    /**
     *  Prepare query statement to be executed in database
     *
     * @param string $statement
     * @param array $driver_options
     * @return bool
     *
     * @todo Are there any exceptions handled?
     */
    public function prepareStatement($statement, $driver_options = []){
        $this->statement = $this->prepare($statement, $driver_options);
        if ($this->statement == false){
            $this->resetStatement();
            return false;
        }
        return true;
    }

    /**
     * @param null $input_parameters
     * @return bool
     */
    public function executeStatement($input_parameters = null){
        return (($this->statement instanceof PDOStatement) ? $this->statement->execute($input_parameters) : false);
    }

    /**
     * @param $statement
     * @param null $input_parameters
     * @param array $driver_options
     * @return bool
     */
    public function processStatement($statement, $input_parameters = null, $driver_options = []){
        $this->prepareStatement($statement, $driver_options);
        return $this->executeStatement($input_parameters);
    }

    /**
     * @return bool|mixed
     */
    public function fetch(){
        return (($this->statement instanceof PDOStatement) ? $this->statement->fetch() : false);
    }

    /**
     * @return array|bool
     */
    public function fetchAll(){
        return (($this->statement instanceof PDOStatement) ? $this->statement->fetchAll() : false);
    }

    /**
     * @param int $column_number
     * @return bool|mixed
     */
    public function fetchColumn($column_number = 0){
        return (($this->statement instanceof PDOStatement) ? $this->statement->fetchColumn($column_number) : false);
    }

    /**
     * @return bool|int
     */
    public function rowCount(){
        return (($this->statement instanceof PDOStatement) ? $this->statement->rowCount() : false);
    }

    /**
     * Reset stashed statement
     */
    public function resetStatement(){
        $this->statement = null;
    }
}