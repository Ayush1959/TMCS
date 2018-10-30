(function () {
  function Question(question, answers, correct) {
    this.question = question;
    this.answers = answers;
    this.correct = correct;
  }
  var score = 0;

  Question.prototype.displayQuestion = function () {
    console.log(this.question);

    for (var i = 0; i < this.answers.length; i++) {
      console.log( i + " : " + this.answers[i]);
    }
  };

  Question.prototype.checkAnswer = function (ans) {
    if (ans === this.correct) {
      console.log('Correct answer');
      score ++;
      console.log(score);
      }
    else {
      console.log('Wrong answer');
    }
  };
  var q1 = new Question('is this a laptop ?' , ['No','Yes'], 1);
  var q2 = new Question('What is your laptop brand', ['HP', 'DELL','LENOVO'], 2);
  var q3 = new Question('Which is the OS in your Laptop ?' , ['Windows','Linux','Mac','Fedora'], 0);

  // var questions = [q1 , q2 , q3];
  //
  // var n = Math.floor(Math.random() * questions.length);
  //
  // questions[n].displayQuestion();
  // var ans = parseInt(prompt('choose your answer'));
  // questions[n].checkAnswer(ans);
  function nextQuestion() {
    var questions = [q1 , q2 , q3];

    var n = Math.floor(Math.random() * questions.length);

    questions[n].displayQuestion();
    var ans = prompt('choose your answer');


    if (ans !== 'exit') {
      questions[n].checkAnswer(parseInt(ans));
      nextQuestion();
    }
  }
  nextQuestion();


})();
