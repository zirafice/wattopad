<?php
/**
 * Created by PhpStorm.
 * User: krystofkosut
 * Date: 02.09.18
 * Time: 19:09
 */

class beletrieModel
{
    public $transformationArray = array (
        'id'            => 'beletrie_ID',
        'nazev'         => 'nazev',
        'autor'         => 'autor',
        'link'          => 'link',
        'cover'         => 'cover',
        'full'          => 'dokonceno',
        'jazyk'         => 'jazyk',
        'anotace'       => 'popis',
        'genresYes'     => 'zanry',
        'keywords'      => 'keywords',
        'spoilery'      => 'spolery',
        'romantic'      => 'romantika',
        'pocetkap'      => 'pocet_kap',
        'delkakap'      => 'delka_kap',
        'delka'         => 'delka_pribehu',
        'adult_lock'    => 'mature',
        'forma'         => 'forma',
        'lgbt'          => 'lgbt',
        'lgbt_typ'      => 'lgbt_typ',
        'vyznal_lgbt'   => 'lgbt_vyznam',
        'postava'       => 'vic_hl_postav',
        'vek'           => 'vek',
        'pohlavi'       => 'pohlavi',
        'rate_up'       => 'rate_up',
        'rate_down'     => 'rate_down',
        'ratio'         => 'ratio'
    );

    private $table          = 'beletrie';
    private $lgbt_value     = "";

    // TODO: Typ LGBT

    public function insertRow($data){

        foreach( $data as $field => $value ){
            switch ($field) {
                case 'gxg':
                    $this->lgbt_value .= $value.",";
                    // $fields[] = $this->transformationArray['lgbt_typ'];
                    // $values[] = "'".$value."'";
                    break;

                case 'bxb':
                    $this->lgbt_value .= $value.",";
                    // $fields[] = $this->transformationArray['lgbt_typ'];
                    // $values[] = "'".$value."'";
                    break;

                case 'trans':
                    $this->lgbt_value .= $value.",";
                    // $fields[] = $this->transformationArray['lgbt_typ'];
                    // $values[] = "'".$value."'";
                    break;

                case 'asexual':
                    //  $fields[] = $this->transformationArray['lgbt_typ'];
                    // $values[] = "'".$value."'";
                    $this->lgbt_value .= $value.",";
                    break;

                default:
                    $fields[] = $this->transformationArray[$field];
                    $values[] = "'".$value."'";
                    break;

            }
        }
        $fields[] = "lgbt_typ";
        $values[] = "'".$this->lgbt_value."'";

        $fields = ' (' . implode(', ', $fields) . ')';
        $values = '('. implode(', ', $values) .')';


        $query = "INSERT INTO $this->table ";
        $query .= $fields .' VALUES '. $values;

        $database = databaseModel::getInstance();
        return $database->processStatement($query);
    }
}