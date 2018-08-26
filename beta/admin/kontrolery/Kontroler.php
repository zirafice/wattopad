<?php
abstract class Kontroler
{

        protected $data = array();
        protected $pohled = "";
        protected $hlavicka = array('titulek' => '', 'klicova_slova' => '', 'popis' => '');
	function __construct($basepath) {
            $this->basepath = $basepath;
        }
                
        abstract function zpracuj($parametry);
        public function vypisPohled(){
            if ($this->pohled){
            	    extract($this->data);
            	    require($this->$basepath."/pohledy/" . $this->pohled . ".phtml");
            }
        }
        public function presmeruj($url){
            header("Location: /$url");
            header("Connection: close");
            exit;
        }
}