<?php

require_once "session.php";

$servername = "localhost";
$dbname = "blob_users";
$dbuname = "webacc";
$dbpassw = "Blob_256!";

error_reporting(0);
//ini_set('display_errors',1);


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



        //$active = $row['active'];
        $count = mysqli_num_rows($result);
        //Debugging puropse
        /*      echo $sql;
                echo "<br>";
                print_r($result);
                echo "<br>";
                print_r($row);
                echo "<br>";
                echo $count;
        */

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
            $_SESSION['curr_xp'] = $row["curr_xp"];
            $_SESSION['level'] = $row["level"];
            $_SESSION['blob_name'] = $row["blob_name"];
            $_SESSION['coins'] = $row["coins"];

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


