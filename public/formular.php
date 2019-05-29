<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>LostPets</title>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <a href="./index.html">
                <h2>LostPets</h2>
            </a>
        </div>
        <div class="links">
            <div class="selection hidden right" id="rmBtn">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <div class="selection">
                <a href="./login.html">
                    <i class="fa fa-home" aria-hidden="true"></i> Home
                </a>
            </div>
            <div class="selection">
                <a href="./login.html">
                    <i class="fa fa-search" aria-hidden="true"></i> Account

                </a>
            </div>
            <div class="selection">
                <a href="./login.html">
                    <div class="profile-img"></div>
                    Emilian Radu

                </a>

            </div>


        </div>
        <div class="selection hidden" id="mobile">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        <script>
            let menuBtn = document.getElementById('mobile');
            let rmBtn = document.getElementById('rmBtn');
            let menu = document.querySelector('.links');

            menuBtn.addEventListener('click', () => {
                menu.classList.add('show');
            });
            rmBtn.addEventListener('click', () => {
                menu.classList.remove('show');
            });
        </script>

    </header>
    

    <div class="container orange skewUp">
        <div class="content skewDown">
            <form action="./find.html" class="formular_credentials">
                <label for="image">Upload image: </label>
                <input type="file" id="image" accept="image/*">

                <label for="location">Pet last seen at:</label>
                <button class="invbut" id="location">location</button>



                <label for="nume">Pet name: </label>
                <input type="text" id="nume" maxlength="20">

                <p>Species:</p>
                <div class="multiple-choice">
                    <label for="dog">Dog</label>
                    <input type="radio" name="species" id="dog" value="dog">
                    <label for="cat">Cat</label>
                    <input type="radio" name="species" id="cat" value="cat">
                    <label for="bird">Bird</label>
                    <input type="radio" name="species" id="bird" value="bird">
                    <label for="reptile">Reptile</label>
                    <input type="radio" name="species" id="reptile" value="reptile">
                </div>
                <label for="breed">Breed: </label>
                <input type="text" id="breed" maxlength="20">

                <label for="details">Details: </label>
                <textarea id="details" maxlength="150"></textarea>

                <p>Reward: </p>
                <div class="multiple-choice">
                    <label for="reward_yes">Yes</label>
                    <input type="radio" name="reward" id="reward_yes" value="reward_yes">
                    <label for="reward_no">No</label>
                    <input type="radio" name="reward" id="reward_no" value="reward_no">
                </div>
                <label for="email">Email: </label>
                <input type="email" id="email">

                <label for="phone">Phone: </label>
                <input type="tel" id="phone">

                <button class="invbut">I lost my pet!</button>

            </form>
        </div>
    </div>

    <footer class="container black">
        <ul class="content">
            <li>
                <p>Ne puteti gasi la adresa de mail:</p>
                <div class="selection ">
                    <a href="mailto:contact@lostpets.com "> <i class="fas fa-envelope "></i>contact@lostpets.com</a>

                </div>
                <p>sau la numarul de telefon:</p>
                <div class="selection">
                    <a href="tel:0712345678 "><i class="fas fa-phone "></i>0712 345 678</a>
                </div>
            </li>
            <li>
                <div class="selection">
                    <a href="facebook.com "><i class="fab fa-facebook-f "></i>Facebook</a>
                </div>
                <div class="selection">
                    <a href="instagram.com "><i class="fab fa-instagram "></i>Instagram</a>
                </div>
                <div class="selection">
                    <a href="youtube.com "><i class="fab fa-youtube "></i>Youtube</a>
                </div>
                <div class="selection">
                    <a href="reddit.com "><i class="fab fa-reddit "></i>Reddit</a>
                </div>
                <div class="selection">
                    <a href="twitter.com "><i class="fab fa-twitter "></i>Twitter</a>
                </div>



            </li>
            <li>
                <div class="selection">
                    <a href="faqs.html "> <i class="fas fa-info "></i>FAQS</a>
                </div>
                <div class="selection">
                    <a href=" "> <i class="fas fa-book "></i> Terms and conditions</a>
                </div>
            </li>
        </ul>
    </footer>
</body>

</html>