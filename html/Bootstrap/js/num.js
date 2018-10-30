var x = 2;
var y = 20;

function even (x,y){
	for (var i=x; i<y; i++){
		if ((i % 2) == 0 ) {
			document.getElementById('screen').innerHTML += i;
			document.getElementById('screen').innerHTML += " ";
		}
}
}

function odd (x,y){
	for (var i=x; i<y; i++){
		if ((i % 2) !== 0 ) {
			document.getElementById('screen1').innerHTML += i;
			document.getElementById('screen1').innerHTML += " ";
		}
}
}

function Fibanocci(x,y){
	// y=1;
	x = parseFloat(x);
	y = parseFloat(y);
	// x=0;
	// z = 1;
	z = x + 1;
	v=0;
  // global $x, $y, $v;
	document.getElementById('screen2').innerHTML = x;
	document.getElementById('screen2').innerHTML += " ";
	document.getElementById('screen2').innerHTML += z;
	document.getElementById('screen2').innerHTML += " ";
  // echo "$x <br>";
  // echo "$y <br>";
  for (w=x; w <= y ; w++) {
		if ((v+z) < (y)) {
			v= x+z;
			document.getElementById('screen2').innerHTML += v;
			document.getElementById('screen2').innerHTML += " ";
			// echo "$v <br>";
			x= z;
			z = v;
	}

  }
}
