<?php
session_start();

if (!isset($_SESSION["user"]) || $_SESSION["role"] != "admin") {
    header("Location: index.php");
    exit();
}

echo "Admin panelis";
echo "<br>Sveiks, " . $_SESSION["user"];
echo "<br><a href='logout.php'>Logout</a>";
?>