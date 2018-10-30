var l_50 = 0.2;
var l_200 = 0.15;
var g_200 = 0.1;
var tips = [];
var bills = [124,48,268];
var bill = [];
for (var i = 0; i < bills.length; i++) {
  x = bills[i];
  if (x < 50) {
    var tip = (x * l_50);
    tips[i] = tip;
  }
  else if (x >= 50 && x < 200 ) {
    var tip = (x * l_200);
    tips[i] = tip;
  }
  else {
    var tip = (x * g_200);
    tips[i] = tip;
  }
  bill[i] = x + tip;
  console.log(tip);
  console.log(tips);
  console.log(bill);
}
