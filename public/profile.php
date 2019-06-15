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
    <input id="currUser" value="" hidden />
    <?php include 'header.php';
    require '../control/pet.php';
    if (!isset($_SESSION['SID']))
        header('location: home');
    ?>
    <div class='profile-page' id="profile-page">
    </div>
    <script src='./public/js/profile.js'></script>
    <?php include 'footer.php' ?>
</body>

</html>