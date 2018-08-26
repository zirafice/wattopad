<?php
abstract class Kontroler
{

        protected $data = array();
        protected $pohled = "";
        protected $hlavicka = array('titulek' => '', 'klicova_slova' => '', 'popis' => '');
	function __construct($basepath = "/beta/admin") {
            $this->basepath = $basepath;
        }
                
        abstract function zpracuj($parametry);
        public function vypisPohled(){
            if ($this->pohled){
            	    extract($this->data);
            	    require("pohledy/" . $this->pohled . ".php");
            }
        }
        public function presmeruj($url){
	    $gotoURL = $this->basepath."/".$url;
            header("Location: ".$gotoURL);
//            header("Location: ".$this->basepath."/".$url);
            header("Connection: close");
            exit;
        }
}