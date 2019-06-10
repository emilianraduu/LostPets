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
    if (!isset($_SESSION['SID']))
        header('location: home'); ?>

    <div class="container cyan">
        <div class="content">
            <form action="./control/formular-controller.php" enctype="multipart/form-data" method="post">
                <div class="info">
                    <label for="hide_img"><img id="avatar" <img id="avatar" class="avatar_choose" src=""></label>
                    <input type="file" name="pic" id="hide_img" required/>
                    <div class="under">
                        <label for="name">Name: </label>
                        <input type="text" id="name" name="name" maxlength="20" required>
                    </div>
                    <script src="../public/js/img.js"></script>
                </div>


                <p>Species:</p>
                <select name="species" id="species" onchange="change">
                    <option selected disabled hidden>Select</option>
                    <option id="dog">Dog</option>
                    <option id="cat">Cat</option>
                </select>

                <p>Breed:</p>
                <select id="breeds" name="breeds">
                    <script src="./public/js/breeds.js"></script>
                </select>
                <p>Reward: </p>
                <select name="reward" id="reward">
                    <option>No</option>
                    <option>Yes</option>
                </select>

                <label for="details">Details: </label>
                <textarea id="details" name="details" maxlength="300"></textarea>

                <button type="submit">I lost my pet!</button>

            </form>
        </div>
        <div class="content">
            <iframe id="lost-map" src="https://www.openstreetmap.org/export/embed.html?bbox=27.319908142089847%2C47.0579608565377%2C27.814292907714847%2C47.23472275076704&amp;layer=mapnik "></iframe>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>