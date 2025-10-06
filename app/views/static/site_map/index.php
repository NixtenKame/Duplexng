<?php
include_once("C:/nginx/Duplex/includes/config.php");

session_start();

// Fetch user information
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // Fetch user info from the database
    try {
        $stmt = $pdo->prepare("SELECT * FROM public.users WHERE name = :name LIMIT 1");
        $stmt->bindParam(":name", $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            exit("User not found.");
        }
    } catch (PDOException $e) {
        exit("Database error: " . htmlspecialchars($e->getMessage()));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site Map</title>
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
        <h1>Site Map</h1>
        <p>Explore the structure of our website.</p>
    </div>

    <div class="site-map">
        <h2>Pages</h2>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/posts">Posts</a></li>
            <li><a href="/users">Users</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </div>

    <?php include_once("C:/nginx/Duplex/includes/footer.php"); ?>
</body>
</html>