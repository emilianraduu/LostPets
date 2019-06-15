<?php
require '../control/db.php';
require '../control/user.php';
session_start();
$init = "<header>
            <div class='logo'>
                <a href='.'>
                    <h2>LostPets</h2>
                </a>
             </div> 
             <div class='links'>
                <div class='selection hidden right' id='rmBtn'>
                    <i class = 'fa fa-times' aria-hidden='true'></i>
                </div>";
if (isset($_SESSION['SID'])) {

    $db = new Database;
    $user = $db->getUser($_SESSION['UID']);
    $init = $init . "
    <style> .profile-img { background: url(./public/img/avatars/" . $user->getAvatar() . "); </style>
    <div class='selection'>
                        <a href='./profile#".$_SESSION['UID']."'>
                            <div class='profile-img'></div> " . $user->getLname() . " " . $user->getFname() . "
                        </a>   
                    </div>";
    $init = $init . "<div class = 'selection'>
                    <a href='./formular'>
                    <i class = 'fas fa-plus'></i> I LOST MY PET!</a>
            </div>";
    $init = $init .
        "<div class='selection'>
                            <a href='./control/logout.php'>
                            <i class = 'fas fa-sign-out-alt'></i>
                                Sign Out
                            </a>   
                    </div>";
} else {
    $init = $init . "<div class='selection'>
                <a href='login'>
                    <i class='fas fa-sign-in-alt'></i>
                        Login
                    </a>
                </div>";
}

$init = $init . "</div><div class='selection hidden' id='mobile'>
                        <i class='fa fa-bars' aria-hidden='true'></i>
                </div>
                 
                </header>";
if ($user != null) {
    if (!$db->verify($user)) {
        $init = $init . "<div class='banner'><p>Please <a href='verify'>verify</a> your email!</p></div>";
    }
}

echo $init;
?>

<script src="./public/js/mobile.js"></script>