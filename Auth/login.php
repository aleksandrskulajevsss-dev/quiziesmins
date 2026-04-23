<?php
session_start();
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user["username"];
            $_SESSION["role"] = $user["role"];

            if ($user["role"] == "admin") {
                header("Location: ../admin.php");
            } else {
                header("Location: ../dashboard.php");
            }
            exit();
        } else {
            echo "Nepareiza parole!";
        }
    } else {
        echo "Lietotājs neeksistē!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="wrapper">
    <div class="card">
        <h1>Login</h1>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button class="btn login">Login</button>
        </form>
    </div>
</div>

</body>
</html>