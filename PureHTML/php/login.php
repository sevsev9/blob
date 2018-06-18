<?php

require_once "session.php";

$servername = "172.17.0.3";
$dbname = "blob_users";
$dbuname = "webacc";
$dbpassw = "Blob_256!";

//error_reporting(0);
ini_set('display_errors',1);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_SESSION['login_user'] == null || $_SESSION['login_user'] == '') {
        $db = mysqli_connect($servername, $dbuname, $dbpassw, $dbname);

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // username and password sent from form
        $umail = test_input($_POST["umail"]);
        $psw = test_input($_POST["psw"]);

        $pswlen = strlen($psw);

        $sql = "SELECT * FROM users WHERE (username = '$umail' AND password ='$psw') OR (email = '$umail' AND password = '$psw')";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        // If result matched $username and $password, table row must be 1 row
        if ($count == 1) {
            $sql = "SELECT * FROM users WHERE (username = '$umail' AND password='$psw') OR (email = '$umail' AND password = '$psw')";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            //For debug
            /*  print_r($row["username"]);
                echo "<br>";
                print_r($row["curr_xp"]);
                echo "<br>";
                print_r($row["level"]);
                echo "<br>";
                print_r($row["blob_name"]);
                echo "<br>";
                print_r($row["coins"]);
                echo "<br>";*/

            $_SESSION['login_user'] = $row["username"];
            $_SESSION['curr_xp'] = $row["xp"];
            $_SESSION['level'] = $row["level"];
            $_SESSION['blob_name'] = $row["blob_name"];
            $_SESSION['coins'] = $row["coins"];
            $_SESSION['blob_id'] = $row["blob_id"];

            $sql = "SELECT * FROM blob_users.blobs WHERE id LIKE " . $row['blob_id'];
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $_SESSION['blob']['name'] = $row["name"];

            if (    $row["hat"] == "") {
                    $_SESSION['blob']['hat'] = "notfound";
            } else {$_SESSION['blob']['hat'] = $row["hat"];}

            if (    $row['eyes'] == "") {
                    $_SESSION['blob']['eyes'] = "notfound";
            } else {$_SESSION['blob']['eyes'] = $row["eyes"];}

            if (    $row['clothing'] == "") {
                    $_SESSION['blob']['clothing'] = "notfound";
            } else {$_SESSION['blob']['clothing'] = $row["clothing"];}

            if (    $row['color'] == "") {
                    $_SESSION['blob']['color'] = "notfound";
            } else {$_SESSION['blob']['color'] = $row["color"];}

            if (    $row['costume'] == "") {
                    $_SESSION['blob']['costume'] = "notfound";
            } else {$_SESSION['blob']['costume'] = $row["costume"];}

            if (    $row['mouth'] == "") {
                    $_SESSION['blob']['mouth'] = "notfound";
            } else {$_SESSION['blob']['mouth'] = $row["mouth"];}

            if (    $row['accessoires'] == "") {
                    $_SESSION['blob']['accessoires'] = "notfound";
            } else {$_SESSION['blob']['accessoires'] = $row["accessoires"];}

            if (    $row['merkmale'] == "") {
                    $_SESSION['blob']['merkmale'] = "notfound";
            } else {$_SESSION['blob']['merkmale'] = $row["merkmale"];}

            if (    $row['wallpapers'] == "") {
                $_SESSION['blob']['wallpapers'] = "notfound";
            } else {$_SESSION['blob']['wallpapers'] = $row["wallpapers"];}

            //Debug Purpose
            echo "<table>
                        <tr>
                            <td>Username</td>
                            <td>".$_SESSION["login_user"]."</td>
                        </tr>
                        <tr>
                            <td>XP</td>
                            <td>".$_SESSION["curr_xp"]."</td>
                        </tr>
                        <tr>
                            <td>Coins</td>
                            <td>".$_SESSION["coins"]."</td>
                        </tr>
                        <tr>
                            <td>Blob Name</td>
                            <td>".$_SESSION['blob']["name"]."</td>
                        </tr>
                        <tr>
                            <td>Blob id</td>
                            <td>".$_SESSION["blob_id"]."</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>".$_SESSION['blob']["name"]."</td>
                        </tr>
                        <tr>
                            <td>Hat</td>
                            <td>".$_SESSION['blob']["hat"]."</td>
                        </tr>
                        <tr>
                            <td>Eyes</td>
                            <td>".$_SESSION['blob']["eyes"]."</td>
                        </tr>
                        <tr>
                            <td>Clothing</td>
                            <td>".$_SESSION['blob']["clothing"]."</td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>".$_SESSION['blob']["color"]."</td>
                        </tr>
                        <tr>
                            <td>Costume</td>
                            <td>".$_SESSION['blob']["costume"]."</td>
                        </tr>
                        <tr>
                            <td>Mouth</td>
                            <td>".$_SESSION['blob']["mouth"]."</td>
                        </tr>
                        <tr>
                            <td>Accessoires</td>
                            <td>".$_SESSION['blob']["accessoires"]."</td>
                        </tr>
                        <tr>
                            <td>Merkmale</td>
                            <td>".$_SESSION['blob']["merkmale"]."</td>
                        </tr>
                        <tr>
                            <td>Wallpaper</td>
                            <td>".$_SESSION['blob']["wallpapers"]."</td>
                        </tr>
                      </table>";

                $db->close();
            errorAlert('',0);
        } else {
            errorAlert("Invalid Username/Email and Password combination!",1);
        }
    } else {
        errorAlert("You are already logged in".$_SESSION['login_user'],0);
    }
}

function errorAlert($message, $nr) {
    $paths = array("../pages/gui.php","../index.php");
    echo "<script type='text/javascript'>
           const text = '$message';
                    if (text) {
                        window.alert('$message');
                    }
                    
                    function sleep (time) {
                      return new Promise((resolve) => setTimeout(resolve, time));
                    }
                    
                    sleep(20000).then(() => {
                        window.location.replace(\"$paths[$nr]\");
                    });                            
                </script>";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


