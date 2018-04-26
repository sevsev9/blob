<?php
/**
 * Created by PhpStorm.
 * User: maise
 * Date: 25.04.2018
 * Time: 13:36
 */

$servername = "localhost";
$dbname = "blob_users";
$dbuname = "webacc";
$dbpassw = "Blob_256!";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $email = test_input($_POST["email"]);
    $username = test_input($_POST["uname"]);
    $psw = test_input($_POST["psw"]);
    $school = test_input($_POST["school"]);
    $class_= test_input($_POST["class_"]);
    save_todb($fname,$lname,$email,$username,$psw,$school,$class_,$servername,$dbname,$dbuname,$dbpassw);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function save_todb($fname,$lname,$email,$uname,$psw,$school,$class_,$servername,$dbname,$dbuname,$dbpassw) {

    if ($uname == null || $psw == null || $fname == null || $lname == null) {
    }

    $db = mysqli_connect($servername,$dbuname,$dbpassw,$dbname);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT username FROM users WHERE (username = '$uname')";
    $result = mysqli_query($db,$sql);
    $username_reg = mysqli_fetch_object($result);

    if ($username_reg->uname != "") {
        errorAlert("You are already Registered!\n Please login", 0);
    } else {
        $sql = "INSERT INTO users (vorname, nachname, email, username, password, schulname, klasse) VALUES ('$fname','$lname','$email','$uname','$psw','$school','$class_')";

        if ($db->query($sql) === TRUE) {
            errorAlert("Successfully Registered");
        } else {
            errorAlert("Error: " . $sql . "\n" . $db->error);
        }
    }

    $db->close();
}

function errorAlert($message, $nr) {
    echo "<script type='text/javascript'>                      
                    window.alert('$message');
                    
                    function sleep (time) {
                      return new Promise((resolve) => setTimeout(resolve, time));
                    }
                    
                    sleep(0).then(() => {
                        window.location.replace(\"../pages/gui.html\");
                    });                            
                </script>";
}
?>