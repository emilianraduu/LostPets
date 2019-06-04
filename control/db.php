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
      return new User($email, $password, $fname, $lname, $avatar, $phone);
    } else return null;
  }

  function updateEmail($user, $newEmail)
  { }
}
