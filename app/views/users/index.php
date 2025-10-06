<?php
session_start();
include_once("C:/nginx/duplex/includes/config.php");

try {
    // Fetch all users
    $stmt = $pdo->query("SELECT id, name, email, created_at FROM users ORDER BY id ASC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>All Users</title>
<link rel="stylesheet" href="/packs/css/application.css">
<style>
    .users-search {
        display: block;
        width: 50%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px;
        align-items: center;
        margin-top: 50px;
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
      <?php include_once("C:/nginx/duplex/app/views/users/_secondary_links.php"); ?>
    </div>
  </div>
</nav>

<div class="search-container">
  <input type="text" class="users-search" placeholder="Search users..." id="userSearch" onkeyup="filterUsers()">
</div>

<table id="userTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Joined</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><a href="/users/<?php echo $user['id']; ?>/"><?php echo htmlspecialchars($user['name']); ?></a></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo $user['created_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="footer-index">
  &copy; <?php echo date('Y'); ?> Your Website Name
</div>

<script>
function filterUsers() {
  const input = document.getElementById("userSearch");
  const filter = input.value.toLowerCase();
  const table = document.getElementById("userTable");
  const tr = table.getElementsByTagName("tr");

  for (let i = 1; i < tr.length; i++) {
    const td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      const txtValue = td.textContent || td.innerText;
      tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
    }
  }
}
</script>

</body>
</html>
