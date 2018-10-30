var year = [2000,1996,2002,2010,1980,1970];
// var age = [];
//
// for (var i = 0; i < year.length; i++) {
//   age[i] = 2018 - year[i];
// }
// console.log(age);
//
// for (var i = 0; i < year.length; i++) {
//   if (age[i] >= 18) {
//     console.log("person " +  (i+1) + " is of full age " + age[i]);
//   }
//   else {
//     console.log("person " + (i+1) + " is NOT of full age " + age[i]);
//   }
// }

function fin(x) {
  var age = [];
  var ful = [];

  for (var i = 0; i < year.length; i++) {
    age[i] = 2018 - year[i];
  }
  console.log(age);

  for (var i = 0; i < year.length; i++) {
    if (age[i] >= 18) {
      console.log(ful[i] = true);
      // console.log("person " +  (i+1) + " is of full age " + age[i]);
    }
    else {
      console.log(ful[i] = false);
      // console.log("person " + (i+1) + " is NOT of full age " + age[i]);
    }
  }
  console.log(ful);
}

fin(year);
