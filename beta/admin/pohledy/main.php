﻿<html lang="cs-cz">
	<head>
		<title><?= $titulek ?></title>
		<meta name="description" content="<?= $popis ?>" />
		<meta name="keywords" content="<?= $klicova_slova ?>" />
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>

	<body>
            <header>
                <img src="images/logo.png" width="30%">
		<h2>Pro snazší vyhledávání příběhů na Wattpadu</h2>
            </header>
            <div class="navbar">
                <div class="dropdown">
                    <button class="dropbtn">Přidat ></button>
                    <div class="dropdown-content">
                        <a href="addBeletry">Beletrie</a>
                        <a href="addFanfiction">Fanfikce</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Hledat ></button>
                    <div class="dropdown-content">
                        <a href="searchBeletry">Beletrie</a>
                        <a href="searchFanfiction">Fanfikce</a>
                    </div>
                </div> 
            </div>
            
            <br clear="both" />
		
		<article>
			<?php $this->kontroler->vypisPohled(); ?>
		</article>
		
		<footer>
			
		</footer>
	</body>
</html>