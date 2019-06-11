<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    <title>LostPets</title>
</head>

<body>
    <!-- Header -->
    <?php include 'header.php';
    if (!isset($_SESSION['SID']))
        header('location: .'); ?>
    <!-- Motto -->

    <!-- Lost pets panel -->
    <div class="container ">
        <div class="content">
            <div class="cards">
                <a href="./animals/dog.html">
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
        </div>
    </div>

    <!-- Map -->
    <div class="container orange skewDown">
        <div class="content skewUp">
            <h2 class="for-map">ALL THE DOGGOS THAT WERE LOST NEAR YOU</h2>
            <div id="mapid"></div>
            <input id="sid" value="<?php echo $_SESSION['UID']?>" hidden>
            <script src="./public/js/map.js"></script>
        </div>
    </div>


    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>

</html>