var scores ,main_score ,active_player ,dice;

scores = [0,0,0];
main_score = 0;
active_player =1;

document.querySelector('.dice').style.display = 'none';

document.getElementById('score-1').textContent = '0';
document.getElementById('score-2').textContent = '0';
document.getElementById('current-1').textContent = '0';
document.getElementById('current-2').textContent = '0';


document.querySelector('.btn-rel').addEventListener('click', function () {
  var dice = Math.floor(Math.random() * 6) + 1;
  document.querySelector('#current-' + active_player).textContent = dice;

  var diceDOM =  document.querySelector('.dice');
  diceDOM.style.display = 'block';
  diceDOM.src = 'images/dice-' + dice + '.png';


  if (dice !== 1) {
    main_score += dice;
    document.querySelector('#current-' + active_player).textContent = main_score;
  }
  else {
    next_player();
  }

});




document.querySelector('.btn-hld').addEventListener('click', function () {
  scores[active_player] += main_score;

  document.querySelector('#score-' + active_player).textContent = scores[active_player];

  if (scores[active_player] >= 20) {
    document.querySelector('.one').classList.remove('active');
    document.querySelector('.two').classList.remove('active');
    document.querySelector('#player-' + active_player).textContent = 'Winner!';
    document.querySelector('.btn-rel').style.display = 'none';
    document.querySelector('.btn-hld').style.display = 'none';


  }

  next_player();

});

function next_player() {
  active_player === 1 ? active_player = 2 : active_player = 1;
  main_score = 0;

  document.getElementById('current-1').textContent = '0';
  document.getElementById('current-2').textContent = '0';

  document.querySelector('.one').classList.toggle('active');
  document.querySelector('.two').classList.toggle('active');

  document.querySelector('.dice').style.display = 'none';
}
// dice = Math.floor(Math.random() * 6) + 1;
// console.log(dice);
// document.querySelector('#current-' + active_player).textContent = dice;
// var x = document.getElementById('current-1').innerHTML
// document.querySelector('current-1').textContent = dice;
// document.querySelector('.dice').style.display = 'none';
