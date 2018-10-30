var John = {
  fullName : 'John smith',
  bills : [124, 48, 268, 180, 42],
  calcTips : function() {
    this.tips = [];
    this.fullamt = [];

    for (var i = 0; i < this.bills.length; i++) {
      var percentage;
      var bill = this.bills[i];

      if (bill < 50) {
        percentage = 0.2;
      }
      else if (bill >=50 && bill <200) {
        percentage = 0.15;
      }
      else {
        percentage = 0.1;
      }

      this.tips[i] = bill * percentage;
      this.fullamt[i] = bill + (bill * percentage);
    }
  }
}

var Mark = {
  fullName : 'Mark Miller',
  bills : [77, 475, 110, 45],
  calcTips : function() {
    this.tips = [];
    this.fullamt = [];

    for (var i = 0; i < this.bills.length; i++) {
      var percentage;
      var bill = this.bills[i];

      if (bill < 100) {
        percentage = 0.2;
      }
      else if (bill >=100 && bill <300) {
        percentage = 0.1;
      }
      else {
        percentage = 0.25;
      }

      this.tips[i] = bill * percentage;
      this.fullamt[i] = bill + (bill * percentage);
    }
  }
}

function calcAverage(tips) {
  var sum = 0;
  for (var i = 0; i < tips.length; i++) {
    sum = sum + tips[i];
  }
  return sum / tips.length;
}
John.calcTips();
Mark.calcTips();

John.average = calcAverage(John.tips);
Mark.average = calcAverage(Mark.tips);

console.log(John);
console.log(Mark);


if (John.average > Mark.average) {
  console.log(John.fullName + '\'s family pays higher tips, with an average of $' + John.average);
}
else if (Mark.average > John.average) {
  console.log(Mark.fullName + '\'s family pays higher tips, with an average of $' + Mark.average);
}
else {
  console.log("they pay the same tip amount")
}
