<?php
require 'db.php';
session_start();
// $id_user = mysqli_real_escape_string($db->getCon(), $_POST['id_user']);



$db = new Database;
$id_user = mysqli_real_escape_string($db->getCon(), $_POST['id']);
$id_pet = mysqli_real_escape_string($db->getCon(), $_POST['pet']);
$location = mysqli_real_escape_string($db->getCon(), $_POST['locationsend']);


if ($db->updateFoundPet($id_user, $id_pet, $location))
    header('location: ../pet#' . $id_pet);
