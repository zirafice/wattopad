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
    private static $instance;
    public static $config;
    public static $mode;
    public $statement;

    static public function getInstance(){

        if(self::$instance == null){

            // self::$config   = require (APP_DIR.'/config.php');
            self::$mode     = self::$config['mode'](); // TODO: Is this really an error?

            $dbname     = self::$config['database'][self::$mode]['database'];
            $host       = self::$config['database'][self::$mode]['host'];
            $username   = self::$config['database'][self::$mode]['user'];
            $password   = self::$config['database'][self::$mode]['password'];

            $dsn = "mysql:dbname=$dbname;host=$host;charset=utf8";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            self::$instance = new self($dsn, $username, $password, $options); // TODO: construct params
        }
        return self::$instance;
    }

    public function prepareStatement($statement, $driver_options = []){
        $this->statement = $this->prepare($statement, $driver_options);
    }

    public function executeStatement($input_parameters = null){
        return (($this->statement instanceof PDOStatement) ? $this->statement->execute($input_parameters) : false);
    }

    public function processStatement($statement, $input_parameters = null, $driver_options = []){
        $this->prepareStatement($statement, $driver_options);
        return $this->executeStatement($input_parameters);
    }

    public function fetch(){
        return (($this->statement instanceof PDOStatement) ? $this->statement->fetch() : false);
    }

    public function fetchAll(){
        return (($this->statement instanceof PDOStatement) ? $this->statement->fetchAll() : false);
    }

    public function fetchColumn($column_number = 0){
        return (($this->statement instanceof PDOStatement) ? $this->statement->fetchColumn($column_number) : false);
    }

    public function rowCount(){
        return (($this->statement instanceof PDOStatement) ? $this->statement->rowCount() : false);
    }

    public function resetStatement(){
        $this->statement = null;
    }
}