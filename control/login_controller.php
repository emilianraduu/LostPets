<?php
require 'db.php';

if (isset($_POST['email'])) {
    $db = new Database;
    $email = mysqli_real_escape_string($db->getCon(), $_POST['email']);
    $password = mysqli_real_escape_string($db->getCon(), $_POST['password']);
    $password = hash("sha256", $password);

    $user = $db->login($email,$password);
    
    if($user != null){
        header('location: ../home');
    }
    else 
    {
        header('location: ../login/error');
    }
}
