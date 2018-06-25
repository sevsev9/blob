<?php
/**
 *
 * Created by PhpStorm.
 * User: maise
 * Date: 17.06.2018
 * Time: 18:24
 * @param $coins
 */
require_once "session.php";

buyItem($_POST['buyItem'],$_POST['itemname']);

function buyItem($coins,$itemname) {
    $_SESSION['coins'] = $coins;
    echo "<script>alert('Coins:  ".$coins."     Itemname: ".$itemname."');</script>";
    update($itemname);
}



if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



//
//

function update($itemname) {
    $servername = "172.17.0.6";
    $dbname = "blob_users";
    $dbuname = "webacc";
    $dbpassw = "Blob_256!";

    $db = mysqli_connect($servername, $dbuname, $dbpassw, $dbname);

    $sql = "USE blob_users";
    $sql .= "UPDATE `users` SET `$itemname` = '1' WHERE `users`.`username` = ".$_SESSION['login_user'].";";

    mysqli_query($db, $sql);
}