<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>LostPets</title>
    <style>
        .lost {
            box-sizing: border-box;
        }

        .flexbox {
            display: -webkit-flex;
            display: flex;
        }

        .article {
            -webkit-flex: 3;
            -ms-flex: 3;
        }
    
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container cyan skewDown">
        <div class="content skewUp">
        <section class="flexbox">
        <div>
            <div class="cards">
            <a href="./animals/dog.html">
                    <div class="card">
                        <div class="primary">

                            <img class="img-primary" src="./public/img/cryingcat.jpg" alt="animal">
                            <div class="top-btns">
                                <i class="fa fa-map-marker"></i>
                                <p>Ciurea, Iasi</p>
                            </div>
                            <div class="bottom-btns">
                                <button id="lost_star"><i class="fas fa-star"></i></button>
                            </div>
                            <div class="user-things">
                                <button id="lost_expand"><i class="fas fa-expand"></i></button>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        </div>
        <article class="article">
                <p>Rex</p><br>
                <p>Labrador</p>
                <p>Detalii:</p>
                <p>somethinge jkngesgj engsekgse kgsemg ksengks egne s gensg sefejfnefnnfe fjefjefiej</p>
                <p>Contact:</p>
                <p><i class="fas fa-phone"></i>0753-364-672</p>
                <p><i class="fas fa-envelope"></i>andrei7piuco@gmail.com</p>
                <p><img src="public/img/user-img2.jpg" alt="avatar" width="42" height="42">Andrei Piuco</p>
            
        </article>
        <iframe id="map" src="https://www.openstreetmap.org/export/embed.html?bbox=27.319908142089847%2C47.0579608565377%2C27.814292907714847%2C47.23472275076704&amp;layer=mapnik "></iframe>
        </section>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    
</body>
</html>