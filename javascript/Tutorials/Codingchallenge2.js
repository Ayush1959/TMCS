var heightJohn = 150;
var ageJohn = 20;
var heightMark = 170;
var ageMark = 25;
var heightMary = 215;
var ageMary = 18;
var scoreJohn = heightJohn + (5 * ageJohn);
var scoreMark = heightMark + ( 5 * ageMark);
var scoreMary = heightMary + ( 5 * ageMary);
console.log(scoreJohn , scoreMark , scoreMary);
if (scoreJohn > scoreMark && scoreJohn > scoreMary) {
  console.log("John Wins");
}
else if (scoreMark > scoreJohn && scoreMark > scoreMary) {
  console.log("Mark Wins");
}
else if (scoreMary > scoreMark && scoreMary > scoreJohn) {
  console.log("Mary Wins");
}
else {
  console.log("Its a Draw");
}
