<?php
mb_internal_encoding("UTF-8");
function autoloadFunkce($trida)
{
        // Konèí název tøídy øetìzcem "Kontroler" ?
        if (preg_match('/Kontroler$/', $trida))
                require("kontrolery/" . $trida . ".php");
        else
                require("modely/" . $trida . ".php");
}
spl_autoload_register("autoloadFunkce");
$smerovac = new SmerovacKontroler("/beta/admin");
$smerovac->zpracuj(array($_SERVER['REQUEST_URI']));
$smerovac->vypisPohled();