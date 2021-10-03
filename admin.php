<?php
// session_start();
require_once "./core/init.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- =====BOX ICONS===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Portfolio website complete</title>
    <style>
        body {
            background: #0e2431 !important;
            color: white !important;
        }
    </style>
</head>

<body>



    <?php

    if (isset($_GET['success']) && $_GET['success'] == "false") {
        echo "parola gresita";
    }


    if (!Session::exists("admin")) {
        echo '
                <form method="POST" action="apiadmin.php">
                    <input type="password" name="password" placeholder="Scrie parola">
                    <input type="submit" name="submit" value="Submit" >
                </form>
    ';
    }else{
        Redirect::to("admini.php");
    }
    
    ?>

</body>

</html>