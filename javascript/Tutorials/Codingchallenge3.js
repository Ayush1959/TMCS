var scoreJohnAvg = (89 + 120 + 103) / 3;
var scoreMikeAvg = (116 + 94 + 123) / 3;
var scoreMaryAvg = (97 + 134 + 105) / 3;
console.log(scoreJohnAvg , scoreMikeAvg , scoreMaryAvg);
if (scoreJohnAvg > scoreMikeAvg && scoreJohnAvg > scoreMaryAvg) {
  console.log("John Wins");
}
else if (scoreMikeAvg > scoreJohnAvg && scoreMikeAvg > scoreMaryAvg) {
  console.log("Mike Wins");
}
else if (scoreMaryAvg > scoreMikeAvg && scoreMaryAvg > scoreJohnAvg) {
  console.log("Mary Wins");
}
else {
  console.log("Its a Draw");
}
