<?php
/**
 * Created by PhpStorm.
 * User: krystofkosut
 * Date: 02.09.18
 * Time: 17:57
 */


class formModel
{
    private $database;
    private $data;
    private $forms = array(
        'FormBeletrie'  => 'BeletrieForm'
    );


    /**
     * formModel constructor.
     * @param array $data
     */
    public function __construct($data = []){
        $this->database = databaseModel::getInstance();

        foreach($data as $key => $value) {
            if (is_array($value)){
                foreach($value as $key2 => $value2){
                    $this->data[$key][$key2] = strip_tags($value2);
                }
            } elseif($key == 'vek') {
                // protoze '<' to zkurvi
                $this->data[$key] = $value;
            } else {
                $this->data[$key] = strip_tags($value);
            }
        }

        foreach ($this->forms as $name => $function){
            if (isset($this->data[$name])){
                $this->$function();
                continue;
            }
        }

    }

    private function BeletrieForm(){
        unset($this->data['FormBeletrie']);
        $model  = new beletrieModel();
        $result = $model->insertRow($this->data);
        return $result;
    }

}