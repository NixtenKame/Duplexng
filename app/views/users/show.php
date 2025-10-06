<?php
session_start();
include_once("C:/nginx/Duplex/includes/config.php");

// Make sure an ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid user ID.");
}

$user_id = intval($_GET['id']);

try {
    // Using PDO to fetch user info
    $stmt = $pdo->prepare("SELECT id, name, email, created_at FROM users WHERE id = :id");
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("User not found.");
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Info - <?php echo htmlspecialchars($user['name']); ?></title>
<style>
body { font-family: Arial, sans-serif; margin: 30px; }
h1 { color: #3366cc; }
table { border-collapse: collapse; width: 50%; }
td, th { border: 1px solid #ccc; padding: 8px; text-align: left; }
</style>
</head>
<body>
<h1>User Info: <?php echo htmlspecialchars($user['name']); ?></h1>
<table>
    <tr><th>ID</th><td><?php echo $user['id']; ?></td></tr>
    <tr><th>Username</th><td><?php echo htmlspecialchars($user['name']); ?></td></tr>
    <tr><th>Email</th><td><?php echo htmlspecialchars($user['email']); ?></td></tr>
    <tr><th>Joined</th><td><?php echo $user['created_at']; ?></td></tr>
</table>
</body>
</html>
