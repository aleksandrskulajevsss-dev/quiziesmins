<?php
session_start();
include("config.php");

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET["id"])) {
    die("Quiz nav atrasts");
}

$quiz_id = intval($_GET["id"]);

// paņem visus jautājumus
$result = $conn->query("SELECT * FROM questions WHERE quiz_id=$quiz_id");
$questions = [];

while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}

// inicializācija
if (!isset($_SESSION["quiz"])) {
    $_SESSION["quiz"] = [
        "index" => 0,
        "score" => 0
    ];
}

$index = $_SESSION["quiz"]["index"];
$score = $_SESSION["quiz"]["score"];
$total = count($questions);

// apstrādā atbildi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_answer = $_POST["answer"];
    $correct = $questions[$index]["answer"];

    if ($user_answer === $correct) {
        $_SESSION["quiz"]["score"]++;
    }

    $_SESSION["quiz"]["index"]++;
    header("Location: quiz.php?id=" . $quiz_id);
    exit();
}

// ja viss pabeigts
if ($index >= $total) {
    $final_score = $_SESSION["quiz"]["score"];
    session_unset(); // notīra quiz datus
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <div class="card">
        <h1>Rezultāts</h1>
        <h2><?php echo $final_score . " / " . $total; ?></h2>

        <a href="topic.php" class="btn register">Atpakaļ uz tematiem</a>
    </div>
</div>

</body>
</html>
<?php
exit();
}

$q = $questions[$index];
$progress = round((($index) / $total) * 100);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        .progress-bar {
            width: 100%;
            background: #334155;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .progress {
            height: 10px;
            background: #22c55e;
            width: <?= $progress ?>%;
            transition: 0.3s;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="card">

        <h3>Jautājums <?php echo ($index + 1) . " / " . $total; ?></h3>

        <div class="progress-bar">
            <div class="progress"></div>
        </div>

        <h2><?php echo htmlspecialchars($q["question"]); ?></h2>

        <form method="POST">
            <button class="answer-btn" name="answer" value="a">A: <?php echo $q["a"]; ?></button>
            <button class="answer-btn" name="answer" value="b">B: <?php echo $q["b"]; ?></button>
            <button class="answer-btn" name="answer" value="c">C: <?php echo $q["c"]; ?></button>
            <button class="answer-btn" name="answer" value="d">D: <?php echo $q["d"]; ?></button>
        </form>

    </div>
</div>

</body>
</html>