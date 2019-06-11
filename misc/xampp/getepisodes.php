<?php

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
    {
        func();
    }
    function func()
    {
        return "salut";
    }
?>