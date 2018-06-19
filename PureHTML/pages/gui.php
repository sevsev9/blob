<?php
    require_once "../php/session.php";
    //error_reporting(0);
    ini_set('display_errors',1);
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
    <script src="../js/items.js"></script>
    <script type="text/javascript">
        function buy(price,itemname,coins) {

            if(price<=coins) {
                coins-=price;
                var doc=document.getElementById("coin_display");
                doc.innerHTML = coins+" Coins";
                $.ajax({
                    type: "POST",
                    url: "../php/func.php",
                    data: { buyItem: coins, itemname: itemname }
                }).done(function () {
                    document.getElementById("btn_buy-"+itemname).style.display= 'none';
                    document.getElementById("btn_bought-"+itemname).style.display= 'block';
                    document.getElementById("btn_wear-"+itemname).style.display= 'block';
                });

            } else {
                alert("Not enough coins!");
            }
        }

        function wear(itemimage) {
            if (itemimage.includes("color")) {
                document.getElementById("color").setAttribute("src",itemimage)
            }else if (itemimage.includes("merkmale")) {
                document.getElementById("merkmale").setAttribute("src",itemimage)
            }else if (itemimage.includes("mouth")) {
                document.getElementById("mouth").setAttribute("src",itemimage)
            }else if (itemimage.includes("clothing")) {
                document.getElementById("clothing").setAttribute("src",itemimage)
            }else if (itemimage.includes("accessoires")) {
                document.getElementById("accessoires").setAttribute("src",itemimage)
            }else if (itemimage.includes("costume")) {
                document.getElementById("costume").setAttribute("src",itemimage)
            }else if (itemimage.includes("hat")) {
                document.getElementById("hat").setAttribute("src",itemimage)
            }
        }
    </script>


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

<!-------------------------------------------------Site Content-------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------Startscreen-->
<div id="startgamediv">
    <img src="../img/Game_Start_Button.png" id="startgame" onclick="toggleFullscreen(), playbackgroundmusic()" class="MouseHover Gamestartbuttonhover" onmouseover="hover(this);" onmouseout="unhover(this);">
    <img src="../img/Game_Start_Button_Shadow.png" id="startgameshadow">
</div>
<span id="wt">Welcome to</span>
<img src="../img/logo_new.png" id="bl">
<span id="pb">presented by</span>
<span id="ts">Team Skrt</span>
<img src="../img/background_purple.png" width="100%" id="background" style="z-index: 0"/>
<img src="../img/loading_final.gif" id="loadingGIF">
<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------BLOB-->

<div class="fadeoutdiv" onclick="blobmusic()">
    <div class="blobbox">
        <img src="../img/color/<?php echo $_SESSION["blob"]["color"].".png"?>" class="MouseHover blobitemsinhome" id="blobcolor" style="z-index: 11">
        <img src="../img/merkmale/<?php echo $_SESSION["blob"]["merkmale"].".png"?>" class="MouseHover blobitemsinhome" id="blobmerkmale" style="z-index: 12">
        <img src="../img/mouth/<?php echo $_SESSION["blob"]["mouth"].".png"?>" class="MouseHover blobitemsinhome" id="blobmouth" style="z-index: 13">
        <img src="../img/eyes/<?php echo $_SESSION["blob"]["eyes"].".png"?>" class="MouseHover blobitemsinhome" id="blobeyes" style="z-index: 14">
        <img src="../img/clothing/<?php echo $_SESSION["blob"]["clothing"].".png"?>" class="MouseHover blobitemsinhome" id="blobclothing" style="z-index: 15">
        <img src="../img/accessoires/<?php echo $_SESSION["blob"]["accessoires"].".png"?>" class="MouseHover blobitemsinhome" id="blobaccessoires" style="z-index: 16">
        <img src="../img/costume/<?php echo $_SESSION["blob"]["costume"].".png"?>" class="MouseHover blobitemsinhome" id="blobcostume" style="z-index: 17">
        <img src="../img/hat/<?php echo $_SESSION["blob"]["hat"].".png"?>" class="MouseHover blobitemsinhome" id="blobhat" style="z-index: 18">
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------NAVBAR-->

<nav>
    <ul>
        <li>
            <div id="navbaropeniconoverlay" class="MouseHover" onclick="openNav(), playbackgroundmusic(), navopenmusic()"></div>
            <span class="openBtn" id="navopenicon">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
            </span>
        </li>
        <li>
            <span class="coinTxt text MouseHover" onclick="openNav(), shop(), shopmusic()">Shop</span><img src="../img/coin.png" width="25%" class="coinBtn">
        </li>
        <li>
            <span class="matheTxt text MouseHover" onclick="openNav(), mathboxopen(), boxopenmusic()">Mathe</span><img src="../img/mathe.png" width="25%" class="matheBtn">
        </li>
        <li>
            <span class="englishTxt text MouseHover" onclick="openNav(), vokabelboxopen(), boxopenmusic()">English</span><img src="../img/english.png" width="25%" class="englishBtn">
        </li>
        <li>
            <span class="musicTxt text MouseHover" onclick="openNav(), musicboxopen(), pausebackgroundmusic(), boxopenmusic()">Musik</span><img src="../img/music.png" width="25%" class="musicBtn">
        </li>
        <li>
            <span class="deutschTxt text MouseHover" onclick="openNav(), deutschboxopen(), boxopenmusic(), createDeutschQuest()">Deutsch</span><img src="../img/deutsch.png" width="25%" class="deutschBtn">
        </li>
        <li>
            <span class="infoTxt text MouseHover" onclick="openNav(), infoboxopen(), boxopenmusic()">Info</span><img src="../img/info.png" width="25%" class="infoBtn">
        </li>
        <li>
            <span class="helpTxt text MouseHover" onclick="openNav(), helpboxopen(), boxopenmusic()">Help</span><img src="../img/help.png" width="25%" class="helpBtn">
        </li>
        <li>
            <span class="logoutTxt text MouseHover" onclick="openNav(), logout(), pausebackgroundmusic()">Logout</span><img src="../img/cancel.png" width="25%" class="logoutBtn">
        </li>
    </ul>
</nav>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------STANDARD_HUD-->
<div class="zentr">
    <div class="name fadeoutdiv"><?= $_SESSION['blob']['name']?></div>
    <div class="xp"><?= $_SESSION['curr_xp']?>/<!-- javascript calculation -->xp</div>
</div>
<div class="coins" id="coin_display"><?= $_SESSION['coins']?> Coins</div>
<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------mathebox-->

<div id="matheboxfull" class="fadeindiv">
    <h1 class="matheX MouseHover" style="z-index: 501" onclick="closemathe(), boxoutmusic()">X</h1>
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

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------englishbox-->

<div id="vokabelboxfull" class="fadeindiv">
    <h1 class="englishX MouseHover" style="z-index: 501" onclick="closeenglish(), boxoutmusic()">X</h1>
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

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------musicbox-->

<div id="musicboxfull" class="fadeindiv">
    <h1 class="musicX MouseHover" style="z-index: 501" onclick="closemusic(), endmusicgame(), playbackgroundmusic(), boxoutmusic()">X</h1>
    <div class="musicbox">
        <img src="../img/musicBox.png" width="90%"/>
    </div>
    <div id="mbox1" class="MouseHover" onmouseover="m1hoverbtn(this)" onmouseout="m1unhoverbtn(this)" onclick="answerMusicQuest(1), playmusicgame1music()"></div>
    <div id="mbox2" class="MouseHover" onmouseover="m2hoverbtn(this)" onmouseout="m2unhoverbtn(this)" onclick="answerMusicQuest(2), playmusicgame2music()"></div>
    <div id="mbox3" class="MouseHover" onmouseover="m3hoverbtn(this)" onmouseout="m3unhoverbtn(this)" onclick="answerMusicQuest(3), playmusicgame3music()"></div>
    <div id="mbox4" class="MouseHover" onmouseover="m4hoverbtn(this)" onmouseout="m4unhoverbtn(this)" onclick="answerMusicQuest(4), playmusicgame4music()"></div>
    <div id="musicbereittext">Bereit?</div>
    <button id="musicstartbutton" class="MouseHover" onclick="createMusicQuest(), startmusicgame()">Start</button>
</div>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------deutschbox-->

<div id="deutschboxfull" class="fadeindiv">
    <h1 class="deutschX MouseHover" style="z-index: 501" onclick="closedeutsch(), boxoutmusic()">X</h1>
    <div class="deutschbox">
        <img src="../img/deutschBox.png" width="90%"/>
        <div class="deutschheader">Finde die fehlende Steigerungsform:</div>
        <div id="deutschQuest"></div>
        <div id="deutschQuestAnswerOptions">
            <span id="deutschQuestAnswerOptions1" class="MouseHover"></span>
            <br>
            <span id="deutschQuestAnswerOptions2" class="MouseHover"></span>
            <br>
            <span id="deutschQuestAnswerOptions3" class="MouseHover"></span>
        </div>
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------helpbox-->

<div id="helpboxfull" class="fadeindiv">
    <h1 class="helpX MouseHover" style="z-index: 501" onclick="closehelp(), boxoutmusic()">X</h1>
    <img src="../img/helpBox.png" width="73.75%" class="helpBox">
    <span style="position: absolute;left: 64%;top: 2%;font-family: 'Arial Black';font-size: 50em;z-index: 51;opacity: 0.3;">?</span>
    <p class="helpText">
        Du befindest dich hier im Hilfebereich des Spiels!
        <br>Hier findest du allerhand Tipps und Tricks.
        <br>
        <br><span style="color: white">Navigationsbeschreibung:
    <br>Links in der Navigation findest du ganz oben das Geschäft (Shop),
    <br>darunter die Mathe-, Englisch- und Musikaufgaben.
    <br>Ganz unten ist der Knopf zum Ausloggen, um das Spiel zu beenden.
    <br>
    <br>Spieleanleitung:
    <br>In der Mitte des Bildschirms siehst du deinen Blob.
    <br>Mithilfe der Matheaufgaben kannst du Münzen (Coins) und Erfahrungspunkte (Xp)
    <br>erspielen und somit deinem Blob schöne und lustige Kleidungsstücke im
    <br>Geschäft kaufen und anziehen. Pro Level, das dein Blob aufsteigt, bekommst du
    <br>einen neuen Gegenstand im Shop freigeschalten, den du dann mit deinen erspielten
    <br>Münzen kaufen kannst!</span>
    </p>
</div>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------infobox-->

<div id="infoboxfull" class="fadeindiv">
    <h1 class="infoX MouseHover" style="z-index: 501" onclick="closeinfo(), boxoutmusic()">X</h1>
    <img src="../img/infoBox.png" width="73.75%" class="infoBox">
    <p class="infoText">
        Impressum
        <span style="color: white">
            <br>Angaben gemäß § 5 TMG:
            <br>Skrrt
            <br>Fischergasse 30
            <br>4600 Wels
            <br>Österreich
            <br>
            <br>Projektleiter:
            <br>Philipp Kollau
            <br>
            <br>Kontakt:
            <br>Email: supp.blob.click@gmail.com
            <br>
            <br>Haftungsausschluss (Disclaimer)
            <br><span style="color: #333">Haftung für Inhalte</span>
            <br>Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf
            <br>diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG
            <br>sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte
            <br>oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu
            <br>forschen, die auf eine rechtswidrige Tätigkeit hinweisen.
            <br>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen
            <br>nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche
            <br>Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten
            <br>Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden
            <br>Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.
            <br>
            <br><span style="color: #333">Haftung für Links</span>
            <br>Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte
            <br>wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch
            <br>keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der
            <br>jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten
            <br>Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße
            <br>überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht
            <br>erkennbar.
            <br>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne
            <br>konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei
            <br>Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend
            <br>entfernen.
            <br>
            <br><span style="color: #333">Urheberrecht</span>
            <br>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten
            <br>unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung,
            <br>Verbreitung und jede Art der Verwertung außerhalb der Grenzen des
            <br>Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors
            <br>bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten,
            <br>nicht kommerziellen Gebrauch gestattet.
            <br>Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden
            <br>die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als
            <br>solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung
            <br>aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei
            <br>Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte
            <br>umgehend entfernen.
        </span>
    </p>
    <span style="color: white; font-size: 2em; opacity: 0.6; position:absolute; top: 30.65em; left: 28em; z-index: 52;">Copyright (c) Philipp Kollau 2018</span>
</div>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------SHOP-->

<div class="shop">
    <div class="tab" style="z-index: 499">
        <button style="top: -14%" id="tabup" class="tablinks other MouseHover" onclick="shoptabmusic(1), openTab(event, 'color')"><img src="../img/standard/color_standard.png" class="MouseHover" id="tabicon" style="top: 12%; left: 3%; width: 90%;"></button>
        <button style="top: 0%" class="tabmid tablinks other MouseHover" onclick="shoptabmusic(2), openTab(event, 'merkmale')"><img src="../img/standard/merkmal_standard.png" class="MouseHover" id="tabicon" style="top: 14%; left: 3%; width: 90%;"></button>
        <button style="top: 14%" class="tabmid tablinks other MouseHover" onclick="shoptabmusic(3), openTab(event, 'eyes')"><img src="../img/standard/eyes_standard.png" class="MouseHover" id="tabicon" style="top: 25%; left: 2%; width: 95%;"></button>
        <button style="top: 28%" class="tabmid tablinks other MouseHover" onclick="shoptabmusic(4), openTab(event, 'mouth')"><img src="../img/standard/mouth_standard.png" class="MouseHover" id="tabicon" style="top: 45%; left: 2%; width: 95%;"></button>
        <button style="top: 42%" class="tabmid tablinks other MouseHover" onclick="shoptabmusic(5), openTab(event, 'clothing')"><img src="../img/standard/clothing_standard.png" class="MouseHover" id="tabicon" style="top: 50%; left: 2%; width: 95%;"></button>
        <button style="top: 56%" class="tabmid tablinks other MouseHover" onclick="shoptabmusic(6), openTab(event, 'accessoires')"><img src="../img/standard/accessoires_standard.png" class="MouseHover" id="tabicon" style="top: 25%; left: 5%; width: 90%;"></button>
        <button style="top: 70%" class="tabmid tablinks other MouseHover" onclick="shoptabmusic(7), openTab(event, 'hat')"><img src="../img/standard/hat_standard.png" class="MouseHover" id="tabicon" style="top: 15%; left: 5%; width: 90%;"></button>
        <button style="top: 84%" class="tabmid tablinks other MouseHover" onclick="shoptabmusic(8), openTab(event, 'costume')"><img src="../img/standard/costume_standard.png" class="MouseHover" id="tabicon" style="top: 13%; left: 5%; width: 90%;"></button>
        <button style="top: 98%" id="tabdown" class="tablinks other MouseHover" onclick="shoptabmusic(9), openTab(event, 'wallpapers')"><img src="../img/standard/background_standard.png" class="MouseHover" id="tabicon" style="top: 25%; left: 0%; width: 100%; user-select: none;"></button>
    </div>


    <img src="../img/shop.png" style="width:80%; z-index: 500; position: relative">
    <h1 class="shopX MouseHover" style="z-index: 501" onclick="closeshop(), shopoutmusic()">X</h1>



    <!----------------------------------------------------------------------------------------------------------------------AUGEN-->
    <div class="shopinhalt" id="eyes">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------------------KLEIDUNG-->
    <div class="shopinhalt" id="clothing">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------FARBE-->
    <div class="shopinhalt" id="color">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------KOSTÜM-->
    <div class="shopinhalt" id="costume">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------HUT-->
    <div class="shopinhalt" id="hat">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------MUND-->
    <div class="shopinhalt" id="mouth">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------ACCESSOIRES-->
    <div class="shopinhalt" id="accessoires">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------MERKMALE-->
    <div class="shopinhalt" id="merkmale">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------WALLPAPER-->
    <div class="shopinhalt" id="wallpapers">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

</div>

<!--Shop Item Script-->
<?php
//Create Javascript Item Array
$servername = "172.17.0.5";
$dbname = "blob_users";
$dbuname = "webacc";
$dbpassw = "Blob_256!";

$db = mysqli_connect($servername, $dbuname, $dbpassw, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM items";
$result = mysqli_query($db, $sql);
$rows = array();
$ctr = 0;

while($row = mysqli_fetch_array($result)){
    array_push($rows, $row);

    $wearing = "false";
    $bought = "false";

    if (    (strpos($rows[$ctr]['path'],$_SESSION['blob']["hat"]) !== false) ||
            (strpos($rows[$ctr]['path'],$_SESSION['blob']["eyes"]) !== false) ||
            (strpos($rows[$ctr]['path'],$_SESSION['blob']["clothing"]) !== false) ||
            (strpos($rows[$ctr]['path'],$_SESSION['blob']["color"]) !== false) ||
            (strpos($rows[$ctr]['path'],$_SESSION['blob']["costume"]) !== false) ||
            (strpos($rows[$ctr]['path'],$_SESSION['blob']["mouth"]) !== false) ||
            (strpos($rows[$ctr]['path'],$_SESSION['blob']["accessoires"]) !== false) ||
            (strpos($rows[$ctr]['path'],$_SESSION['blob']["merkmale"]) !== false) ||
            (strpos($rows[$ctr]['path'],$_SESSION['blob']["wallpapers"]) !== false)
    ) {
        $wearing = "true";
        $bought = "true";
    }

    echo "<script type='text/javascript'>";

    //createItem(id, itemname, itemimage, price, bought, wearing)
//Augen
    //document.getElementById('eyes')
    while ($rows[$ctr] != null){
        if ($rows[$ctr]['item_class'] == "eyes") {
            echo "createItem(document.getElementById('eyes'),
                            '".$rows[$ctr]['name']."',
                            '/img/".$rows[$ctr]['item_class']."/".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['price']."',
                            "."Boolean(".$bought.")".",
                            "."Boolean(".$wearing.")".",
                            ".$_SESSION['coins']."
               );";
        }
//Kleidung
        //document.getElementById('clothing')
        elseif ($rows[$ctr]['item_class'] == "clothing") {
            echo "createItem(document.getElementById('clothing'),
                            '".$rows[$ctr]['name']."',
                            '/img/".$rows[$ctr]['item_class']."/".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['price']."',
                            "."Boolean(".$bought.")".",
                            "."Boolean(".$wearing.")".",
                            ".$_SESSION['coins']."
               );";
        }
//Farbe
        //document.getElementById('color')
        elseif ($rows[$ctr]['item_class'] == "color") {
            echo "createItem(document.getElementById('color'),
                            '".$rows[$ctr]['name']."',
                            '/img/".$rows[$ctr]['item_class']."/".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['price']."',
                            "."Boolean(".$bought.")".",
                            "."Boolean(".$wearing.")".",
                            ".$_SESSION['coins']."
               );";
        }
//Kostüm
        //document.getElementById('costume')
        elseif ($rows[$ctr]['item_class'] == "costume") {
            echo "createItem(document.getElementById('costume'),
                            '".$rows[$ctr]['name']."',
                            '/img/".$rows[$ctr]['item_class']."/".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['price']."',
                            "."Boolean(".$bought.")".",
                            "."Boolean(".$wearing.")".",
                            ".$_SESSION['coins']."
               );";
        }
//Hut
        //document.getElementById('hat')
        elseif ($rows[$ctr]['item_class'] == "hat") {
            echo "createItem(document.getElementById('hat'),
                            '".$rows[$ctr]['name']."',
                            '/img/".$rows[$ctr]['item_class']."/".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['price']."',
                            "."Boolean(".$bought.")".",
                            "."Boolean(".$wearing.")".",
                            ".$_SESSION['coins']."
               );";
        }
//Mund
        //document.getElementById('mouth')
        elseif ($rows[$ctr]['item_class'] == "mouth") {
            echo "createItem(document.getElementById('mouth'),
                            '".$rows[$ctr]['name']."',
                            '/img/".$rows[$ctr]['item_class']."/".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['price']."',
                            "."Boolean(".$bought.")".",
                            "."Boolean(".$wearing.")".",
                            ".$_SESSION['coins']."
               );";
        }
//Accessoirs
        //document.getElementById('accessoires')
        elseif ($rows[$ctr]['item_class'] == "accessoires") {
            echo "createItem(document.getElementById('accessoires'),
                            '".$rows[$ctr]['name']."',
                            '/img/".$rows[$ctr]['item_class']."/".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['price']."',
                            "."Boolean(".$bought.")".",
                            "."Boolean(".$wearing.")".",
                            ".$_SESSION['coins']."
               );";
        }
//Merkmale
        //document.getElementById('merkmale')
        elseif ($rows[$ctr]['item_class'] == "merkmale") {
            echo "createItem(document.getElementById('merkmale'),
                            '".$rows[$ctr]['name']."',
                            '/img/".$rows[$ctr]['item_class']."/".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['price']."',
                            "."Boolean(".$bought.")".",
                            "."Boolean(".$wearing.")".",
                            ".$_SESSION['coins']."
               );";
        }
//Wallpaper
        //document.getElementById('wallpapers')
        elseif ($rows[$ctr]['item_class'] == "wallpapers") {
            echo "createItem(document.getElementById('wallpapers'),
                            '".$rows[$ctr]['name']."',
                            '/img/".$rows[$ctr]['item_class']."/".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['price']."',
                            "."Boolean(".$bought.")".",
                            "."Boolean(".$wearing.")".",
                            ".$_SESSION['coins']."
               );";
        }

        $ctr++;
    }

    echo"</script>";
}
//echo "<p>".json_encode($rows)."</p>";
//echo "<p>".json_encode($rows[0]["id"])."</p>";
?>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------settingsbox-->

<div id="settingsboxfull" class="fadeindiv" style="color: #191919">
    <h1 class="settingsX MouseHover" style="z-index: 501" onclick="closesettings(), boxoutmusic()">X</h1>
    <img src="../img/settingsBox.png" width="40%" class="settingsBox">
    <div class="soundeffects">
        <span style="font-size: 3.5em; color: #191919">Effektlautstärke:</span>
        <output id="musiceffectoutput" for="musiceffectslider" style="color: #191919">5</output>
        <input id="musiceffectslider" name="musiceffectslider" type="range" min="0" max="10" step="1.0">
    </div>
    <div class="soundbackground">
        <span style="font-size: 3.5em; color: #191919">Musiklautstärke:</span>
        <output id="musicbackgroundoutput" for="musicbackgroundslider" style="color: #191919">5</output>
        <input id="musicbackgroundslider" name="musicbackgroundslider" type="range" min="0" max="10" step="1.0">
    </div>


</div>
<img src="../img/settings.png" width="3%" class="settingsBtn MouseHover" onclick="settingsboxopen(), boxopenmusic()">

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------MUSIC-->

<audio loop id="backgroundmusic">
    <source src="../music/backgroundmusic.mp3" type="audio/mp3">
</audio>

<audio id="navopenmusic">
    <source src="../music/navopenmusic.mp3" type="audio/mp3">
</audio>

<audio id="boxopenmusic">
    <source src="../music/boxopenmusic.mp3" type="audio/mp3">
</audio>

<audio id="boxoutmusic">
    <source src="../music/boxoutmusic.mp3" type="audio/mp3">
</audio>

<audio id="shopmusic">
    <source src="../music/shopmusic.mp3" type="audio/mp3">
</audio>

<audio id="shopoutmusic">
    <source src="../music/shopoutmusic.mp3" type="audio/mp3">
</audio>

<audio id="correctmusic">
    <source src="../music/correctmusic.mp3" type="audio/mp3">
</audio>

<audio id="wrongmusic">
    <source src="../music/wrongmusic.mp3" type="audio/mp3">
</audio>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------Javascript und JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    function hover(element) {
        element.setAttribute('src', '../img/Game_Start_Button_Hover.png');
        document.getElementById("startgameshadow").style.opacity = 0.8;
    }
    function unhover(element) {
        element.setAttribute('src', '../img/Game_Start_Button.png');
        document.getElementById("startgameshadow").style.opacity = 0.5;
    }
</script>

<script>
    //Script wird beim Start ausgeführt

    function startscript(){
        background = document.getElementById("background");
        background.style.width = "50%";
        $(document).ready(function(){
            $(".shop").animate({top: '-17%'}, 100);
            $(".shop").animate({top: '-120%'}, 100);
            openTab(event, 'color');
        });
        mathebox = document.getElementById("matheboxfull");
        mathebox.style.display = "none";
        vokabelboxfull = document.getElementById("vokabelboxfull");
        vokabelboxfull.style.display = "none";
        musicboxfull = document.getElementById("musicboxfull");
        musicboxfull.style.display = "none";
        helpboxfull = document.getElementById("helpboxfull");
        helpboxfull.style.display = "none";
        infoboxfull = document.getElementById("infoboxfull");
        infoboxfull.style.display = "none";
        settingsboxfull = document.getElementById("settingsboxfull");
        settingsboxfull.style.display = "none";
        deutschboxfull = document.getElementById("deutschboxfull");
        deutschboxfull.style.display = "none";

        document.getElementById("pb").style.display = "block";
        document.getElementById("ts").style.display = "block";

        $("#loadingGIF").fadeOut(1000);

        document.getElementById("tabup").style.left = "15%";

        setTimeout(function () {
            $("#wt:hidden:first").fadeIn(1500)
        }, 2000);
        setTimeout(function () {
            $("#bl:hidden:first").fadeIn(1500)
        }, 2500);
        setTimeout(function () {
            $("#startgame:hidden:first").fadeIn(1500)
            $("#startgameshadow:hidden:first").fadeIn(1500)
        }, 4000);
    }

    //Shop schließen
    function closeshop(){
        $(document).ready(function(){
            $(".shop").animate({top: '-120%'}, 1000);
            $('.settingsBtn').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Shop öffnen
    function shop() {

        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $(".shop").animate({top: '-17%'}, 1000);
            $('.settingsBtn').css({zIndex:10}).fadeOut(1000);
            doBounce($(".shop"), 1, '1%', 180);
            navCount = 1;
        });

        document.getElementById("navopenicon").classList.remove("change");

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
            $('.settingsBtn').css({zIndex:10}).fadeOut(1000);
            $('#matheboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("navopenicon").classList.remove("change");

        document.getElementById("okBtn").style.opacity = 0;
    }

    //Mathe schließen
    function closemathe(){
        $(document).ready(function(){
            $("#matheboxfull").css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            $('.settingsBtn').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Vokabelbox
    function vokabelboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
            $('.settingsBtn').css({zIndex:10}).fadeOut(1000);
            $('#vokabelboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("navopenicon").classList.remove("change");

        document.getElementById("VokabelNextBtn").style.opacity = 0;
        document.getElementById("VokabelOkBtn").style.opacity = 0;
    }

    //Englisch schließen
    function closeenglish(){
        $(document).ready(function(){
            $("#vokabelboxfull").css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            $('.settingsBtn').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Musicbox
    function musicboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
            $('.settingsBtn').css({zIndex:10}).fadeOut(1000);
            $('#musicboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("navopenicon").classList.remove("change");

    }

    //Music schließen
    function closemusic(){
        $(document).ready(function(){
            $("#musicboxfull").css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            $('.settingsBtn').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Deutschbox
    function deutschboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
            $('.settingsBtn').css({zIndex:10}).fadeOut(1000);
            $('#deutschboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("navopenicon").classList.remove("change");

    }

    //Deutsch schließen
    function closedeutsch(){
        $(document).ready(function(){
            $("#deutschboxfull").css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            $('.settingsBtn').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Helpbox
    function helpboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
            $('.settingsBtn').css({zIndex:10}).fadeOut(1000);
            $('#helpboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("navopenicon").classList.remove("change");
    }

    //Help schließen
    function closehelp(){
        $(document).ready(function(){
            $("#helpboxfull").css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            $('.settingsBtn').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Infobox
    function infoboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
            $('.settingsBtn').css({zIndex:10}).fadeOut(1000);
            $('#infoboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("navopenicon").classList.remove("change");
    }

    //Info schließen
    function closeinfo(){
        $(document).ready(function(){
            $("#infoboxfull").css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            $('.settingsBtn').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Settingsbox
    function settingsboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
            $('.settingsBtn').css({zIndex:10}).fadeOut(1000);
            $('#settingsboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("navopenicon").classList.remove("change");

    }

    //Settings schließen
    function closesettings(){
        $(document).ready(function(){
            $("#settingsboxfull").css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            $('.settingsBtn').css({zIndex:9}).fadeIn(1000);
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
                $("nav").animate({left: '-1.5%'}, 800);
                $(".shop").animate({top: '-120%'}, 1000);
                $('#matheboxfull').css({zIndex:10}).fadeOut(1000);
                $('#vokabelboxfull').css({zIndex:10}).fadeOut(1000);
                $('#musicboxfull').css({zIndex:10}).fadeOut(1000);
                $('#helpboxfull').css({zIndex:10}).fadeOut(1000);
                $('#infoboxfull').css({zIndex:10}).fadeOut(1000);
                $('#settingsboxfull').css({zIndex:10}).fadeOut(1000);
                $('#deutschboxfull').css({zIndex:10}).fadeOut(1000);
                $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            });
            navCount=0;
        }else{
            $(document).ready(function(){
                $("nav").animate({left: '-9.8%'}, 800);
            });
            navCount=1;
        }

        document.getElementById("navopenicon").classList.toggle("change");

    }

    tabs = $(".tablinks");
    tabs.on("click", function () {
        $(this).removeClass("other");
        $(".other").animate({left: '0%'}, 300);
        $(this).animate({left: '15%'}, 300);
        $(this).addClass("other");
    });
</script>


<!----------------------------------------------------------------------------------------------------------------------settings-->

<script>

    musiceffectslider = document.querySelector("#musiceffectslider");
    musiceffectoutput = document.querySelector("#musiceffectoutput");
    document.addEventListener('DOMContentLoaded', function() {
        musiceffectoutput.value = musiceffectslider.value;
    });

    musiceffectslider.addEventListener ("input", function () {
        musiceffectoutput.value = this.value;
    });

    musicbackgroundslider = document.querySelector("#musicbackgroundslider");
    musicbackgroundoutput = document.querySelector("#musicbackgroundoutput");
    document.addEventListener('DOMContentLoaded', function() {
        musicbackgroundoutput.value = musicbackgroundslider.value;
        playbackgroundmusic();
    });

    musicbackgroundslider.addEventListener ("input", function () {
        musicbackgroundoutput.value = this.value;
        playbackgroundmusic();
    });

</script>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------music-->

<script>
    function playbackgroundmusic() {
        x = document.getElementById("backgroundmusic");
        x.volume = musicbackgroundoutput.value/10;
        x.play();
    }

    function pausebackgroundmusic() {
        x = document.getElementById("backgroundmusic");
        x.pause();
    }

    function navopenmusic() {
        x = document.getElementById("navopenmusic");
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    function boxopenmusic() {
        x = document.getElementById("boxopenmusic");
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    function boxoutmusic() {
        x = document.getElementById("boxoutmusic");
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    function shopmusic() {
        x = document.getElementById("shopmusic");
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    function shopoutmusic() {
        x = document.getElementById("shopoutmusic");
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    shoptabmusiccontrol = 1;

    function shoptabmusic(y) {

        if (shoptabmusiccontrol != y){

            x = new Audio();
            x.src = "../music/shoptabmusic.mp3";
            x.volume = musiceffectoutput.value/10;
            x.play();

            shoptabmusiccontrol = y;
        }

    }

    function blobmusic() {

        blobrand = (Math.random() * (3 - 1)) + 1;
        blobrand = Math.round(blobrand);

        if (blobrand == 1){
            x = new Audio();
            x.src = "../music/blobsound1.mp3";
            x.volume = musiceffectoutput.value/10;
            x.play();
        }else if (blobrand == 2){
            x = new Audio();
            x.src = "../music/blobsound2.mp3";
            x.volume = musiceffectoutput.value/10;
            x.play();
        }else if(blobrand == 3){
            x = new Audio();
            x.src = "../music/blobsound3.mp3";
            x.volume = musiceffectoutput.value/10;
            x.play();
        }

    }

    function correctmusic() {
        x = document.getElementById("correctmusic");
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    function wrongmusic() {
        x = document.getElementById("wrongmusic");
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

</script>

<!--------------------------------------------------------------------------------------------------------------------->


<!----------------------------------------------------------------------------------------------------------------------Shopkategorien-->

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

<!--------------------------------------------------------------------------------------------------------------------->
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
                correctmusic();
            }else {
                document.getElementById("aufgabentext").innerText = z1 + " + " + z2 + " = " + x + "\n" + "Lösung: " + ergebnis;
                document.getElementById("aufgabentext").style.color = "red";
                wrongmusic();
            }
        }else if(w==2){
            if (x==ergebnis){
                document.getElementById("aufgabentext").innerText = z1 + " - " + z2 + " = " + ergebnis;
                document.getElementById("aufgabentext").style.color = "green";
                correctmusic();
            }else {
                document.getElementById("aufgabentext").innerText = z1 + " - " + z2 + " = " + x + "\n" + "Lösung: " + ergebnis;
                document.getElementById("aufgabentext").style.color = "red";
                wrongmusic();
            }
        }else {
            if (x==ergebnis){
                document.getElementById("aufgabentext").innerText = z1 + " • " + z2 + " = " + ergebnis;
                document.getElementById("aufgabentext").style.color = "green";
                correctmusic();
            }else {
                document.getElementById("aufgabentext").innerText = z1 + " • " + z2 + " = " + x + "\n" + "Lösung: " + ergebnis;
                document.getElementById("aufgabentext").style.color = "red";
                wrongmusic();
            }
        }


    }

    $('#matheInput').keydown(function(e) {
        if(e.which == 13) { return false; }
    });

</script>

<!--------------------------------------------------------------------------------------------------------------------->
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
                correctmusic();
            }else if (x==english2){
                document.getElementById("Vokabelaufgabentext").innerText = german + " ->" + x + "\n" + "oder: " + english;
                document.getElementById("Vokabelaufgabentext").style.color = "green";
                correctmusic();
            }else {
                document.getElementById("Vokabelaufgabentext").innerText = german + " -> " + x + "\n" + "Das Wort war: " + english + "\n" + "oder: " + english2;
                document.getElementById("Vokabelaufgabentext").style.color = "red";
                wrongmusic();
            }
        }else{
            if (x==english){
                document.getElementById("Vokabelaufgabentext").innerText = german + " -> " + x;
                document.getElementById("Vokabelaufgabentext").style.color = "green";
                correctmusic();
            }else {
                document.getElementById("Vokabelaufgabentext").innerText = german + " -> " + x + "\n" + "Das Wort war: " + english;
                document.getElementById("Vokabelaufgabentext").style.color = "red";
                wrongmusic();
            }
        }

        englcount++;

    }

    $('#VokabelQuestInput').keydown(function(e) {
        if(e.which == 13) { return false; }
    });

</script>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------musicquestsystem-->

<script>
    function playmusicgame1music() {
        x = new Audio();
        x.src = "../music/musicgame1music.mp3";
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    function playmusicgame2music() {
        x = new Audio();
        x.src = "../music/musicgame2music.wav";
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    function playmusicgame3music() {
        x = new Audio();
        x.src = "../music/musicgame3music.mp3";
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    function playmusicgame4music() {
        x = new Audio();
        x.src = "../music/musicgame4music.wav";
        x.volume = musiceffectoutput.value/10;
        x.play();
    }

    hoverstatus = 0;

    notenzusammensetzung = [];
    notenuserzusammensetzung = [];
    musicquestcounter = 1;
    musicquestrightcounter = 0;

    musictime = 1000;

    answerMusicQuestcounter = 0;

    function createMusicQuest() {

        hoverstatus = 1;

        bt1 = 1;
        bt2 = 2;
        bt3 = 3;
        bt4 = 4;

        musictime += 1000;

        musicquestcounter++;
        i=0;

        musicinterval = setInterval(function () {
            wahl = (Math.random() * (4 - 1)) + 1;
            wahl = Math.round(wahl);

            if (wahl==1){

                notenzusammensetzung[i] = bt1;

                m1hover(document.getElementById("mbox1"));
                playmusicgame1music();
                setTimeout(function () {
                    element = document.getElementById("mbox1");
                    element.style.backgroundColor = "#ff3300";
                    element.style.borderRightColor = "#cc2900";
                    element.style.borderBottomColor = "#cc2900";
                    element.style.borderLeftColor = "#ff5c33";
                    element.style.borderTopColor = "#ff5c33";


                }, 500);

            }else if (wahl==2){

                notenzusammensetzung[i] = bt2;

                m2hover(document.getElementById("mbox2"));
                playmusicgame2music();
                setTimeout(function () {
                    element = document.getElementById("mbox2");
                    element.style.backgroundColor = "dodgerblue";
                    element.style.borderRightColor = "royalblue";
                    element.style.borderBottomColor = "royalblue";
                    element.style.borderLeftColor = "deepskyblue";
                    element.style.borderTopColor = "deepskyblue";


                }, 500);


            }else if (wahl==3){

                notenzusammensetzung[i] = bt3;

                m3hover(document.getElementById("mbox3"));
                playmusicgame3music();
                setTimeout(function () {
                    element = document.getElementById("mbox3");
                    element.style.backgroundColor = "#009933";
                    element.style.borderRightColor = "#006622";
                    element.style.borderBottomColor = "#006622";
                    element.style.borderLeftColor = "#00cc44";
                    element.style.borderTopColor = "#00cc44";


                }, 500);

            }else if (wahl==4){

                notenzusammensetzung[i] = bt4;

                m4hover(document.getElementById("mbox4"));
                playmusicgame4music();
                setTimeout(function () {
                    element = document.getElementById("mbox4");
                    element.style.backgroundColor = "#cc00cc";
                    element.style.borderRightColor = "#990099";
                    element.style.borderBottomColor = "#990099";
                    element.style.borderLeftColor = "#ff00ff";
                    element.style.borderTopColor = "#ff00ff";


                }, 500);
            }

            i++;

        },1000);

        setTimeout(function () {
            clearInterval(musicinterval);
            i = 0;
            musicquestrightcounter = 0;
            answerMusicQuestcounter = 0;

            setTimeout(function () {
                hoverstatus = 0;
            },800);

        }, musictime);

    }

    function answerMusicQuest(userbtn) {

        notenuserzusammensetzung[answerMusicQuestcounter] = userbtn.valueOf();

        if (notenuserzusammensetzung[answerMusicQuestcounter] == notenzusammensetzung[answerMusicQuestcounter]){
            i++;
            musicquestrightcounter++;
            answerMusicQuestcounter++;
        }else {
            setTimeout(wrongmusic(),1000);
            endmusicgame();
        }

        if (musicquestcounter == musicquestrightcounter){

            setTimeout(correctmusic(),1000);
            setTimeout(createMusicQuest(),2500);

            element = document.getElementById("mbox1");
            element.style.backgroundColor = "#ff3300";
            element.style.borderRightColor = "#cc2900";
            element.style.borderBottomColor = "#cc2900";
            element.style.borderLeftColor = "#ff5c33";
            element.style.borderTopColor = "#ff5c33";

            element = document.getElementById("mbox2");
            element.style.backgroundColor = "dodgerblue";
            element.style.borderRightColor = "royalblue";
            element.style.borderBottomColor = "royalblue";
            element.style.borderLeftColor = "deepskyblue";
            element.style.borderTopColor = "deepskyblue";

            element = document.getElementById("mbox3");
            element.style.backgroundColor = "#009933";
            element.style.borderRightColor = "#006622";
            element.style.borderBottomColor = "#006622";
            element.style.borderLeftColor = "#00cc44";
            element.style.borderTopColor = "#00cc44";

            element = document.getElementById("mbox4");
            element.style.backgroundColor = "#cc00cc";
            element.style.borderRightColor = "#990099";
            element.style.borderBottomColor = "#990099";
            element.style.borderLeftColor = "#ff00ff";
            element.style.borderTopColor = "#ff00ff";
        }

    }

    function startmusicgame() {
        document.getElementById("musicstartbutton").style.display = "none";
        document.getElementById("musicbereittext").style.display = "none";

        document.getElementById("mbox1").style.display = "block";
        document.getElementById("mbox2").style.display = "block";
        document.getElementById("mbox3").style.display = "block";
        document.getElementById("mbox4").style.display = "block";
    }

    function endmusicgame() {
        document.getElementById("musicstartbutton").style.display = "block";
        document.getElementById("musicbereittext").style.display = "block";

        document.getElementById("mbox1").style.display = "none";
        document.getElementById("mbox2").style.display = "none";
        document.getElementById("mbox3").style.display = "none";
        document.getElementById("mbox4").style.display = "none";
        musictime = 1000;
        answerMusicQuestcounter = 0;
        musicquestcounter = 1;
        musicquestrightcounter = 0;
    }


    function m1hover(element) {
        element.style.backgroundColor = "#b30000";
        element.style.borderRightColor = "#e60000";
        element.style.borderBottomColor = "#e60000";
        element.style.borderLeftColor = "#800000";
        element.style.borderTopColor = "#800000";
    }

    function m1unhover(element) {
        element.style.backgroundColor = "#ff3300";
        element.style.borderRightColor = "#cc2900";
        element.style.borderBottomColor = "#cc2900";
        element.style.borderLeftColor = "#ff5c33";
        element.style.borderTopColor = "#ff5c33";
    }

    function m2hover(element) {
        element.style.backgroundColor = "#6666ff";
        element.style.borderRightColor = "#8080ff";
        element.style.borderBottomColor = "#8080ff";
        element.style.borderLeftColor = "#4d4dff";
        element.style.borderTopColor = "#4d4dff";
    }

    function m2unhover(element) {
        element.style.backgroundColor = "dodgerblue";
        element.style.borderRightColor = "royalblue";
        element.style.borderBottomColor = "royalblue";
        element.style.borderLeftColor = "deepskyblue";
        element.style.borderTopColor = "deepskyblue";
    }

    function m3hover(element) {
        element.style.backgroundColor = "#008000";
        element.style.borderRightColor = "#009900";
        element.style.borderBottomColor = "#009900";
        element.style.borderLeftColor = "#004d00";
        element.style.borderTopColor = "#004d00";
    }

    function m3unhover(element) {
        element.style.backgroundColor = "#009933";
        element.style.borderRightColor = "#006622";
        element.style.borderBottomColor = "#006622";
        element.style.borderLeftColor = "#00cc44";
        element.style.borderTopColor = "#00cc44";
    }

    function m4hover(element) {
        element.style.backgroundColor = "#993399";
        element.style.borderRightColor = "#bf40bf";
        element.style.borderBottomColor = "#bf40bf";
        element.style.borderLeftColor = "#732673";
        element.style.borderTopColor = "#732673";
    }

    function m4unhover(element) {
        element.style.backgroundColor = "#cc00cc";
        element.style.borderRightColor = "#990099";
        element.style.borderBottomColor = "#990099";
        element.style.borderLeftColor = "#ff00ff";
        element.style.borderTopColor = "#ff00ff";
    }


    //----------------------------------------------------------------------------------

    function m1hoverbtn(element) {
        if (hoverstatus == 0){
            element.style.backgroundColor = "#b30000";
            element.style.borderRightColor = "#e60000";
            element.style.borderBottomColor = "#e60000";
            element.style.borderLeftColor = "#800000";
            element.style.borderTopColor = "#800000";
        }
    }

    function m1unhoverbtn(element) {
        if (hoverstatus == 0) {
            element.style.backgroundColor = "#ff3300";
            element.style.borderRightColor = "#cc2900";
            element.style.borderBottomColor = "#cc2900";
            element.style.borderLeftColor = "#ff5c33";
            element.style.borderTopColor = "#ff5c33";
        }
    }

    function m2hoverbtn(element) {
        if (hoverstatus == 0) {
            element.style.backgroundColor = "#6666ff";
            element.style.borderRightColor = "#8080ff";
            element.style.borderBottomColor = "#8080ff";
            element.style.borderLeftColor = "#4d4dff";
            element.style.borderTopColor = "#4d4dff";
        }
    }

    function m2unhoverbtn(element) {
        if (hoverstatus == 0) {
            element.style.backgroundColor = "dodgerblue";
            element.style.borderRightColor = "royalblue";
            element.style.borderBottomColor = "royalblue";
            element.style.borderLeftColor = "deepskyblue";
            element.style.borderTopColor = "deepskyblue";
        }
    }

    function m3hoverbtn(element) {
        if (hoverstatus == 0) {
            element.style.backgroundColor = "#008000";
            element.style.borderRightColor = "#009900";
            element.style.borderBottomColor = "#009900";
            element.style.borderLeftColor = "#004d00";
            element.style.borderTopColor = "#004d00";
        }
    }

    function m3unhoverbtn(element) {
        if (hoverstatus == 0) {
            element.style.backgroundColor = "#009933";
            element.style.borderRightColor = "#006622";
            element.style.borderBottomColor = "#006622";
            element.style.borderLeftColor = "#00cc44";
            element.style.borderTopColor = "#00cc44";
        }
    }

    function m4hoverbtn(element) {
        if (hoverstatus == 0) {
            element.style.backgroundColor = "#993399";
            element.style.borderRightColor = "#bf40bf";
            element.style.borderBottomColor = "#bf40bf";
            element.style.borderLeftColor = "#732673";
            element.style.borderTopColor = "#732673";
        }
    }

    function m4unhoverbtn(element) {
        if (hoverstatus == 0) {
            element.style.backgroundColor = "#cc00cc";
            element.style.borderRightColor = "#990099";
            element.style.borderBottomColor = "#990099";
            element.style.borderLeftColor = "#ff00ff";
            element.style.borderTopColor = "#ff00ff";
        }
    }

</script>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------deutschsystem-->

<script>

    deutschQuestAnswer = "";
    deutschQuestWahl = 0;
    deutschQuestArrayWahl = 0;
    deutschQuestNumber = 0;

    deutschar0 = ["klein", "kleiner", "am kleinsten"];
    deutschar1 = ["gut", "besser", "am besten"];
    deutschar2 = ["hoch", "höher", "am höchsten"];
    deutschar3 = ["groß", "größer", "am größten"];
    deutschar4 = ["schnell", "schneller", "am schnellsten"];
    deutschar5 = ["dick", "dicker", "am dicksten"];
    deutschar6 = ["spitz", "spitzer", "am spitzesten"];
    deutschar7 = ["freundlich", "freundlicher", "am freundlichsten"];
    deutschar8 = ["laut", "lauter", "am lautesten"];
    deutschar9 = ["leise", "leiser", "am leisesten"];
    deutschar10 = ["brav", "braver", "am bravsten"];

    deutscharrays = [deutschar0,
        deutschar1,
        deutschar2,
        deutschar3,
        deutschar4,
        deutschar5,
        deutschar6,
        deutschar7,
        deutschar8,
        deutschar9,
        deutschar10];

    function createDeutschQuest() {

        deutschQuestWahl = (Math.random() * (3 - 1)) + 1;
        deutschQuestWahl = Math.round(deutschQuestWahl);

        deutschQuestArrayWahl = (Math.random() * (10 - 0)) + 0;
        deutschQuestArrayWahl = Math.round(deutschQuestArrayWahl);

        deutschQuest = document.getElementById("deutschQuest");

        if (deutschQuestWahl==1){

            deutschQuest.innerHTML = "?" + " - " + deutscharrays[deutschQuestArrayWahl][1] + " - " + deutscharrays[deutschQuestArrayWahl][2];
            deutschQuestAnswer = deutscharrays[deutschQuestArrayWahl][0];
            deutschQuestNumber = 0;

        }else if (deutschQuestWahl==2){

            deutschQuest.innerHTML = deutscharrays[deutschQuestArrayWahl][0] + " - " + "?" + " - " + deutscharrays[deutschQuestArrayWahl][2];
            deutschQuestAnswer = deutscharrays[deutschQuestArrayWahl][1];
            deutschQuestNumber = 1;

        }else if (deutschQuestWahl==3){

            deutschQuest.innerHTML = deutscharrays[deutschQuestArrayWahl][0] + " - " + deutscharrays[deutschQuestArrayWahl][1] + " - " + "?";
            deutschQuestAnswer = deutscharrays[deutschQuestArrayWahl][2];
            deutschQuestNumber = 2;

        }

        createDeutschAnswerOptions();
    }

    function createDeutschAnswerOptions() {

        deutschQuestAnswerOptions1 = document.getElementById("deutschQuestAnswerOptions1");
        deutschQuestAnswerOptions2 = document.getElementById("deutschQuestAnswerOptions2");
        deutschQuestAnswerOptions3 = document.getElementById("deutschQuestAnswerOptions3");

        deutschw = (Math.random() * (3 - 1)) + 1;
        deutschw = Math.round(deutschw);

        do{
            deutschx = (Math.random() * (10 - 0)) + 0;
            deutschx = Math.round(deutschx);
        }while (deutschQuestArrayWahl == deutschx);

        do{
            deutschy = (Math.random() * (10 - 0)) + 0;
            deutschy = Math.round(deutschy);
        }while ((deutschQuestArrayWahl == deutschy)||(deutschx == deutschy));

        if (deutschw==1){

            deutschQuestAnswerOptions1.innerHTML = deutschQuestAnswer;
            deutschQuestAnswerOptions2.innerHTML = deutscharrays[deutschx][deutschQuestNumber];
            deutschQuestAnswerOptions3.innerHTML = deutscharrays[deutschy][deutschQuestNumber];

            deutschQuestAnswerOptions1.onclick = function() {
                deutschQuestAnswerOptions1.style.color = "green";
                correctmusic();
                setTimeout(function () {
                    deutschQuestAnswerOptions1.style.color = "black";
                    deutschQuestAnswerOptions2.style.color = "black";
                    deutschQuestAnswerOptions3.style.color = "black";
                    createDeutschQuest();
                },1000);
            }
            deutschQuestAnswerOptions2.onclick = function() {
                deutschQuestAnswerOptions2.style.color = "red";
                deutschQuestAnswerOptions3.style.color = "red";
                wrongmusic();
                setTimeout(function () {
                    deutschQuestAnswerOptions1.style.color = "black";
                    deutschQuestAnswerOptions2.style.color = "black";
                    deutschQuestAnswerOptions3.style.color = "black";
                    createDeutschQuest();
                },1000);
            }
            deutschQuestAnswerOptions3.onclick = function() {
                deutschQuestAnswerOptions2.style.color = "red";
                deutschQuestAnswerOptions3.style.color = "red";
                wrongmusic();
                setTimeout(function () {
                    deutschQuestAnswerOptions1.style.color = "black";
                    deutschQuestAnswerOptions2.style.color = "black";
                    deutschQuestAnswerOptions3.style.color = "black";
                    createDeutschQuest();
                },1000);
            }

        }else if (deutschw==2){

            deutschQuestAnswerOptions1.innerHTML = deutscharrays[deutschx][deutschQuestNumber];
            deutschQuestAnswerOptions2.innerHTML = deutschQuestAnswer;
            deutschQuestAnswerOptions3.innerHTML = deutscharrays[deutschy][deutschQuestNumber];

            deutschQuestAnswerOptions2.onclick = function() {
                deutschQuestAnswerOptions2.style.color = "green";
                correctmusic();
                setTimeout(function () {
                    deutschQuestAnswerOptions1.style.color = "black";
                    deutschQuestAnswerOptions2.style.color = "black";
                    deutschQuestAnswerOptions3.style.color = "black";
                    createDeutschQuest();
                },1000);
            }
            deutschQuestAnswerOptions1.onclick = function() {
                deutschQuestAnswerOptions1.style.color = "red";
                deutschQuestAnswerOptions3.style.color = "red";
                wrongmusic();
                setTimeout(function () {
                    deutschQuestAnswerOptions1.style.color = "black";
                    deutschQuestAnswerOptions2.style.color = "black";
                    deutschQuestAnswerOptions3.style.color = "black";
                    createDeutschQuest();
                },1000);
            }
            deutschQuestAnswerOptions3.onclick = function() {
                deutschQuestAnswerOptions1.style.color = "red";
                deutschQuestAnswerOptions3.style.color = "red";
                wrongmusic();
                setTimeout(function () {
                    deutschQuestAnswerOptions1.style.color = "black";
                    deutschQuestAnswerOptions2.style.color = "black";
                    deutschQuestAnswerOptions3.style.color = "black";
                    createDeutschQuest();
                },1000);
            }

        }else if (deutschw==3){

            deutschQuestAnswerOptions1.innerHTML = deutscharrays[deutschx][deutschQuestNumber];
            deutschQuestAnswerOptions2.innerHTML = deutscharrays[deutschy][deutschQuestNumber];
            deutschQuestAnswerOptions3.innerHTML = deutschQuestAnswer;

            deutschQuestAnswerOptions3.onclick = function() {
                deutschQuestAnswerOptions3.style.color = "green";
                correctmusic();
                setTimeout(function () {
                    deutschQuestAnswerOptions1.style.color = "black";
                    deutschQuestAnswerOptions2.style.color = "black";
                    deutschQuestAnswerOptions3.style.color = "black";
                    createDeutschQuest();
                },1000);
            }
            deutschQuestAnswerOptions1.onclick = function() {
                deutschQuestAnswerOptions1.style.color = "red";
                deutschQuestAnswerOptions2.style.color = "red";
                wrongmusic();
                setTimeout(function () {
                    deutschQuestAnswerOptions1.style.color = "black";
                    deutschQuestAnswerOptions2.style.color = "black";
                    deutschQuestAnswerOptions3.style.color = "black";
                    createDeutschQuest();
                },1000);
            }
            deutschQuestAnswerOptions2.onclick = function() {
                deutschQuestAnswerOptions1.style.color = "red";
                deutschQuestAnswerOptions2.style.color = "red";
                wrongmusic();
                setTimeout(function () {
                    deutschQuestAnswerOptions1.style.color = "black";
                    deutschQuestAnswerOptions2.style.color = "black";
                    deutschQuestAnswerOptions3.style.color = "black";
                    createDeutschQuest();
                },1000);
            }

        }

    }

</script>

<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------blobbounce-->

<script>

    //blob
    var blobcolor = document.getElementById("blobcolor");
    var blobmerkmale = document.getElementById("blobmerkmale");
    var blobclothing = document.getElementById("blobclothing");
    var blobeyes = document.getElementById("blobeyes");
    var blobmouth = document.getElementById("blobmouth");
    var blobaccessoires = document.getElementById("blobaccessoires");
    var blobcostume = document.getElementById("blobcostume");
    var blobhat = document.getElementById("blobhat");

    blobhat.addEventListener("click", function(e){
        e.preventDefault;

        blobcolor.classList.remove("animation-target");
        blobmerkmale.classList.remove("animation-target");
        blobclothing.classList.remove("animation-target");
        blobeyes.classList.remove("animation-target");
        blobmouth.classList.remove("animation-target");
        blobaccessoires.classList.remove("animation-target");
        blobcostume.classList.remove("animation-target");
        blobhat.classList.remove("animation-target");

        void blobcolor.offsetWidth;
        void blobmerkmale.offsetWidth;
        void blobclothing.offsetWidth;
        void blobeyes.offsetWidth;
        void blobmouth.offsetWidth;
        void blobaccessoires.offsetWidth;
        void blobcostume.offsetWidth;
        void blobhat.offsetWidth;

        blobcolor.classList.add("animation-target");
        blobmerkmale.classList.add("animation-target");
        blobclothing.classList.add("animation-target");
        blobeyes.classList.add("animation-target");
        blobmouth.classList.add("animation-target");
        blobaccessoires.classList.add("animation-target");
        blobcostume.classList.add("animation-target");
        blobhat.classList.add("animation-target");

    }, false);


    //blobload
    var blobload = document.getElementById("loadingGIF");

    blobload.addEventListener("click", function(e){
        e.preventDefault;

        blobload.classList.remove("animation-target");

        void blobload.offsetWidth;

        blobload.classList.add("animation-target");
    }, false);

</script>

<!--------------------------------------------------------------------------------------------------------------------->

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
