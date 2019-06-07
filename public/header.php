<!-- <header>
    <div class="logo">
        <a href=".">
            <h2>LostPets</h2>
        </a>
    </div>
    <div class="links">
        <div class="selection hidden right" id="rmBtn">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <div class="selection">
            <a href="./login">
            <i class="fas fa-sign-in-alt"></i>
                Login
            </a>
        </div>
        <div class="selection">
            <a href="./profile">
                <div class="profile-img"></div>
                Emilian Radu
            </a>
        </div> -->
<!-- </div>
    <div class="selection hidden" id="mobile">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>

    <script src = "./public/js/mobile.js">   
    </script>

</header> -->

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
                        <a href='./profile'>
                            <div class='profile-img'></div> " . $user->getLname() . " " . $user->getFname() . "
                        </a>   
                    </div>
                    <div class='selection'>
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
echo $init;
?>

<script src="./public/js/mobile.js"></script>
<!-- <script src="./public/js/profile.js"></script> -->