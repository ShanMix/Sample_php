let time = 20;
let timer;
let correct = 0;
let wrong = 0;
let current = 1;
let total = 10;
let correctAnswer = 0;

function generateQuestion() {
    const ops = ['+', '-', '*', '/'];
    let a = Math.floor(Math.random() * 10) + 1;
    let b = Math.floor(Math.random() * 10) + 1;
    let op = ops[Math.floor(Math.random() * ops.length)];

    if (op === '/') {
        a = a * b; // ensures whole number
    }

    document.getElementById("question").innerText =
        `${a} ${op} ${b}`;

    correctAnswer = eval(`${a}${op}${b}`);
    resetTimer();
}

function resetTimer() {
    clearInterval(timer);
    time = 20;
    document.getElementById("time").innerText = time;

    timer = setInterval(() => {
        time--;
        document.getElementById("time").innerText = time;

        if (time === 0) {
            clearInterval(timer);
            wrong++;
            nextQuestion("Time's up!");
        }
    }, 1000);
}

function submitAnswer() {
    clearInterval(timer);
    let userAnswer = document.getElementById("answer").value;

    if (Number(userAnswer) === correctAnswer) {
        correct++;
        nextQuestion("Correct!");
    } else {
        wrong++;
        nextQuestion("Wrong!");
    }
}

function nextQuestion(message) {
    document.getElementById("feedback").innerText = message;

    document.getElementById("score").innerText = correct;
    document.getElementById("wrong").innerText = wrong;

    let acc = ((correct / (correct + wrong)) * 100).toFixed(2);
    document.getElementById("accuracy").innerText = acc + "%";

    current++;
    document.getElementById("progress").innerText =
        `${current} / ${total}`;

    document.getElementById("answer").value = "";

    if (current > total) {
        window.location = `result.php?c=${correct}&w=${wrong}`;
    } else {
        generateQuestion();
    }
}

generateQuestion();
