
                                       // 0 - 9
function myFunction(z)
{
    document.getElementById('screen').innerHTML += z;
    var x = parseFloat(document.getElementById('screen').innerHTML);
}


                                  // +,-,*,/,%, clear , Do

function sign_myFunction(z) {
  var x = parseFloat(document.getElementById('screen').innerHTML);
  var y = x;
  document.getElementById('screen').innerHTML = '';
  if (z == 1) {
    document.getElementById('sign_screen').innerHTML = "+";
    a = 1;
    document.getElementById('=').onclick = function() {
        var x = parseFloat(document.getElementById('screen').innerHTML);
        document.getElementById('sign_screen').innerHTML = '';
        document.getElementById('screen').innerHTML = y+x;
      }
  }
  if (z == 2) {
    document.getElementById('sign_screen').innerHTML = "-";
    document.getElementById('=').onclick = function() {
        var x = parseFloat(document.getElementById('screen').innerHTML);
        document.getElementById('sign_screen').innerHTML = '';
        document.getElementById('screen').innerHTML = y-x;
      }
  }
  if (z == 3) {
    document.getElementById('sign_screen').innerHTML = "*";
    document.getElementById('=').onclick = function() {
        var x = parseFloat(document.getElementById('screen').innerHTML);
        document.getElementById('sign_screen').innerHTML = '';
        document.getElementById('screen').innerHTML = y*x;
      }
  }
  if (z == 4) {
    document.getElementById('sign_screen').innerHTML = "/";
    document.getElementById('=').onclick = function() {
        var x = parseFloat(document.getElementById('screen').innerHTML);
        document.getElementById('sign_screen').innerHTML = '';
        document.getElementById('screen').innerHTML = y/x;
      }
  }
  if (z == 5) {
    document.getElementById('sign_screen').innerHTML = "%";
    document.getElementById('=').onclick = function() {
        var x = parseFloat(document.getElementById('screen').innerHTML);
        document.getElementById('sign_screen').innerHTML = '';
        document.getElementById('screen').innerHTML = y*(x/100);
      }
  }
  // if (z == 6) {
  //   if (a == 1) {
  //     alert(typeof(x));
  //     alert(typeof(y));
  //     alert(a);
  //     var x = parseFloat(document.getElementById('screen').innerHTML);
  //     document.getElementById('sign_screen').innerHTML = '';
  //     document.getElementById('screen').innerHTML = y+x;
  //
  //   }
  //
  // }
  if (z == 7) {
    document.getElementById('screen').innerHTML = '0';
    document.getElementById('sign_screen').innerHTML = '';
    var x = parseFloat(document.getElementById('screen').innerHTML);
  }
  // if (z == 8) {
  //   document.getElementById('screen').innerHTML += '.';
  //   var x = parseFloat(document.getElementById('screen').innerHTML);
  // }
  if (z == 9) {
    document.getElementById('screen').innerHTML = '0';
    document.getElementById('sign_screen').innerHTML = '';
    var x = parseFloat(document.getElementById('screen').innerHTML);
  }
}


                                                  // DOT

                                                  document.getElementById('.').onclick = function() {
                                                    document.getElementById('screen').innerHTML += '.';
                                                    var x = parseFloat(document.getElementById('screen').innerHTML);
                                                  }

                                                  // delete


 document.getElementById('del').onclick = function() {
document.getElementById('screen').innerHTML = document.getElementById('screen').innerHTML.replace(/.$/, '');
var x = parseFloat(document.getElementById('screen').innerHTML);
}
