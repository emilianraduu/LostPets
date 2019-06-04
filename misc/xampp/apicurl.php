<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input{
            display:block;
        }
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <p>GET</p>
    <form action="api_controller.php" method="POST">
        <input type="submit" name="submit" value="GO" />
    </form>

    <?php
    if (isset($bodyGet)) {
        // echo json_encode($responseBody);
        $counter = 1;
        echo "<table>";
        foreach ($bodyGet as $item) {
            $html = '<tr><td class="text-left">' . $item->title . '</td>
                <td class="text-left">' . $item->duration . '</td><td>
                <form action="api_controller.php" method="POST"> 
                    <input style="display:none" name="season" type="number" value="'.$item->season.'">
                    <input style="display:none" name="episode" type="number" value="'.$item->episode.'">
                    <input type="submit" value="x" name="x"> 
                </form></td></tr>';
            echo $html;
        }
        echo "</table>";
    }
    ?>
    </br></br>
    <p>PUT</p>
    <form action="api_controller.php" method="POST">
        <label for="seas">Season</label>
        <input required type="text" name="season" id="seas"/>
        <label for="ep">Episode</label>
        <input required type="text" name="episode" id="ep" />
        <label for="tt">Title</label>
        <input required type="text" name="title" id="tt"/>
        <label for="duration">Duration</label>
        <input required type="text" name="duration" />
        <input type="submit" name="send_ep" value="Send" />
    </form>
    <p>POST</p>
    <form action="api_controller.php" method="POST">
        <label for="seas">Season</label>
        <input required type="text" name="season" id="seas"/>
        <label for="ep">Episode</label>
        <input required type="text" name="episode" id="ep" />
        <label for="tt">Title</label>
        <input required type="text" name="title" id="tt"/>
        <label for="duration">Duration</label>
        <input required type="text" name="duration" />
        <input type="submit" name="send_ep" value="Send" />
    </form>

</body>

</html>