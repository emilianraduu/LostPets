<?php
require 'db.php';
require 'user.php';

if (isset($_POST['email'])) {

    $db = new Database;
    $email = mysqli_real_escape_string($db->getCon(), $_POST['email']);
    $password = mysqli_real_escape_string($db->getCon(), $_POST['password']);
    $password = hash("sha256", $password);

    $user = $db->login($email, $password);
    if ($user) {
        session_start();
        $sessionID = generateRandomString();
        $_SESSION['SID'] = $sessionID;
        $_SESSION['UID'] = $db->getId($user);
        header('location: ../home');
    } else {
        header('location: ../login/error');
    }
}

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
?>