<?php
include_once("C:/nginx/Duplex/includes/config.php");

session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/packs/css/application.css">
        <title>Help</title>
    </head>
    <body>
        <nav>
            <div class="nav-logo">
                <a class="nav-logo-link" href="/"></a>
            </div>
            <div class="nav-sections">
                <div class="nav-links">
                    <?php include_once("C:/nginx/Duplex/includes/nav.php"); ?>
                </div>
                <div class="secondary-links">
                    <?php include_once("_secondary_links.php"); ?>
                </div>
            </div>
        </nav>
        <div class="container">
            <h1>Help</h1>
            <p>Comming Soon!</p>
        </div>
        <?php include_once("C:/nginx/Duplex/includes/footer.php"); ?>
    </body>
</html>