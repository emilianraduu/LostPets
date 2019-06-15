<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>notifs</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .selection{
            position: relative;
            display: inline-block;
        }
        .button{
            padding: 10px 40px;
        }
        #drop-content {
            position:absolute;
            z-index: 1;
            max-height:200px;
            overflow:hidden;
            overflow-y:auto;
        }
        #drop-content a{
            display:block;
            background: #dfdfdf;
            color:black;
            text-decoration:none;
            padding: 10px 36px;
            margin-top: 2px;
        }
    </style>
</head>
<body>
    <div class="selection"><button class="button" onclick="show_hide()"><i class="fa fa-bell" aria-hidden="true"></i>notifications</button></div>
    <div id="drop-content" style="display:none;">
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item">Un animal a fost pierdut in jurul tau!</a>
        <a href="#" class="dropdown-item2">Un animal a fost gasit de catre Radu!</a>
        <a href="#" class="dropdown-item2">Un animal a fost gasit de catre Radu!</a>
        <a href="#" class="dropdown-item2">Un animal a fost gasit de catre Radu!</a>
        <a href="#" class="dropdown-item2">Un animal a fost gasit de catre Radu!</a>
        <a href="#" class="dropdown-item2">Un animal a fost gasit de catre Radu!</a>
        <a href="#" class="dropdown-item2">Un animal a fost gasit de catre Radu!</a>
        <a href="#" class="dropdown-item2">Un animal a fost gasit de catre Radu!</a>
    </div>

    <script>
        function show_hide(){
            var click = document.getElementById("drop-content");
            if (click.style.display === "none") {
                click.style.display = "block";
            } else {
                click.style.display = "none";
            }
        }
    </script>
</body>
</html>