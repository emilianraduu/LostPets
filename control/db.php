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

  function getUser($id)
  {
    $query = $this->getCon()->prepare("SELECT * FROM user WHERE id_user LIKE ?");
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

  function unactivated($id_user)
  {
    $query = $this->getCon()->prepare("INSERT INTO verify (id_user,	activate_code, activated) VALUES ((SELECT id_user FROM user WHERE id_user LIKE ?),?, DEFAULT)");
    $temp = $this->generateRandomString();
    $query->bind_param("is", $id_user, $temp);
    $query->execute();
    return $temp;
  }

  function getId($user)
  {
    $query = $this->getCon()->prepare("SELECT id_user FROM user WHERE mail LIKE ?");
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

  function insertPet($pet, $user)
  {
    $query = $this->getCon()->prepare("INSERT INTO pet (id_pet,gallery,location,name,species,breed,details,reward) VALUES (DEFAULT,?,?,?,?,?,?,?)");
    $query->bind_param("sssssss", $pet->getGallery(), $pet->getLocation(), $pet->getName(), $pet->getSpecies(), $pet->getBreed(), $pet->getDetails(), $pet->getReward());
    if ($query->execute()) {
      $query1 = $this->getCon()->prepare("INSERT INTO owner (id_user, id_pet) VALUES ((SELECT id_user FROM user WHERE mail LIKE ?), (SELECT id_pet FROM pet WHERE gallery LIKE ?))");
      $query1->bind_param("ss", $user->getEmail(), $pet->getGallery());
      $query1->execute();
      return true;
    } else return false;
  }

  // function getLastPets()
  // {
  //   $query = $this->getCon()->prepare("SELECT a.id_pet FROM (SELECT id_pet FROM pet ORDER BY id_pet DESC) a WHERE row_num<3");

  //   $query->execute();
  //   $query->bind_result($id_pet);
  //   $query->store_result();
  //   $i = 0;
  //   while ($query->fetch())
  //     echo $id_pet . " ". $i;
  //     $i = $i+1;
  // }

  function getAnimals($user)
  {
    $query = $this->getCon()->prepare("SELECT id_pet FROM owner WHERE id_user LIKE ?");
    $query->bind_param("s", $user);
    $query->execute();
    $query->bind_result($id_pet);
    $query->store_result();
    $pets = [];
    while ($query->fetch()) {
      array_push($pets, $this->getPetById($id_pet));
      // echo gettype($pets);
    }
    return $pets;
  }

  function updateLocation($obj)
  {
    $ok = 1;
    $query1 = $this->getCon()->prepare("SELECT id_user FROM location WHERE id_user LIKE ?");
    $query1->bind_param("s", $obj->id);
    $query1->execute();
    $query1->bind_result($id_user);
    while ($query1->fetch()) {
      if($id_user != null)
        $ok = 0;
    }

    if ($ok == 1) {
      $query = $this->getCon()->prepare("INSERT INTO location (id_user, lat, lng) VALUES ((SELECT id_user FROM user WHERE id_user LIKE ?), ?, ?)");
      $query->bind_param("sss", $obj->id, $obj->lat, $obj->lng);
      $query->execute();
    }
    if ($ok == 0){
      $query = $this->getCon()->prepare("UPDATE location SET lat=?, lng=? WHERE id_user LIKE ?");
      $query->bind_param("sss", $obj->lat, $obj->lng, $obj->id);
      $query->execute();
    }
  }

  function getPetById($id_pet)
  {
    $query = $this->getCon()->prepare("SELECT * FROM pet WHERE id_pet LIKE ?");
    $query->bind_param("s", $id_pet);
    $query->execute();
    $pets = [];
    $query->bind_result($id_pet, $gallery, $location, $name, $species, $breed, $details, $reward);
    if ($query->fetch()) {
      $temp = new Pet($gallery, $location, $name, $species, $breed, $details, $reward);
      array_push($pets, $temp);
    }
    return $pets;
  }

  function verify($user = null, $code = 0)
  {
    if ($user == null) {
      return false;
    }
    $query = $this->getCon()->prepare("SELECT * FROM verify WHERE id_user LIKE ?");
    $query->bind_param("i", $this->getId($user));
    $query->execute();
    $query->bind_result($id_user, $activate_code, $activated);
    $query->store_result();

    if ($query->fetch()) {
      if ($activated == 1) {
        return true;
      } else {
        if ($activate_code === $code) {
          $query1 = $this->getCon()->prepare("UPDATE verify SET activated = 1 WHERE id_user LIKE ?");
          $query1->bind_param("s", $id_user);
          $query1->execute();
        } else {
          return false;
        }
      }
    }
  }

  function generateRandomString($length = 10)
  {
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
  }
}
