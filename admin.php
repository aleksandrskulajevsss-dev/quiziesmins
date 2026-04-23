<?php
session_start();
include("config.php");

// 🔥 RĀDA ERRORUS (debug)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 🔒 ADMIN PĀRBAUDE
if (!isset($_SESSION["user"]) || $_SESSION["role"] != "admin") {
    header("Location: index.php");
    exit();
}

// ✅ SAGLABĀŠANA
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = $_POST["title"];

    // 1. Izveido quiz
    if (!$conn->query("INSERT INTO quizzes (title) VALUES ('$title')")) {
        die("Quiz insert error: " . $conn->error);
    }

    $quiz_id = $conn->insert_id;

    if ($quiz_id == 0) {
        die("Quiz ID netika izveidots");
    }

    // 2. Pievieno 15 jautājumus
    for ($i = 1; $i <= 15; $i++) {

        $q = $_POST["q$i"];
        $a = $_POST["a$i"];
        $b = $_POST["b$i"];
        $c = $_POST["c$i"];
        $d = $_POST["d$i"];
        $correct = $_POST["correct$i"];

        $sql = "INSERT INTO questions (quiz_id, question, a, b, c, d, answer)
                VALUES ('$quiz_id', '$q', '$a', '$b', '$c', '$d', '$correct')";

        if (!$conn->query($sql)) {
            die("Question insert error: " . $conn->error);
        }
    }

    echo "<h2>✅ Quiz veiksmīgi saglabāts!</h2>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panelis</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="wrapper">
<div class="card">

<h1>Admin panelis</h1>
<p>Sveiks, <?php echo $_SESSION["user"]; ?></p>

<form method="POST">

    <h3>Quiz tēma</h3>
    <input type="text" name="title" required><br><br>

    <?php for ($i = 1; $i <= 15; $i++): ?>
        <h3>Jautājums <?= $i ?></h3>

        <input type="text" name="q<?= $i ?>" placeholder="Jautājums" required><br>

        <input type="text" name="a<?= $i ?>" placeholder="A" required>
        <input type="text" name="b<?= $i ?>" placeholder="B" required>
        <input type="text" name="c<?= $i ?>" placeholder="C" required>
        <input type="text" name="d<?= $i ?>" placeholder="D" required><br>

        Pareizā atbilde:
        <select name="correct<?= $i ?>">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
        </select>

        <hr>
    <?php endfor; ?>

    <button type="submit">Saglabāt Quiz</button>
</form>

<br>
<a href="logout.php">Logout</a>

</div>
</div>

</body>
</html>