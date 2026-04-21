<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <div class="card">
        <h1>Sveiks, <?php echo $_SESSION["user"]; ?></h1>

        <div class="actions">
            <a href="logout.php" class="btn login">Logout</a>
            <a href="topic.php" class="btn register">Quiz</a>
        </div>
    </div>
</div>

</body>
</html>