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
    <?php include 'header.php' ?>

    <div class="container cyan skewDown">
        <div class="content skewUp">
            <form action="./logged/index.html">
                <div>
                    <label for="fname">First name: </label>
                    <input type="text" id="fname" name="firstname" required oninvalid="this.setCustomValidity('Please enter your first name')" oninput="setCustomValidity('')">

                    <label for="lname">Last name: </label>
                    <input type="text" id="lname" name="lastname" required oninvalid="this.setCustomValidity('Please enter your last name')" oninput="setCustomValidity('')">
                </div>
                <label for="mail">E-mail: </label>
                <input type="email" id="mail" name="mail" required oninvalid="this.setCustomValidity('Please enter an e-mail')" oninput="setCustomValidity('')">

                <label for="pass">Password: </label>
                <input type="password" id="pass" name="pass" required minlength="8" maxlength="20" oninvalid="this.setCustomValidity('Please enter a password')" oninput="setCustomValidity('')">

                <label for="phone">Phone number: </label>
                <input type="number" id="phone" name="phone" min="0000000000" max="9999999999" step="1111111111">

                <label for="birth">Date of birth: </label>
                <input type="date" id="birth" name="birth" max="2006-01-01" min="1940-01-01">
                <button type="submit" value="Register">Register</button>
                <div class="selection white-links">
                    <a href="login.html">Already have an account?</a></div>
            </form>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>