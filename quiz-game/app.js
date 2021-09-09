function populate() {
    if (quiz.isEnded()) {
        // showScores();
        window.location = "../index2.php";
    } else {
        var element = document.getElementById("question");
        element.innerHTML = quiz.getQuestionIndex().text;

        var choices = quiz.getQuestionIndex().choices;
        for (var i = 0; i < choices.length; i++) {
            var element = document.getElementById("choice" + i);
            element.innerHTML = choices[i];
            guess("btn" + i, choices[i]);
        }
        showProgress();
    }
};

function guess(id, guess) {
    var button = document.getElementById(id);
    button.onclick = function() {
        quiz.guess(guess);
        populate();
    }
};

function showProgress() {
    var currentQuestionNumber = quiz.questionIndex + 1;
    var element = document.getElementById("progress");
    element.innerHTML = "Question " + currentQuestionNumber + " of " + quiz.questions.length;

};

function showScores() {
    var gameOverHtml = "<h1> BOT BAD!!!..</h1>"
    gameOverHtml += "<h2 id='score'>Your Score is :  " + quiz.score + "</h2>";
    gameOverHtml += "<a id='home' href='../index2.php' >Let's Start</a>";
    var element = document.getElementById("quiz");
    element.innerHTML = gameOverHtml;


};

var questions = [

    new Question("What is the capital of New Zealand?", ["Auckland", "Wallington", "Chandigadh", "Denmark"], "Wallington"),
    new Question("Which is the official language of india?", ["Hindi", "Bengali", "Tamil", "Gujarati"], "Hindi"),
    new Question("How many major colour is in indian flag?", ["1", "2", "3", "4"], "3")
];
var quiz = new Quiz(questions);
populate();