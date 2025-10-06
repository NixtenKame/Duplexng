<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Duplex - Posts</title>
  <link rel="stylesheet" href="/packs/css/application.css">
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
      <h1>Posts</h1>
      <p>Explore the latest posts from our community.</p>
    </div>

    <div class="posts-list">
      <h2>Recent Posts</h2>
      <p>No posts available at the moment. Check back later!</p>
    </div>

    <?php include_once("C:/nginx/Duplex/includes/footer.php"); ?>
</body>
</html>