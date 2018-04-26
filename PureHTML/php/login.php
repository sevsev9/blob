<?php
$servername = "localhost";
$dbname = "blob_users";
$dbuname = "webaccess";
$dbpassw = "Blob_256!";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    if ($_SESSION["login_user"] == '') {
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


        // If result matched $username and $password, table row must be 1 row
        if ($count == 1) {
            $sql = "SELECT username FROM users WHERE (username = '$umail' AND password='$psw') OR (email = '$umail' AND password = '$psw')";
            $result = mysqli_query($db, $sql);
            $username = mysqli_fetch_object($result);

            session_start();
            $_SESSION['userName'] = 'Root';
            $_SESSION['login_user'] = $username;

            $db->close();
            errorAlert('');
        } else {
            errorAlert("Invalid Username/Email and Password combination!");
        }
    } else {
        $usr = $_SESSION['login_user'];
        errorAlert("You are already logged in");
    }
}

function errorAlert($message) {
    echo "<script type='text/javascript'>
            var text = '$message';                     
                    
                    if (text) {
                        window.alert('$message');
                    }
                    
                    function sleep (time) {
                      return new Promise((resolve) => setTimeout(resolve, time));
                    }
                    
                    sleep(0).then(() => {
                        window.location.replace(\"../pages/gui.html\");
                    });                            
                </script>";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


