<?php
include_once("C:/nginx/Duplex/includes/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coming Soon</title>
    <link rel="stylesheet" href="/packs/css/application.css">
    <style>
        h1 {
            color: #800020;
        }
        p {
            color: #800020;
        }
    </style>
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
    <header>
        <h1>Coming Soon</h1>
    </header>
    <main>
        <p>We're working hard to get this page ready for you. Stay tuned!</p>
    </main>
    <?php include_once("C:/nginx/Duplex/includes/footer.php"); ?>
</body>
</html>