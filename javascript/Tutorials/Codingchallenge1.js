var massMark = 85;
var heightMark = 195;
var massJohn = 70;
var heightJohn = 200;
var bmiMark = massMark / (heightMark * heightMark);
var bmiJohn = massJohn / (heightJohn * heightJohn);
var bmiBig = bmiMark > bmiJohn ;
console.log("Is Marks Bmi higher than Johns ?" + " " + bmiBig);
