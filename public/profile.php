<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>LostPets</title>
</head>

<body>
    <!-- Header -->
    <?php include 'header.php';
    require '../control/pet.php';
    if (!isset($_SESSION['SID']))
        header('location: home');
    else {
        $pets = $db->getAnimals($_SESSION['UID']);
    } ?>

    <div class="profile-page">
        <div class="left">
            <form action="./control/profile-controller.php" enctype="multipart/form-data" method="post" class="form">
                <label for="hide_img"><img src="./public/img/avatars/<?php echo $user->getAvatar(); ?>" id="avatar"></label>
                <input type="file" name="pic" id="hide_img"  onchange="changeProfile();" />
            </form>
            <h2><?php echo $user->getLname() . " " . $user->getFname(); ?></h2>
            <div class="selection">
                <a href="tel:<?php echo $user->getPhone(); ?> "><i class="fas fa-phone "></i>call me</a>
            </div>
            <div class="selection ">
                <a href="mailto:<?php echo $user->getEmail(); ?> "> <i class="fas fa-envelope "></i>email me</a>
            </div>
            <script src="./public/js/profile-img.js"></script>
        </div>
        <div class="right">
            <h2>Lost</h2>
            <div class="lost-row">
                <?php
                if (count($pets) == 0) {
                    echo "<p> You haven't lost any pets! </p>";
                } else {
                    $i = 1;
                    foreach ($pets as $pet) {
                        $temp = $pets[$i];
                        foreach ($pet as $key) {
                            $print = $print . " <a href='./pet#" . $temp . "'> <div class='lost-pet'><img src='./public/img/pets/" . $key->getGallery() . "'></div></a>";
                            $i = $i + 2;
                        }
                    }
                    echo $print;
                }

                ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>