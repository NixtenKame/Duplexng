<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uploads Test Page</title>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background-color: #f3f6ff;
            color: #333;
            text-align: center;
            padding: 60px;
        }
        h1 {
            color: #4a6cf7;
        }
        .fluff {
            font-size: 1.1em;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>🦊 Uploads Directory is Working!</h1>
    <p class="fluff">Served via PHP on <b>/uploads/new</b></p>
    <p>Server path: <code><?php echo __FILE__; ?></code></p>
</body>
</html>