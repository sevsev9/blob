<?php
    require_once "../php/session.php";
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="../site.webmanifest">
    <link rel="apple-touch-icon" href="../blob.ico">
    <link rel="shortcut icon" href="../blob.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="design.css">
    <!-- Javascripts -->
    <script type="text/javascript" src="../js/fscreen.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
</head>
<body onload="startscript()">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-------------------------------------------------Site Content--------------------------------------------------------->



<!----------------------------------------------------------------------------------------------------------------------STANDARD_HUD-->
<div class="zentr">
    <div class="name fadeoutdiv"><?= $_SESSION['blob_name']?></div>
    <div class="xp"><?= $_SESSION['curr_xp']?>/<!-- javascript calculation -->xp</div>
</div>
<div class="coins"><?= $_SESSION['coins']?> Coins</div>
<!--------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------mathebox-->
<div id="matheboxfull" class="fadeindiv">
    <div class="mathebox">
    <img src="../img/aufgabenbox.png" width="90%"/>
    <button onclick="createQuest()" id="nextBtn" class="MouseHover">Nächste Aufgabe</button>
    <img src="../img/ok.png" class="MouseHover" onclick="answerQuest()" id="okBtn">
    <div id="aufgabentext">Bereit?</div>
    </div>
    <form name="matheInputForm">
        <input id="matheInput" name="matheInput" placeholder="Antwort: " class="MouseHover" type="number">
    </form>
</div>

<!--------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------englishbox-->
<div id="vokabelboxfull" class="fadeindiv">
    <div class="vokabelbox">
        <img src="../img/Vokabelaufgabenbox.png" width="90%"/>
        <button onclick="createVokabelQuest()" class="MouseHover" id="VokabelNextBtn">Next word</button>
        <img src="../img/ok.png" class="MouseHover" onclick="answerVokabelQuest()" id="VokabelOkBtn">
        <div id="Vokabelaufgabentext">Bereit?</div>
    </div>
    <form name="VokabelQuestInputForm">
        <input id="VokabelQuestInput" name="VokabelQuestInput" class="MouseHover" placeholder="The word is: " type="text">
        <input id="VokabelPathPicker" name="VokabelPathPicker" type="file" class="MouseHover" onchange="readVokabelFile()" accept=".txt">
    </form>
</div>


<!--------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------helpbox-->
<div id="helpboxfull">
    <img src="../img/helpBox.png" width="73.75%" class="helpBox">
    <span style="position: absolute;left: 65%;top: 10%;font-family: 'Arial Black';font-size: 40em;z-index: 51;opacity: 0.2;">?</span>
    <p class="helpText">
        Du befindest dich hier im Hilfebereich des Spiels!
        <br>Hier findest du allerhand Tipps und Tricks.
        <br>
        <br><span style="color: white">Navigationsbeschreibung:
    <br>Links in der Navigation findest du ganz oben das Geschäft (Shop),
    <br>darunter die Matheaufgaben (Quest).
    <br>Ganz unten ist der Knopf zum Ausloggen, um das Spiel zu beenden.
    <br>
    <br>Spieleanleitung:
    <br>In der Mitte des Bildschirms siehst du deinen Blob.
    <br>Mithilfe der Matheaufgaben kannst du Münzen (Coins) erspielen
    <br>und somit deinem Blob schöne und lustige Kleidungsstücke im
    <br>Geschäft kaufen und anziehen.</span>
    </p>
</div>

<!--------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------SHOP-->




<div class="shop">
    <div class="tab" style="z-index: 499">
        <button id="tabup" class="tablinks other MouseHover" onclick="openTab(event, 'eyes')">Augen</button>
        <button style="top: 14%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'clothing')">Anzüge</button>
        <button style="top: 28%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'color')">Farbe</button>
        <button style="top: 42%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'costume')">Kostüme</button>
        <button style="top: 56%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'hat')">Hüte</button>
        <button style="top: 70%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'mouth')">Mund</button>
        <button style="top: 84%" id="tabdown" class="tablinks other MouseHover" onclick="openTab(event, 'accessoires')">Accessoires</button>
    </div>


    <img src="../img/shop.png" style="width:80%; z-index: 500; position: relative">
    <h1 class="shopX MouseHover MouseHover" style="z-index: 501" onclick="closeshop()">X</h1>



    <!----------------------------------------------------------------------------------------------------------------------AUGEN-->
    <div class="shopinhalt" id="eyes">
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huat</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: red; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;" class="MouseHover">Angezogen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------------------KLEIDUNG-->
    <div class="shopinhalt" id="clothing">
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Hklouad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: red; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;" class="MouseHover">Angezogen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------FARBE-->
    <div class="shopinhalt" id="color">
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute"> Huat</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: red; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;" class="MouseHover">Angezogen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------KOSTÜM-->
    <div class="shopinhalt" id="costume">
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada </span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: red; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;" class="MouseHover">Angezogen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------HUT-->
    <div class="shopinhalt" id="hat">
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppadadashiassn Huat</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: red; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;" class="MouseHover">Angezogen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------MUND-->
    <div class="shopinhalt" id="mouth">
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppadaseas Huat</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: red; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;" class="MouseHover">Angezogen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------ACCESSOIRES-->
    <div class="shopinhalt" id="accessoires">
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppadagriasdi Huat</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: red; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: dodgerblue; font-size: 2em;" class="MouseHover">Anziehen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem">
            <span style="margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute">Deppada Huad</span>
            <button style="margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;" class="MouseHover">Kaufen</button>
            <button style="margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;" class="MouseHover">Angezogen</button>
            <span style="margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em">300 Coins</span>
            <img src="../img/Blob_basic.png" style="width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;"/>
        </div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
        <div class="shopinhalt_elem"></div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

</div>
<!---------------------------------------------------------------------------------------------------------------------------->



<!----------------------------------------------------------------------------------------------------------------------FULLSCREEN-->
<div id="startgamediv"><button id="startgame" class="MouseHover" onclick="toggleFullscreen()"><h1 class="MouseHover">Spiel starten!</h1></button></div>
<span id="wt">Welcome to</span>
<span id="bl">[BLOBLOGO]</span>
<span id="pb">presented by</span>
<span id="srd">some random dudes</span>
<img src="../img/background_purple.png" width="100%" id="background" style="z-index: 0"/>
<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->



<!----------------------------------------------------------------------------------------------------------------------NAVBAR-->
<nav>
    <ul>
        <li>
            <span class="openBtn MouseHover" onclick="openNav()">&#9776;</span>
        </li>
        <li>
            <span class="coinTxt text MouseHover" onclick="openNav(), shop()">Shop</span><img src="../img/coin.png" width="25%" class="coinBtn">
        </li>
        <li>
            <span class="matheTxt text MouseHover" onclick="openNav(), mathboxopen()">Mathe</span><img src="../img/mathe.png" width="25%" class="matheBtn">
        </li>
        <li>
            <span class="englishTxt text MouseHover" onclick="openNav(), vokabelboxopen()">English</span><img src="../img/english.png" width="25%" class="englishBtn">
        </li>
        <li>
            <span class="helpTxt text MouseHover">Help</span><img src="../img/help.png" width="25%" class="helpBtn">
        </li>
        <li>
            <span class="logoutTxt text MouseHover" onclick="logout()">Logout</span><img src="../img/cancel.png" width="25%" class="logoutBtn">
        </li>
    </ul>
</nav>
<!----------------------------------------------------------------------------------------------------------------------BLOB-->
<div class="fadeoutdiv">
    <img src="../img/Blob_basic.png" width="40%" class="blobbox MouseHover" id="blobbox1">
</div>
<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->



<!----------------------------------------------------------------------------------------------------------------------Javascript und JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    //Script wird beim Start ausgeführt

    function startscript(){
        background = document.getElementById("background");
        background.style.width = "50%";
        $(document).ready(function(){
            $(".shop").animate({top: '-17%'}, 100);
            $(".shop").animate({top: '-120%'}, 100);
            openTab(event, 'eyes');
        });
        mathebox = document.getElementById("matheboxfull");
        mathebox.style.display = "none";
        vokabelboxfull = document.getElementById("vokabelboxfull");
        vokabelboxfull.style.display = "none";
        helpboxfull = document.getElementById("helpboxfull");
        helpboxfull.style.display = "none";

        document.getElementById("pb").style.display = "block";
        document.getElementById("srd").style.display = "block";

        document.getElementById("tabup").style.left = "15%";

        setTimeout(function () {
            $("#wt:hidden:first").fadeIn(1500)
        }, 2000);
        setTimeout(function () {
            $("#bl:hidden:first").fadeIn(1500)
        }, 2500);
        setTimeout(function () {
            $("#startgame:hidden:first").fadeIn(1500)
        }, 4000);

    }

    //Shop schließen
    function closeshop(){
        $(document).ready(function(){
            $(".shop").animate({top: '-120%'}, 1000);
        });
    }

    //Shop öffnen
    function shop() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $(".shop").animate({top: '-17%'}, 1000);
            doBounce($(".shop"), 1, '1%', 180);
            navCount = 1;
        });
    }

    //Bounce-Animation
    function doBounce(element, times, distance, speed) {
        for(var i = 0; i < times; i++) {
            element.animate({marginTop
                    : '-='+distance}, speed)
                .animate({marginTop: '+='+distance}, speed);
        }
    }

    //Mathebox
    function mathboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
            $('#matheboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("okBtn").style.opacity = 0;
    }
    function mathboxclose() {
        $(document).ready(function(){
            $('#matheboxfull').css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Vokabelbox
    function vokabelboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
            $('#vokabelboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("VokabelNextBtn").style.opacity = 0;
        document.getElementById("VokabelOkBtn").style.opacity = 0;
    }
    function vokabelboxclose() {
        $(document).ready(function(){
            $('#vokabelboxfull').css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Wechseln in den Fullscreenmodus
    function toggleFullscreen(elem) {
        document.getElementById("wt").style.display = "none";
        document.getElementById("bl").style.display = "none";

        elem = elem || document.documentElement;
        isfullscreen = document.getElementById("startgamediv");
        if(document.fullscreenEnabled){
            isfullscreen.style.display = "none";
            background.style.width = "100%";
        }
        else{
            $('#background').width('100%');
            if (!document.fullscreenElement && !document.mozFullScreenElement &&
                !document.webkitFullscreenElement && !document.msFullscreenElement) {
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) {
                    elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                }
            }
            isfullscreen.style.display = "none";
        }
    }

    //Fullscreenmode enabled?
    $(document).on('webkitfullscreenchange', function(e)
    {
        if(document.webkitIsFullScreen){}
        else {
            isfullscreen.style.display = "block";
            background.style.width = "50%";
        }
    });

    //Navbar auf, oder zu --> 1 zum öffnen, 0 zum schließen
    navCount = 1;

    //Navbar öffnen oder schließen
    function openNav() {

        if (navCount==1){
            $(document).ready(function(){
                $("nav").animate({left: '-1.5%'}, 1000);
                $(".shop").animate({top: '-120%'}, 1000);
                $('#matheboxfull').css({zIndex:10}).fadeOut(1000);
                $('#vokabelboxfull').css({zIndex:10}).fadeOut(1000);
                $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            });
            navCount=0;
        }else{
            $(document).ready(function(){
                $("nav").animate({left: '-9.8%'}, 1000);
            });
            navCount=1;
        }

    }
    tabs = $(".tablinks");
    tabs.on("click", function () {
        $(this).removeClass("other");
        $(".other").animate({left: '0%'}, 300);
        $(this).animate({left: '15%'}, 300);
        $(this).addClass("other");
    });
</script>

<script>
    //Verschiedene Tabs für Shop
    function openTab(evt, tabname) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("shopinhalt");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(tabname).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<!----------------------------------------------------------------------------------------------------------------------Mathesystem-->

<script>

    var ergebnis = -1;
    var w = -1;

    function createQuest() {

        document.getElementById("okBtn").style.opacity = 1;

        document.getElementById("aufgabentext").style.color = "black";

        w = (Math.random() * (3 - 1)) + 1;
        w = Math.round(w);

        if (w==1){

            z1 = (Math.random() * (50 - 1)) + 1;
            z1 = Math.round(z1);
            z2 = (Math.random() * (50 - 1)) + 1;
            z2 = Math.round(z2);

            ergebnis = z1 + z2;

            document.getElementById("aufgabentext").innerText = z1 + " + " + z2 + " = ?";

        }else if(w==2){

            z1 = 1;
            z2 = 2;

            while(z1<z2){
                z1 = (Math.random() * (50 - 1)) + 1;
                z1 = Math.round(z1);
                z2 = (Math.random() * (50 - 1)) + 1;
                z2 = Math.round(z2);
            }

            ergebnis = z1 - z2;

            document.getElementById("aufgabentext").innerText = z1 + " - " + z2 + " = ?";

        }else{

            z1 = (Math.random() * (10 - 1)) + 1;
            z1 = Math.round(z1);
            z2 = (Math.random() * (10 - 1)) + 1;
            z2 = Math.round(z2);

            ergebnis = z1 * z2;

            document.getElementById("aufgabentext").innerText = z1 + " • " + z2 + " = ?";

        }
    }

    function answerQuest() {

        document.getElementById("okBtn").style.opacity = 0;

        x = document.forms["matheInputForm"]["matheInput"].value;

        if (w==1){
            if (x==ergebnis){
                document.getElementById("aufgabentext").innerText = z1 + " + " + z2 + " = " + ergebnis;
                document.getElementById("aufgabentext").style.color = "green";
            }else {
                document.getElementById("aufgabentext").innerText = z1 + " + " + z2 + " = " + x + "\n" + "Lösung: " + ergebnis;
                document.getElementById("aufgabentext").style.color = "red";
            }
        }else if(w==2){
            if (x==ergebnis){
                document.getElementById("aufgabentext").innerText = z1 + " - " + z2 + " = " + ergebnis;
                document.getElementById("aufgabentext").style.color = "green";
            }else {
                document.getElementById("aufgabentext").innerText = z1 + " - " + z2 + " = " + x + "\n" + "Lösung: " + ergebnis;
                document.getElementById("aufgabentext").style.color = "red";
            }
        }else {
            if (x==ergebnis){
                document.getElementById("aufgabentext").innerText = z1 + " • " + z2 + " = " + ergebnis;
                document.getElementById("aufgabentext").style.color = "green";
            }else {
                document.getElementById("aufgabentext").innerText = z1 + " • " + z2 + " = " + x + "\n" + "Lösung: " + ergebnis;
                document.getElementById("aufgabentext").style.color = "red";
            }
        }


    }

    $('#matheInput').keydown(function(e) {
        if(e.which == 13) { return false; }
    });

</script>

<!----------------------------------------------------------------------------------------------------------------------englishsystem-->

<script>

    var vokabelliste;
    var german;
    var english;
    var english2;
    var englcount=0;
    var zeilenanz;


    function readVokabelFile() {

        document.getElementById("VokabelNextBtn").style.opacity = 1;

        var files = document.getElementById('VokabelPathPicker').files;

        var file = files[0];
        var start = 0;
        var stop = file.size;

        var reader = new FileReader();

        reader.onloadend = function(evt) {
            if (evt.target.readyState == FileReader.DONE) {
                vokabelliste = evt.target.result;
            }
        };

        var blob = file.slice(start, stop);
        reader.readAsBinaryString(blob);
    }

    function createVokabelQuest() {

        document.getElementById("VokabelOkBtn").style.opacity = 1;

        document.getElementById("Vokabelaufgabentext").style.color = "black";

        if (englcount==zeilenanz){
            englcount=0;
        }


        var allTextLines = vokabelliste.split(/\r\n|\n/);
        zeilenanz = allTextLines.length;

        german = allTextLines[englcount].split('\t')[0];
        english = allTextLines[englcount].split('\t')[1];
        english2 = allTextLines[englcount].split('\t')[2];


        document.getElementById("Vokabelaufgabentext").innerText = german + " -> ?";
    }

    function answerVokabelQuest() {

        document.getElementById("VokabelOkBtn").style.opacity = 0;

        x = document.forms["VokabelQuestInputForm"]["VokabelQuestInput"].value;

        if(english2!=undefined){
            if (x==english){
                document.getElementById("Vokabelaufgabentext").innerText = german + " ->" + x + "\n" + "oder: " + english2;
                document.getElementById("Vokabelaufgabentext").style.color = "green";
            }else if (x==english2){
                document.getElementById("Vokabelaufgabentext").innerText = german + " ->" + x + "\n" + "oder: " + english;
                document.getElementById("Vokabelaufgabentext").style.color = "green";
            }else {
                document.getElementById("Vokabelaufgabentext").innerText = german + " -> " + x + "\n" + "Das Wort war: " + english + "\n" + "oder: " + english2;
                document.getElementById("Vokabelaufgabentext").style.color = "red";
            }
        }else{
            if (x==english){
                document.getElementById("Vokabelaufgabentext").innerText = german + " -> " + x;
                document.getElementById("Vokabelaufgabentext").style.color = "green";
            }else {
                document.getElementById("Vokabelaufgabentext").innerText = german + " -> " + x + "\n" + "Das Wort war: " + english;
                document.getElementById("Vokabelaufgabentext").style.color = "red";
            }
        }

        englcount++;

    }

    //blob
    var element = document.getElementById("blobbox1");

    element.addEventListener("click", function(e){
        e.preventDefault;

        element.classList.remove("animation-target");

        void element.offsetWidth;

        element.classList.add("animation-target");
    }, false);

</script>

<!--------------------------------------------------------------------------------------------------------------------------->

<p></p>
<script src="../js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="../js/plugins.js"></script>
<script src="../js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
