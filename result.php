<?php
session_start();
include "config/db.php";

$correct = $_GET['c'];
$wrong = $_GET['w'];
$total = $correct + $wrong;
$accuracy = ($correct / $total) * 100;

$stmt = $conn->prepare(
    "INSERT INTO results 
    (player_name, total_questions, correct, wrong, accuracy)
    VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "siiid",
    $_SESSION['player'],
    $total,
    $correct,
    $wrong,
    $accuracy
);
$stmt->execute();
?>

<h2>Quiz Summary</h2>
<p>Name: <?php echo $_SESSION['player']; ?></p>
<p>Correct: <?php echo $correct; ?></p>
<p>Wrong: <?php echo $wrong; ?></p>
<p>Accuracy: <?php echo number_format($accuracy, 2); ?>%</p>
