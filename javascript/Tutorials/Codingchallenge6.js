var John = {
  fullName : "John Doe",
  mass : 58,
  height :  1.5,
  calcBMI: function () {
    this.bmi = this.mass / (this.height * this.height);
    return this.bmi;
  }
}

var Mark = {
  fullName : "Mark smith",
  mass : 70,
  height : 1.3,
  calcBMI: function () {
    this.bmi = this.mass / (this.height * this.height);
    return this.bmi;
  }
}
John.calcBMI();
Mark.calcBMI();
console.log(John.bmi);
console.log(Mark.bmi);

if (Mark.bmi > John.bmi) {
  console.log(Mark.fullName + " has the highest BMI of " + Mark.bmi );
}
else if (John.bmi > Mark.bmi) {
  console.log(John.fullName + " has the highest BMI of " + John.bmi );
}
else {
  console.log("its a draw");
}
