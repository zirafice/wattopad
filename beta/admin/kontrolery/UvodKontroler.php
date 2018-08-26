<?php
class UvodKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $this->hlavicka['titulek'] = 'Wattopad Uvod';
        $this->pohled = 'uvod';
    }
}
?>
