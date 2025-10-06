<?php
include_once("C:/nginx/Duplex/includes/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Duplex</title>
    <link rel="stylesheet" href="packs/css/application.css">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
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

    <div class="top-paragraph">
      <h1>Welcome to Duplex</h1>
      <p>The site is under development</p>
    </div>

    <div class="user-info">
      <h2>Welcome to Duplex</h2>
      <p>Art in every twist</p>
    </div>

    <?php include_once("C:/nginx/Duplex/includes/footer.php"); ?>
  </body>
</html>