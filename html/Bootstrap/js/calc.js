
  document.getElementById('1').onclick = function() {
document.getElementById('screen').innerHTML += '1';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('2').onclick = function() {
document.getElementById('screen').innerHTML += '2';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('3').onclick = function() {
document.getElementById('screen').innerHTML += '3';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('4').onclick = function() {
document.getElementById('screen').innerHTML += '4';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('5').onclick = function() {
document.getElementById('screen').innerHTML += '5';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('6').onclick = function() {
document.getElementById('screen').innerHTML += '6';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('7').onclick = function() {
document.getElementById('screen').innerHTML += '7';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('8').onclick = function() {
document.getElementById('screen').innerHTML += '8';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('9').onclick = function() {
document.getElementById('screen').innerHTML += '9';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('0').onclick = function() {
document.getElementById('screen').innerHTML += '0';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('.').onclick = function() {
  document.getElementById('screen').innerHTML += '.';
  var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('plus').onclick = function() {
  document.getElementById('sign_screen').innerHTML = '+';
  var x = parseFloat(document.getElementById('screen').innerHTML);
  var y = x;
  var a = "+";
  document.getElementById('screen').innerHTML = '';
  document.getElementById('=').onclick = function() {
    var x = parseFloat(document.getElementById('screen').innerHTML);
    document.getElementById('sign_screen').innerHTML = '';
    document.getElementById('screen').innerHTML = y+x;
  }
}
document.getElementById('min').onclick = function() {
  document.getElementById('sign_screen').innerHTML = '-';
  var x = parseFloat(document.getElementById('screen').innerHTML);
  var y = x;
  var a = "-";
  document.getElementById('screen').innerHTML = '';
  document.getElementById('=').onclick = function() {
    var x = parseFloat(document.getElementById('screen').innerHTML);
    document.getElementById('sign_screen').innerHTML = '';
    document.getElementById('screen').innerHTML = y-x;
  }
}
document.getElementById('div').onclick = function() {
  document.getElementById('sign_screen').innerHTML = '/';
  var x = parseFloat(document.getElementById('screen').innerHTML);
  var y = x;
  var a = "/";
  document.getElementById('screen').innerHTML = '';
  document.getElementById('=').onclick = function() {
    var x = parseFloat(document.getElementById('screen').innerHTML);
    document.getElementById('sign_screen').innerHTML = '';
    document.getElementById('screen').innerHTML = y/x;
  }
}
document.getElementById('mul').onclick = function() {
  document.getElementById('sign_screen').innerHTML = '*';
  var x = parseFloat(document.getElementById('screen').innerHTML);
  var y = x;
  var a = "*";
  document.getElementById('screen').innerHTML = '';
  document.getElementById('=').onclick = function() {
    var x = parseFloat(document.getElementById('screen').innerHTML);
    document.getElementById('sign_screen').innerHTML = '';
    document.getElementById('screen').innerHTML = y*x;
  }
}
document.getElementById('mod').onclick = function() {
  document.getElementById('sign_screen').innerHTML = '%';
  var x = parseFloat(document.getElementById('screen').innerHTML);
  var y = x;
  var a = "%";
  document.getElementById('screen').innerHTML = '';
  document.getElementById('=').onclick = function() {
    var x = parseFloat(document.getElementById('screen').innerHTML);
    document.getElementById('sign_screen').innerHTML = '';
    document.getElementById('screen').innerHTML = y*(x/100);
  }
}
document.getElementById('del').onclick = function() {
document.getElementById('screen').innerHTML = document.getElementById('screen').innerHTML.replace(/.$/, '');
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('clear').onclick = function() {
document.getElementById('screen').innerHTML = '0';
document.getElementById('sign_screen').innerHTML = '';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('clear1').onclick = function() {
document.getElementById('screen').innerHTML = '0';
document.getElementById('sign_screen').innerHTML = '';
var x = parseFloat(document.getElementById('screen').innerHTML);
}
document.getElementById('=').onclick = function() {
  document.getElementById('screen').innerHTML = y+x;
}
