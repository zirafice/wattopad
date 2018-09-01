<?php
mb_internal_encoding("UTF-8");
function autoloadFunkce($trida)
{
        // Kon�� n�zev t��dy �et�zcem "Kontroler" ?
        if (preg_match('/Kontroler$/', $trida)){
                require("kontrolery/" . $trida . ".php");
        } else {
                // Slozka modely nebyla vytvorena, jedna se o preklep?
                require("modely/" . $trida . ".php");
        }
}
spl_autoload_register("autoloadFunkce");
// Zakldani nastaveni a nacteni configu
include 'init.php';

$database = databaseModel::getInstance();

$smerovac = new SmerovacKontroler(BASEPATH);
$smerovac->zpracuj(array($_SERVER['REQUEST_URI']));
$smerovac->vypisPohled();