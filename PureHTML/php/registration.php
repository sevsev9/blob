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

    $db = mysqli_connect($servername,$dbuname,$dbpassw,$dbname);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT username FROM users WHERE (username = '$uname')";
    $result = mysqli_query($db,$sql);
    $username_reg = mysqli_fetch_object($result);

    if ($username_reg->uname != "") {
        echo "<br>You are already registered!<br>";
        echo "Please Login<br><br>";

        echo "<a href='../pages/gui.html' class='button_login-form'>Login</a><br><br>";
    } else {
        $sql = "INSERT INTO users (vorname, nachname, email, username, password, schulname, klasse) VALUES ('$fname','$lname','$email','$uname','$psw','$school','$class_')";

        if ($db->query($sql) === TRUE) {
            echo "<h4 style='text-align: center'>Registered Successfully</h4>";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }



    if ($db->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
}

function showInput($fname,$lname,$email,$uname,$psw) {
    echo "<h1>Input:</h1>";echo "<br>";
    echo "Username :  ";
    echo $uname;
    echo "<br>";
    echo "Password :  ";
    echo $psw;
    echo "<br>";
    echo "E-Mail   :  ";
    echo $email;
    echo "<br>";
    echo "Fist Name:  ";
    echo $fname;
    echo "<br>";
    echo "Last Name:  ";
    echo $lname;
    echo "<br>";
    echo "Date     :  ";
    exit();
}
?>