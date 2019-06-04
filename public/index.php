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
    <?php include 'header.php'; ?>

    <!-- Motto -->
    <div class="container">
        <div class="content">
            <div class="motto">
                <img src="./public/img/illu.png" alt="ilustratie" draggable="false">
                <div class="left-motto">
                    <h2>LOST?</h2>
                    <h2>OTHERS MIGHT</h2>
                    <h2>FIND IT!</h2>
                    <a href="./register">
                        <button>Sign up</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Lost pets panel -->
    <div class="container cyan skewUp ">
        <div class="content skewDown">
            <h2 class="first">EVERY DAY 10 DOGGOS</h2>
            <h2 class="second">ARE FOUND</h2>
            <!-- Last 3 lost pets -->
            <div class="cards">
                <a href="./animals/dog.html"></a>
                <div class="card">
                    <div class="primary">
                        <img class="img-primary" src="./public/img/dog.png" alt="animal">
                        <div class="top-btns">
                            <i class="fa fa-map-marker"></i>
                            <p>Popricani, Iasi</p>
                        </div>
                        <div class="bottom-btns">
                            <i class="fa fa-calendar"></i>
                            <p>17/03/2019</p>
                        </div>
                        <div class="user-things">
                            <div class="photo-card">
                                <img src="./public/img/user-img1.jpg" alt="user img">
                            </div>
                            <p>Emilian</p>
                        </div>
                    </div>
                </div>
                </a>
                <a href="./animals/dog.html">
                    <div class="card">
                        <div class="primary">

                            <img class="img-primary" src="./public/img/cryingcat.jpg" alt="animal">
                            <div class="top-btns">
                                <i class="fa fa-map-marker"></i>
                                <p>Ciurea, Iasi</p>
                            </div>
                            <div class="bottom-btns">
                                <i class="fa fa-calendar"></i>
                                <p>17/03/2019</p>
                            </div>
                            <div class="user-things">
                                <div class="photo-card">
                                    <img src="./public/img/user-img2.jpg" alt="user img">
                                </div>
                                <p>Andrei</p>
                            </div>
                        </div>

                    </div>
                </a>
                <a href="./animals/dog.html">
                    <div class="card">
                        <div class="primary">
                            <img class="img-primary" src="./public/img/cat.png" alt="animal">
                            <div class="top-btns">
                                <i class="fa fa-map-marker"></i>
                                <p>Alexandru, Iasi</p>
                            </div>
                            <div class="bottom-btns">
                                <i class="fa fa-calendar"></i>
                                <p>17/03/2019</p>
                            </div>
                            <div class="user-things">
                                <div class="photo-card">
                                    <img src="./public/img/user-img3.jpg" alt="user img">
                                </div>
                                <p>Cristi</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <h2>THERE IS A CHANCE YOU SEE ONE ON YOUR WAY TO WORK</h2>
        </div>
    </div>

    <!-- Map -->
    <div class="container orange skewDown">
        <div class="content skewUp">
            <h2 class="for-map">ALL THE DOGGOS THAT WERE LOST NEAR YOU</h2>
            <iframe id="map" src="https://www.openstreetmap.org/export/embed.html?bbox=27.319908142089847%2C47.0579608565377%2C27.814292907714847%2C47.23472275076704&amp;layer=mapnik "></iframe>
        </div>
    </div>


    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>

</html>