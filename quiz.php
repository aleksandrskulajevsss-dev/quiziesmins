<?php
session_start();
include("config.php");

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION["user"];

if (!isset($_GET["id"])) {
    die("Quiz nav atrasts");
}

$quiz_id = intval($_GET["id"]);

if (!isset($_SESSION["quiz"]) || $_SESSION["quiz"]["quiz_id"] != $quiz_id) {

    $result = $conn->query("SELECT * FROM questions WHERE quiz_id=$quiz_id");
    $questions = [];

    while ($row = $result->fetch_assoc()) {

        $answers = [
            "a" => $row["a"],
            "b" => $row["b"],
            "c" => $row["c"],
            "d" => $row["d"]
        ];

        $correct_key = $row["answer"];
        $correct_value = $answers[$correct_key];

        $shuffled = $answers;
        shuffle($shuffled);

        $new_correct = array_search($correct_value, $shuffled);

        $questions[] = [
            "question" => $row["question"],
            "answers" => array_values($shuffled),
            "correct" => $new_correct
        ];
    }

    shuffle($questions);

    $_SESSION["quiz"] = [
        "quiz_id" => $quiz_id,
        "questions" => $questions,
        "index" => 0,
        "score" => 0
    ];
}

$quiz = $_SESSION["quiz"];
$index = $quiz["index"];
$total = count($quiz["questions"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_answer = intval($_POST["answer"]);

    if ($user_answer === $quiz["questions"][$index]["correct"]) {
        $_SESSION["quiz"]["score"]++;
    }

    $_SESSION["quiz"]["index"]++;
    header("Location: quiz.php?id=" . $quiz_id);
    exit();
}

if ($index >= $total) {
    $score = $_SESSION["quiz"]["score"];

    // 🔥 SAGLABĀ REZULTĀTU
    $stmt = $conn->prepare("INSERT INTO results (username, quiz_id, score) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $username, $quiz_id, $score);
    $stmt->execute();

    // 🏆 DABŪ LABĀKO REZULTĀTU
    $stmt = $conn->prepare("SELECT MAX(score) as best_score FROM results WHERE username = ? AND quiz_id = ?");
    $stmt->bind_param("si", $username, $quiz_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $best_score = $row["best_score"];

    session_unset();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="wrapper">
<div class="card">
<h1>Rezultāts</h1>

<h2><?php echo "$score / $total"; ?></h2>
<h3>Labākais rezultāts: <?php echo "$best_score / $total"; ?></h3>

<?php if ($score >= $best_score): ?>
    <p style="color:lightgreen;">🎉 Jauns rekords!</p>
<?php else: ?>
    <p>Mēģini vēlreiz, lai uzlabotu rezultātu!</p>
<?php endif; ?>

<a href="topic.php" class="btn register">Atpakaļ</a>

</div>
</div>

</body>
</html>
<?php
exit();
}

$q = $quiz["questions"][$index];
$progress = round(($index / $total) * 100);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
}
</style>
</head>
<body>

<div class="wrapper">
<div class="card">

<h3>Jautājums <?php echo ($index+1) . " / " . $total; ?></h3>

<div class="progress-bar">
    <div class="progress"></div>
</div>

<h2><?php echo htmlspecialchars($q["question"]); ?></h2>

<form method="POST">
    <?php foreach ($q["answers"] as $i => $ans): ?>
        <button class="answer-btn" name="answer" value="<?= $i ?>">
            <?= chr(65+$i) ?>: <?= $ans ?>
        </button>
    <?php endforeach; ?>
</form>

</div>
</div>

</body>
</html>