<?php
mb_internal_encoding("UTF-8");
function autoloadFunkce($trida)
{
        // Kon�� n�zev t��dy �et�zcem "Kontroler" ?
        if (preg_match('/Kontroler$/', $trida))
                require("kontrolery/" . $trida . ".php");
        else
                require("modely/" . $trida . ".php");
}

$config = include 'config.php';

spl_autoload_register("autoloadFunkce");
$smerovac = new SmerovacKontroler("/wattopad/beta/admin");
$smerovac->zpracuj(array($_SERVER['REQUEST_URI']));
$smerovac->vypisPohled();