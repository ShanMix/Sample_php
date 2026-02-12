<?php
session_start();
$_SESSION['player'] = $_POST['player'];
$_SESSION['correct'] = 0;
$_SESSION['wrong'] = 0;
$_SESSION['current'] = 1;
$_SESSION['total'] = 20;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/style.css">
<script src="assets/script.js" defer></script>
</head>

<body>

<h3>Player: <?php echo $_SESSION['player']; ?></h3>

<!-- DASHBOARD -->
<div id="dashboard">
    <p>Score: <span id="score">0</span></p>
    <p>Wrong: <span id="wrong">0</span></p>
    <p>Accuracy: <span id="accuracy">0%</span></p>
    <p>Time Left: <span id="time">20</span>s</p>
    <p>Progress: <span id="progress">1 / 10</span></p>
</div>

<hr>

<!-- QUESTION -->
<h2 id="question"></h2>

<input type="number" id="answer">
<button onclick="submitAnswer()">Submit</button>

<p id="feedback"></p>

</body>
</html>
