<?php
session_start();
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql)) {

        $_SESSION["user"] = $username;
        $_SESSION["role"] = "user";

        header("Location: ../dashboard.php");
        exit();

    } else {
        echo "Kļūda: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="wrapper">
    <div class="card">
        <h1>Register</h1>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button class="btn register">Register</button>
        </form>
    </div>
</div>

</body>
</html>