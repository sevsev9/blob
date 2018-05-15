<?php
    require_once "../php/session.php";
    error_reporting(0);
    //ini_set('display_errors',1);
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



<!----------------------------------------------------------------------------------------------------------------------STANDARD_HUD-->
<div class="zentr">
    <div class="name fadeoutdiv"><?= $_SESSION['blob_name']?></div>
    <div class="xp"><?= $_SESSION['curr_xp']?>/<!-- javascript calculation -->xp</div>
</div>
<div class="coins"><?= $_SESSION['coins']?> Coins</div>
<!--------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------mathebox-->


<div id="matheboxfull" class="fadeindiv">
    <h1 class="matheX MouseHover" style="z-index: 501" onclick="closemathe()">X</h1>
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
    <h1 class="englishX MouseHover" style="z-index: 501" onclick="closeenglish()">X</h1>
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

<!----------------------------------------------------------------------------------------------------------------------helpbox-->


<div id="helpboxfull" class="fadeindiv">
    <h1 class="helpX MouseHover" style="z-index: 501" onclick="closehelp()">X</h1>
    <img src="../img/helpBox.png" width="73.75%" class="helpBox">
    <span style="position: absolute;left: 64%;top: 2%;font-family: 'Arial Black';font-size: 50em;z-index: 51;opacity: 0.3;">?</span>
    <p class="helpText">
        Du befindest dich hier im Hilfebereich des Spiels!
        <br>Hier findest du allerhand Tipps und Tricks.
        <br>
        <br><span style="color: white">Navigationsbeschreibung:
    <br>Links in der Navigation findest du ganz oben das Geschäft (Shop),
    <br>darunter die Mathe- und Englischaufgaben.
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
    <h1 class="infoX MouseHover" style="z-index: 501" onclick="closeinfo()">X</h1>
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
        <button style="top: -14%" id="tabup" class="tablinks other MouseHover" onclick="openTab(event, 'color')"><img src="../img/standard/color_standard.png" class="MouseHover" id="tabicon" style="top: 12%; left: 3%; width: 90%;"></button>
        <button style="top: 0%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'merkmale')"><img src="../img/standard/merkmal_standard.png" class="MouseHover" id="tabicon" style="top: 14%; left: 3%; width: 90%;"></button>
        <button style="top: 14%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'eyes')"><img src="../img/standard/eyes_standard.png" class="MouseHover" id="tabicon" style="top: 25%; left: 2%; width: 95%;"></button>
        <button style="top: 28%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'mouth')"><img src="../img/standard/mouth_standard.png" class="MouseHover" id="tabicon" style="top: 45%; left: 2%; width: 95%;"></button>
        <button style="top: 42%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'clothing')"><img src="../img/standard/clothing_standard.png" class="MouseHover" id="tabicon" style="top: 50%; left: 2%; width: 95%;"></button>
        <button style="top: 56%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'accessoires')"><img src="../img/standard/accessoires_standard.png" class="MouseHover" id="tabicon" style="top: 25%; left: 5%; width: 90%;"></button>
        <button style="top: 70%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'hat')"><img src="../img/standard/hat_standard.png" class="MouseHover" id="tabicon" style="top: 15%; left: 5%; width: 90%;"></button>
        <button style="top: 84%" class="tabmid tablinks other MouseHover" onclick="openTab(event, 'costume')"><img src="../img/standard/costume_standard.png" class="MouseHover" id="tabicon" style="top: 13%; left: 5%; width: 90%;"></button>
        <button style="top: 98%" id="tabdown" class="tablinks other MouseHover" onclick="openTab(event, 'wallpaper')"><img src="../img/standard/background_standard.png" class="MouseHover" id="tabicon" style="top: 25%; left: 0%; width: 100%; user-select: none;"></button>
    </div>


    <img src="../img/shop.png" style="width:80%; z-index: 500; position: relative">
    <h1 class="shopX MouseHover" style="z-index: 501" onclick="closeshop()">X</h1>



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
    <div class="shopinhalt" id="wallpaper">
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->

</div>

<!--Shop Item Script-->
<?php
//Create Javascript Item Array
$servername = "localhost";
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

    echo "<script type='text/javascript'>";

    //createItem(id, itemname, itemimage, cost, bought, wearing)
//Augen
    //document.getElementById('eyes')
    while ($rows[$ctr] != null){
        if ($rows[$ctr]['item_class'] == "eyes") {
            echo "createItem(document.getElementById('eyes'),
                            '".$rows[$ctr]['name']."',
                            '".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['cost']."',
                            '".$rows[$ctr]['bought']."',
                            '".$rows[$ctr]['wearing']."'
               );";
        }
//Kleidung
        //document.getElementById('clothing')
        elseif ($rows[$ctr]['item_class'] == "clothing") {
            echo "createItem(document.getElementById('clothing'),
                            '".$rows[$ctr]['name']."',
                            '".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['cost']."',
                            '".$rows[$ctr]['bought']."',
                            '".$rows[$ctr]['wearing']."'
               );";
        }
//Farbe
        //document.getElementById('color')
        elseif ($rows[$ctr]['item_class'] == "color") {
            echo "createItem(document.getElementById('color'),
                            '".$rows[$ctr]['name']."',
                            '".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['cost']."',
                            '".$rows[$ctr]['bought']."',
                            '".$rows[$ctr]['wearing']."'
               );";
        }
//Kostüm
        //document.getElementById('costume')
        elseif ($rows[$ctr]['item_class'] == "costume") {
            echo "createItem(document.getElementById('costume'),
                            '".$rows[$ctr]['name']."',
                            '".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['cost']."',
                            '".$rows[$ctr]['bought']."',
                            '".$rows[$ctr]['wearing']."'
               );";
        }
//Hut
        //document.getElementById('hat')
        elseif ($rows[$ctr]['item_class'] == "hat") {
            echo "createItem(document.getElementById('hat'),
                            '".$rows[$ctr]['name']."',
                            '".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['cost']."',
                            '".$rows[$ctr]['bought']."',
                            '".$rows[$ctr]['wearing']."'
               );";
        }
//Mund
        //document.getElementById('mouth')
        elseif ($rows[$ctr]['item_class'] == "mouth") {
            echo "createItem(document.getElementById('mouth'),
                            '".$rows[$ctr]['name']."',
                            '".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['cost']."',
                            '".$rows[$ctr]['bought']."',
                            '".$rows[$ctr]['wearing']."'
               );";
        }
//Accessoirs
        //document.getElementById('accessoires')
        elseif ($rows[$ctr]['item_class'] == "accessoires") {
            echo "createItem(document.getElementById('accessoires'),
                            '".$rows[$ctr]['name']."',
                            '".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['cost']."',
                            '".$rows[$ctr]['bought']."',
                            '".$rows[$ctr]['wearing']."'
               );";
        }
//Merkmale
        //document.getElementById('merkmale')
        elseif ($rows[$ctr]['item_class'] == "merkmale") {
            echo "createItem(document.getElementById('merkmale'),
                            '".$rows[$ctr]['name']."',
                            '".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['cost']."',
                            '".$rows[$ctr]['bought']."',
                            '".$rows[$ctr]['wearing']."'
               );";
        }
//Wallpaper
        //document.getElementById('wallpapers')
        elseif ($rows[$ctr]['item_class'] == "wallpapers") {
            echo "createItem(document.getElementById('wallpapers'),
                            '".$rows[$ctr]['name']."',
                            '".$rows[$ctr]['path']."',
                            '".$rows[$ctr]['cost']."',
                            '".$rows[$ctr]['bought']."',
                            '".$rows[$ctr]['wearing']."'
               );";
        }

        $ctr++;
    }

    echo"</script>";
}
//echo "<p>".json_encode($rows)."</p>";
//echo "<p>".json_encode($rows[0]["id"])."</p>";

echo  "
<script type='text/javascript'>
//Item Name Array
    var names = [];
//Item Price Array
    var prices = [];
//Item Image Path Array
    var imgpaths = [];
    
    
</script>
    ";
?>

<!--------------------------------------------------------------------------------------------------------------------->



<!----------------------------------------------------------------------------------------------------------------------FULLSCREEN-->
<div id="startgamediv">
    <img src="../img/Game_Start_Button.png" id="startgame" onclick="toggleFullscreen()" class="MouseHover Gamestartbuttonhover" onmouseover="hover(this);" onmouseout="unhover(this);">
    <img src="../img/Game_Start_Button_Shadow.png" id="startgameshadow">
</div>
<span id="wt">Welcome to</span>
<img src="../img/logo_new.png" id="bl">
<span id="pb">presented by</span>
<span id="ts">Team Skrt</span>
<img src="../img/background_purple.png" width="100%" id="background" style="z-index: 0"/>
<img src="../img/loading_final.gif" id="loadingGIF">
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->



<!----------------------------------------------------------------------------------------------------------------------NAVBAR-->
<nav>
    <ul>
        <li>
            <div id="navbaropeniconoverlay" class="MouseHover" onclick="openNav()"></div>
            <span class="openBtn" id="navopenicon">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
            </span>
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
            <span class="infoTxt text MouseHover" onclick="openNav(), infoboxopen()">Info</span><img src="../img/info.png" width="25%" class="infoBtn">
        </li>
        <li>
            <span class="helpTxt text MouseHover" onclick="openNav(), helpboxopen()">Help</span><img src="../img/help.png" width="25%" class="helpBtn">
        </li>
        <li>
            <span class="logoutTxt text MouseHover" onclick="openNav(), logout()">Logout</span><img src="../img/cancel.png" width="25%" class="logoutBtn">
        </li>
    </ul>
</nav>
<!----------------------------------------------------------------------------------------------------------------------BLOB-->
<div class="fadeoutdiv">
    <img src="../img/Blob_basic.png" width="40%" class="blobbox MouseHover" id="blobbox1">
</div>
<!--------------------------------------------------------------------------------------------------------------------->
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
        helpboxfull = document.getElementById("helpboxfull");
        helpboxfull.style.display = "none";
        infoboxfull = document.getElementById("infoboxfull");
        infoboxfull.style.display = "none";

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

        document.getElementById("navopenicon").classList.remove("change");

        document.getElementById("VokabelNextBtn").style.opacity = 0;
        document.getElementById("VokabelOkBtn").style.opacity = 0;
    }

    //Englisch schließen
    function closeenglish(){
        $(document).ready(function(){
            $("#vokabelboxfull").css({zIndex:10}).fadeOut(1000);
            $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
        });
    }

    //Helpbox
    function helpboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
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
        });
    }

    //Helpbox
    function infoboxopen() {
        $(document).ready(function(){
            $("nav").animate({left: '-9.8%'}, 1000);
            $('.fadeoutdiv').css({zIndex:10}).fadeOut(1000);
            $('#infoboxfull').css({zIndex:9}).fadeIn(1000);
            navCount = 1;
        });

        document.getElementById("navopenicon").classList.remove("change");
    }

    //Help schließen
    function closeinfo(){
        $(document).ready(function(){
            $("#infoboxfull").css({zIndex:10}).fadeOut(1000);
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
                $('#helpboxfull').css({zIndex:10}).fadeOut(1000);
                $('#infoboxfull').css({zIndex:10}).fadeOut(1000);
                $('.fadeoutdiv').css({zIndex:9}).fadeIn(1000);
            });
            navCount=0;
        }else{
            $(document).ready(function(){
                $("nav").animate({left: '-9.8%'}, 1000);
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

    $('#VokabelQuestInput').keydown(function(e) {
        if(e.which == 13) { return false; }
    });

</script>

<!--------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------blobbounce-->

<script>

    //blob
    var element = document.getElementById("blobbox1");

    element.addEventListener("click", function(e){
        e.preventDefault;

        element.classList.remove("animation-target");

        void element.offsetWidth;

        element.classList.add("animation-target");
    }, false);

    //blobload
    var elementload = document.getElementById("loadingGIF");

    elementload.addEventListener("click", function(e){
        e.preventDefault;

        elementload.classList.remove("animation-target");

        void elementload.offsetWidth;

        elementload.classList.add("animation-target");
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
