<?php

require_once "session.php";

$servername = "172.17.0.5";
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

            $sql = "SELECT * FROM blob_users.blobs WHERE id LIKE ".$row['blob_id'];
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $_SESSION['blob']['name'] = $row["name"];
            $_SESSION['blob']['hat'] = $row["hat"];
            $_SESSION['blob']['eyes'] = $row["eyes"];
            $_SESSION['blob']['clothing'] = $row["clothing"];
            $_SESSION['blob']['color'] = $row["color"];
            $_SESSION['blob']['costume'] = $row["costume"];
            $_SESSION['blob']['mouth'] = $row["mouth"];
            $_SESSION['blob']['accessoires'] = $row["accessoires"];
            $_SESSION['blob']['merkmale'] = $row["merkmale"];

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
                            <td>".$row["name"]."</td>
                        </tr>
                        <tr>
                            <td>Blob id</td>
                            <td>".$row["id"]."</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>".$row["name"]."</td>
                        </tr>
                        <tr>
                            <td>Hat</td>
                            <td>".$row["hat"]."</td>
                        </tr>
                        <tr>
                            <td>Eyes</td>
                            <td>".$row["eyes"]."</td>
                        </tr>
                        <tr>
                            <td>Clothing</td>
                            <td>".$row["clothing"]."</td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>".$row["color"]."</td>
                        </tr>
                        <tr>
                            <td>Costume</td>
                            <td>".$row["costume"]."</td>
                        </tr>
                        <tr>
                            <td>Mouth</td>
                            <td>".$row["mouth"]."</td>
                        </tr>
                        <tr>
                            <td>Accessoires</td>
                            <td>".$row["accesssoires"]."</td>
                        </tr>
                        <tr>
                            <td>Merkmale</td>
                            <td>".$row["merkmale"]."</td>
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
                    
                    sleep(0).then(() => {
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


