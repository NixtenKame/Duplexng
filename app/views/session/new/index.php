<?php
session_start();
include_once("C:/nginx/Duplex/includes/config.php");

// Initialize variables
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["username"]); // user can enter name or email
    $password = $_POST["password"];

    if (empty($login) || empty($password)) {
        $error = "Please enter both username/email and password.";
    } else {
        try {
            // Query by name OR email
            $sql = "SELECT id, name, email, password_hash 
                    FROM public.users 
                    WHERE name = :login OR email = :login 
                    LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":login", $login, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verify password
                if (password_verify($password, $user["password_hash"])) {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["username"] = $user["name"]; // store name in session
                    header("Location: /"); // redirect after login
                    exit;
                } else {
                    $error = "Invalid password.";
                }
            } else {
                $error = "No account found with that username/email.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
<div class="container">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Username or Email</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
    <p>Don’t have an account? <a href="register.php">Register here</a></p>
</div>
<?php include_once("C:/nginx/Duplex/includes/footer.php"); ?>
</body>
</html>