<?php
session_start();
include("config.php");

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

$quizzes = $conn->query("SELECT * FROM quizzes");
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Topics</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wrapper">

    <div class="card">

        <h1>QUIZI</h1>

        <button class="btn register" onclick="toggleQuizzes()">
            Rādīt / Paslēpt quizus
        </button>

        <div id="quizList" class="quiz-list">

            <?php while ($row = $quizzes->fetch_assoc()): ?>
                <a class="quiz-item" href="quiz.php?id=<?= $row["id"] ?>">
                    <?= htmlspecialchars($row["title"]) ?>
                </a>
            <?php endwhile; ?>

        </div>

        <a class="back-btn" href="dashboard.php">Atpakaļ</a>

    </div>

</div>

<script>
function toggleQuizzes() {
    document.getElementById("quizList").classList.toggle("show");
}
</script>

</body>
</html>