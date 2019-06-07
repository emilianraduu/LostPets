<?php
class Database
{
  private $address = '127.0.0.1';
  private $user = 'lostpets_account';
  private $password = 'pass';
  private $database = 'lost_pets';
  public $con = null;

  function __construct()
  {
    $this->con = mysqli_connect($this->address, $this->user, $this->password, $this->database);
  }
  function getCon()
  {
    return $this->con;
  }

  function register($user)
  {
    $query = $this->getCon()->prepare("INSERT INTO user (id_user, mail, lname, fname, password, avatar, phone) VALUES(DEFAULT,?,?,?,?,?,?)");
    $query->bind_param("ssssss", $user->getEmail(), $user->getLname(), $user->getFname(), $user->getPassword(), $user->getAvatar(), $user->getPhone());
    if ($query->execute()) {
      $query->close();
      return true;
    } else {
      $query->close();
      return false;
    }
  }

  function login($email, $password)
  {
    $query = $this->getCon()->prepare("SELECT * FROM user WHERE mail = ? AND password = ?");
    $query->bind_param("ss", $email, $password);
    $query->execute();
    $query->bind_result($id_user, $mail, $lname, $fname, $password, $avatar, $phone);
    $query->store_result();
    if ($query->fetch()) {
      $temp = new User($mail, $password, $fname, $lname, $avatar, $phone);
      return $temp;
    } else {
      return null;
    }
  }

  function getUser($id){
    $query = $this->getCon()->prepare("SELECT * FROM user WHERE id_user like ?");
    $query->bind_param("s", $id);
    $query->execute();
    $query->bind_result($id_user, $mail, $lname, $fname, $password, $avatar, $phone);
    $query->store_result();
    if ($query->fetch()) {
      $temp = new User($mail, $password, $fname, $lname, $avatar, $phone);
      return $temp;
    } else {
      return null;
    }
  }

  function getId($user){
    $query = $this->getCon()->prepare("SELECT id_user FROM user WHERE mail like ?");
    $query->bind_param("s", $user->getEmail());
    $query->execute();
    $query->bind_result($id_user);
    $query->store_result();
    if ($query->fetch()) {
      return $id_user;
    } else {
      return null;
    }
  }
  function updateEmail($user, $newEmail)
  { }
}
