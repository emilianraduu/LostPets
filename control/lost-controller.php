<?php
require 'db.php';
session_start();
// $id_user = mysqli_real_escape_string($db->getCon(), $_POST['id_user']);

if (isset($_POST['location'])){
    
    $db = new Database;
    $id_user = mysqli_real_escape_string($db->getCon(), $_POST['id_user']);
    $id_pet = mysqli_real_escape_string($db->getCon(), $_POST['id_pet']);
    $location = mysqli_real_escape_string($db->getCon(), $_POST['location']);
    
    $db->foundPet($id_user,$id_pet,$location);
        header('location: ../pet#'.$id_pet);
}