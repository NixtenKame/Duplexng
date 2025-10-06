<?php

use Soap\Url;

session_start();
include_once("C:/nginx/duplex/includes/config.php"); // contains $pdo

$searchTerm = '';
$results = [];

if (isset($_GET['q'])) {
    $searchTerm = trim($_GET['q']);

    if ($searchTerm !== '') {
        // Prepare statement using PDO
        $stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE name ILIKE :term LIMIT 50");
        $stmt->execute(['term' => "%$searchTerm%"]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search Users</title>
<link rel="stylesheet" href="/packs/css/application.css">
</head>
<body>

<h2>Search Users</h2>
<form method="get">
    <input type="text" name="q" placeholder="Enter username..." value="<?= htmlspecialchars($searchTerm) ?>">
    <button type="submit">Search</button>
</form>

<?php if ($searchTerm !== ''): ?>
    <h3>Results for "<?= htmlspecialchars($searchTerm) ?>"</h3>
    <?php if ($results): ?>
        <ul>
            <?php foreach ($results as $user): ?>
                <li class="user">
                    <a href="view_profile.php?id=<?= $user['id'] ?>">
                        <?= htmlspecialchars($user['name']) ?>
                    </a> - <?= htmlspecialchars($user['email']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>
