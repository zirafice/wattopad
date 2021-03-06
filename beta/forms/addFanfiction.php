<html>
<head>
    <TITLE>WattoPad form add story</TITLE>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Formulare.css">
</head>
<script language="JavaScript">
function shipy()
            {
                if (document.getElementById('noShipID').checked == true)
                {
                   document.getElementById('OCshipID').disabled = true;
                   document.getElementById('OCshipID').checked = false;
                   document.getElementById('canonShipID').disabled = true;
                   document.getElementById('canonShipID').checked = false;
                   document.getElementById('noncanonShipID').disabled = true;
                   document.getElementById('noncanonShipID').checked = false;
                }
		else {
		    document.getElementById('OCshipID').disabled = false;
                    document.getElementById('canonShipID').disabled = false;
                    document.getElementById('noncanonShipID').disabled = false;
		}
            }
function Show() {
    if (document.getElementById("FandomyID").checked == true || document.getElementById("outtype").checked == true) {
        document.getElementById("FandomID").hidden = false;
    } else {
        document.getElementById("FandomID").hidden = true;
    }
    if (document.getElementById("OsobnostiID").checked == true || document.getElementById("outtype").checked == true) {
        document.getElementById("OsobnostID").hidden = false;
    } else {
        document.getElementById("OsobnostID").hidden = true;
    }
    if (document.getElementById("AnimeID").checked == true || document.getElementById("outtype").checked == true) {
        document.getElementById("Anime2ID").hidden = false;
    } else {
        document.getElementById("Anime2ID").hidden = true;
    }
}
function Multiple () {
    if (document.getElementById("intype").checked == true || document.getElementById("outtype").checked == true) {
        document.getElementById("FanTab").multiple = true;
        document.getElementById("OsTab").multiple = true;
        document.getElementById("AnTab").multiple = true;
    }
    else {
        document.getElementById("FanTab").multiple = false;
        document.getElementById("OsTab").multiple = false;
        document.getElementById("AnTab").multiple = false;
    }
}
</script>
<body>
    <h1>Formulář pro přidání fanfikce</h1>
    <hr>
<form name="addFanfiction" method="POST" action="../admin/index.php" enctype="multipart/form-data">
<table cellspacing="5px">
  <tr>
    <td> Název: </td>
    <td><input type="text" name="nazev" size="50" class="pole" required></td>
  </tr><tr>
    <td> Autor: </td>
    <td><input type="text" name="autor" size="50" class="pole" required></td>
  </tr><tr>
    <td> Odkaz: </td>
    <td><input type="text" name="link" size="50" class="pole" required></td>
  </tr><tr>
    <td> Obálka: </td>
    <td><input type="file" name="cover" id="coverID" class="file" accept="image/jpeg"><label class="file">Vyberte soubor</label></td>
  </tr><tr>
    <td> Dokončeno: </td>
    <td class="top"><label class="container"><input type="checkbox" name="full" value="1"><span class="checkmarkOFF">Ne</span><span class="checkmarkON">Ano</span></label></td>
  </tr><tr>
      <td class="volby" style="vertical-align: top;">Jazyk:</td>
    <td class="option volby"><label class="optradio"><input type="radio" name="jazyk" value="Čeština" required>Čeština<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="jazyk" value="Slovenština" required>Slovenština<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="jazyk" value="Jiný" required>Jiný<span class="radiomark"></span></label></td>
  </tr><tr>
    <td style="vertical-align: top;"> Popis/anotace: </td>
    <td><textarea  name="anotace" rows="10" cols="60" class="pole"></textarea></td>
  </tr><tr>
    <td style="vertical-align: top;"> Typ FF: </td>
    <td class="option volby"><label class="optradio"><input type="radio" name="typFF" value="Fandomy" id="FandomyID" onchange="Show()">FF na fandomy<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="typFF" value="Osobnosti" id="OsobnostiID" onchange="Show()">FF na osobnosti<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="typFF" value="Anime" id="AnimeID" onchange="Show()">FF na anime<span class="radiomark"></span></label>
    </td>
  </tr><tr>
      <td style="vertical-align: top;"> Crossover: </td>
    <td class="option volby"><label class="optradio"><input type="radio" name="crossover" value="Ne" onchange="Show(), Multiple()">Ne<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="crossover" value="Crossover v rámci typu" id="intype" onchange="Show(), Multiple()">Crossover v rámci typu<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="crossover" value="Crossover více typů" id="outtype" onchange="Show(), Multiple()">Crossover více typů<span class="radiomark"></span></label>
    </td>
  </tr><tr id="FandomID" hidden>
      <td style="vertical-align: top;"> Fandom: </td>
              <td><?php
                            require('wrapper');
                            Db::connect('údaje pro připojení');
                            $fandomy = Db::queryALL('
                    SELECT fandom
                    FROM fandomy
                    ORDER BY fandom
                    ');
                echo('<select name="fandom[]" size="10" multiple>');
                foreach ($fandomy as $f) {
                    echo('<option value="' . htmlspecialchars($f['fandom']));
                    echo('">' . htmlspecialchars($f['fandom']));
                    echo('</option>');
                }
                echo('</select>')
                ?></td>
  </tr><tr id="OsobnostID" hidden>
      <td style="vertical-align: top;"> Osobnost: </td>
              <td><?php
                    $osobnosti = Db::queryALL('
                    SELECT osobnost
                    FROM osobnosti
                    ORDER BY osobnost
                    ');
                echo('<select name="osobnost[]" size="10" multiple>');
                foreach ($osobnost as $o) {
                    echo('<option value="' . htmlspecialchars($o['osobnost']));
                    echo('">' . htmlspecialchars($o['osobnost']));
                    echo('</option>');
                }
                echo('</select>')
                ?></td>
  </tr><tr id="Anime2ID" hidden>
      <td style="vertical-align: top;" id="AnTab"> Anime: </td>
              <td><?php
                    $anime = Db::queryALL('
                    SELECT anime
                    FROM anime
                    ORDER BY anime
                    ');
                echo('<select name="anime[]" size="10" multiple>');
                foreach ($anime as $a) {
                    echo('<option value="' . htmlspecialchars($a['anime']));
                    echo('">' . htmlspecialchars($a['anime']));
                    echo('</option>');
                }
                echo('</select>')
                ?></td>
  </tr><tr>
    <td style="vertical-align: top;"> Klíčová slova: <br> <i style="font-size: smaller;color: dodgerblue;">oddělte čárkou</i></td>
    <td><textarea name="keywords" rows="10" cols="60" class="pole"></textarea></td>
  </tr><tr>
    <td style="vertical-align: top;"> Spoilery: <br> <i style="font-size: smaller;color: dodgerblue;">zobrazí se jen na vyžádání</i></td>
    <td><textarea name="spoilery" rows="10" cols="60" class="pole"></textarea></td>
  </tr><tr>
    <td> Výskyt romantiky: </td>
    <td class="top"><label class="container"><input type="checkbox" name="romantic" value="1"><span class="checkmarkOFF">Ne</span><span class="checkmarkON">Ano</span></label></td>
  </tr><tr>
    <td> Počet kapitol: </td>
    <td><input type="number" name="pocetkap" size="50" class="pole"></td>
  </tr><tr>
    <td> Průměrná délka kapitol: </td>
    <td><input type="number" name="delkakap" size="50" class="pole"></td>
  </tr><tr>
      <td class="volby" style="vertical-align: top;"> Délka příběhu: </td>
      <td class="option volby"><label class="optradio"><input type="radio" name="delka" value="Krátký (do 5K slov)" required>Krátký (do 5K slov)<span class="radiomark"></span></label>
          <br><label class="optradio"><input type="radio" name="delka" value="Stření (5K-30K slov)" required="">Stření (5K-30K slov)<span class="radiomark"></span></label>
          <br><label class="optradio"><input type="radio" name="delka" value="Dlouhý (nad 30K slov)" required="">Dlouhý (nad 30K slov)<span class="radiomark"></span></label>
          <br><label class="optradio"><input type="radio" name="delka" value="Soubor povídek" required="">Soubor povídek<span class="radiomark"></span></label>
      </td>
  </tr><tr>
    <td class="volby" style="vertical-align: top;"> Obsah pro dospělé: </td>
    <td class="option volby"><label class="optradio"><input type="radio" name="adult_lock" value="Žádný" required><span style="color: green; font-weight: bold;">Žádný</span><span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="adult_lock" value="13+ (vyšší výskyt vulgarismů)" required><span style="color: gold; font-weight: bold;">13+ </span>(vyšší výskyt vulgarismů)<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="adult_lock" value="15+ (vyšší výskyt násilí)" required><span style="color: orange; font-weight: bold;">15+ </span>(vyšší výskyt násilí)<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="adult_lock" value="18+ (erotika)" required><span style="color: orangered; font-weight: bold;">18+ </span>(erotika)<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="adult_lock" value="Extrémní (znásilnění nebo podrobně popsané krvavé scény)" required><span style="color: red; font-weight: bold;">Extrémní </span>(znásilnění nebo podrobně popsané krvavé scény)<span class="radiomark"></span></label></td>
  </tr><tr>
      <td class="volby" style="vertical-align: top;">Forma psaní:</td>
      <td class="option volby"><label class="optradio"><input type="radio" name="forma" value="Ich" required>Ich<span class="radiomark"></span></label>
          <br><label class="optradio"><input type="radio" name="forma" value="Er" required>Er<span class="radiomark"></span></label>
          <br><label class="optradio"><input type="radio" name="forma" value="Jiná" required>Jiná<span class="radiomark"></span></label></td>
  </tr><tr>
      <td>Výskyt LGBT:</td>
      <td class="top"><label class="container"><input type="checkbox" name="lgbt" value="1" id="lgbtID" onchange="lgbtq()"><span class="checkmarkOFF">Ne</span><span class="checkmarkON">Ano</span></label></td>
  </tr><tr>
      <td class="suboption volby" style="vertical-align: top">Typ:</td>
            <td class="option suboption volby"><label class="optcheckbox"><input type="checkbox" name="gxg" value="Gilr x girl" id="gxgID" disabled> Gilr x girl<span class="checkmark"></span></label>
            <br><label class="optcheckbox"><input type="checkbox" name="bxb" value="Boy x boy" id="bxbID" disabled> Boy x boy<span class="checkmark"></span></label>
            <br><label class="optcheckbox"><input type="checkbox" name="trans" value="Trans" id="transID" disabled> Trans<span class="checkmark"></span></label>
            <br><label class="optcheckbox"><input type="checkbox" name="asexual" value="Asexual" id="asexualID" disabled> Asexual<span class="checkmark"></span></label></td>
  </tr><tr>
      <td class="suboption volby" style="vertical-align: top">Význam:</td>
            <td class="option suboption volby"><label class="optradio"><input type="radio" name="vyznal_lgbt" value="Hlavní" id="hlavniID" required disabled>Hlavní<span class="radiomark"></span></label>
                <br><label class="optradio"><input type="radio" name="vyznal_lgbt" value="Vedlejší" id="vedlejsiID" required disabled>Vedlejší<span class="radiomark"></span></label></td>
  </tr><tr>
      <td>Alternative universe: <br> <i style="font-size: smaller;color: dodgerblue;">*Odporuje předloze</i></td>
      <td class="top"><label class="container"><input type="checkbox" name="AU" value="1"><span class="checkmarkOFF">Ne</span><span class="checkmarkON">Ano</span></label></td>
  </tr><tr>
      <td style="vertical-align: top;"> Výskyt OC: <br> <i style="font-size: smaller;color: dodgerblue;">*Nekánonické postava</i></td>
    <td class="option volby"><label class="optradio"><input type="radio" name="OC" value="Všechny nebo většina postav OC" required>Všechny nebo většina postav OC<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="OC" value="OC především hlavní postava">OC především hlavní postava<span class="radiomark"></span></label>
        <br><label class="optradio"><input type="radio" name="OC" value="Bez OC nebo OC jen ve vedlejších rolích">Bez OC nebo OC jen ve vedlejších rolích<span class="radiomark"></span></label>
    </td>
  </tr><tr>
      <td style="vertical-align: top;"> Ship: <br> <i style="font-size: smaller;color: dodgerblue;">*párování postav</i></td>
    <td class="option volby"><label class="optcheckbox"><input type="checkbox" name="noShip" value="Ne" id="noShipID" onchange="shipy()">Ne<span class="checkmark"></span></label>
        <br><label class="optcheckbox"><input type="checkbox" name="canonShip" value="Kánonický ship" id="canonShipID">Kánonický ship<span class="checkmark"></span></label>
        <br><label class="optcheckbox"><input type="checkbox" name="noncanonShip" value="Nekánonický ship" id="noncanonShipID">Nekánonický ship<span class="checkmark"></span></label>
        <br><label class="optcheckbox"><input type="checkbox" name="OCship" value="Ship OC s kánonickou postavou" id="OCshipID">Ship OC s kánonickou postavou<span class="checkmark"></span></label>
    </td>
  </tr><tr>
      <td></td><td style="margin-top: 5px; display: block;"><input type="submit" class="tlacitko" value=" Odeslat "></td>
  </tr>
</table>
</form>
</body>
</html>
