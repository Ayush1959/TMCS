<template>
    <div class="container" id="app">
        <div class="col-xs-5 one" v-bind:class="{active: turn1}">
            <div class="player1 cen" id="player-1">Player1
            </div>
            <div class="totalscore1 cen" id="score-1">{{ score[1] }}
            </div>
            <div class="current_container" v-if='win[1]'>
                <div class="current1 cen">Current
                </div>
                <div class="current-1 cen" id="current-1">{{ curren1 }}
                </div>
            </div>
            <div v-else>
                <div class="cen">Winner</div>
                <div class="lef"><img class="siz_img" src="@/images/victory.jpeg" alt="winner" srcset=""></div>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="row">
                <button class="btn-new btn-default" @click='start()'><i class="glyphicon glyphicon-plus"></i> New Game</button>
                <!-- <img src="" alt="+"> New Game -->
            </div>
            <div v-if="show">
                <div class="row">
                    <!-- <button class="btn-new"><i class="glyphicon glyphicon-plus"></i> New Game</button> -->
                    <img :src="image" class="img dice" alt="+">
                    <!-- <img :src="product.img" />> -->
                </div>
                <div class="row top">
                    <button class="btn-rel  btn-default" @click='reload()'><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                    <!-- <img src="" alt="R"> Roll Dice -->
                </div>
                <div class="row btm">
                    <button class="btn-hld  btn-default" @click='hold()'><i class="glyphicon glyphicon-download-alt"></i> Hold</button>
                    <!-- <img src="" alt="H"> HOLD -->
                </div>
            </div>
            <div v-else>
                <!-- Click Start -->
            </div>
        </div>

        <div class="col-xs-5 two" v-bind:class="{active: turn2}">
            <div class="player2 cen" id="player-2">Player2
            </div>
            <div class="totalscore2 cen" id="score-2">{{ score[2] }}
            </div>
            <div class="current_container" v-if='win[2]'>
                <div class="current2 cen">Current
                </div>
                <div class="current-2 cen" id="current-2">{{ curren2 }}
                </div>
            </div>
            <div v-else>
                <div class="cen">Winner</div>
                <div class="lef"><img class="siz_img" src="@/images/victory.jpeg" alt="winner" srcset=""></div>
            </div>
        </div>
    </div>
</template>

<script>
import image1 from "@/images/dice-1.png"
import image2 from "@/images/dice-2.png"
import image3 from "@/images/dice-3.png"
import image4 from "@/images/dice-4.png"
import image5 from "@/images/dice-5.png"
import image6 from "@/images/dice-6.png"

export default {
  name: 'Dice',
  data () {
    return {
      show: false,
      dice: 0,
      curren1: 0,
      score: [0, 0, 0],
      current: [0, 0, 0],
      curren2: 0,
      active_player: 1,
      turn1: true,
      turn2: false,
      win: [0, true, true],
      image : image1
    }
  },  
  computed: {
    // showDiceImage: function () {
    //   if (this.dice === 1) {
    //     this.image = image1
    //   }
    //   if (this.dice === 2) {
    //     this.image = image2
    //   }
    //   if (this.dice === 3) {
    //     this.image = image3
    //   }
    //   if (this.dice === 4) {
    //     this.image = image4
    //   }
    //   if (this.dice === 5) {
    //     this.image = image5
    //   }
    //   if (this.dice === 6) {
    //     this.image = image6
    //   }
    //   return ('@/images/dice-1.png');
    // }
  },
  methods: {
    start: function () {
      this.show = true
      this.current[this.active_player] = 0
      this.active_player = 1
      this.dice = 0
      this.curren1 = 0
      this.curren2 = 0
      this.turn1 = true
      this.turn2 = false
      this.current = [0, 0, 0]
      this.score = [0, 0, 0]
      this.win = [0, true, true]
      this.image = image1
    },
    showDiceImage: function () {
      if (this.dice === 1) {
        this.image = image1
      }
      if (this.dice === 2) {
        this.image = image2
      }
      if (this.dice === 3) {
        this.image = image3
      }
      if (this.dice === 4) {
        this.image = image4
      }
      if (this.dice === 5) {
        this.image = image5
      }
      if (this.dice === 6) {
        this.image = image6
      }
    },
    // product:{
    //   name: 'My image',
    //   img: './images/dice1.png'
    // },
    reload: function () {
      this.dice = Math.floor(Math.random() * 6) + 1
      if (this.dice !==1) {
        this.showDiceImage();
        this.current[this.active_player] = this.current[this.active_player] + this.dice;
        this.curren1 = this.current[1],
        this.curren2 = this.current[2]
      } else {
        this.showDiceImage();
        this.next_player()
        }
    },
    next_player : function () {
                    if (this.active_player === 1) {
                        this.current[this.active_player] = 0;
                        this.active_player = 2;
                        this.turn2 = true;
                        this.turn1 =false;
                    } else {
                        this.current[this.active_player] = 0;
                        this.active_player = 1;
                        this.turn1 = true;
                        this.turn2 = false
                    }

                },
                hold : function () {
                    this.score[this.active_player] += this.current[this.active_player];
                    if (this.score[this.active_player] > 20) {
                        this.show = false;
                        this.turn1 = false;
                        this.turn2 =false;
                        this.win[this.active_player] = false;
                    }
                    else{
                        this.current[this.active_player] = 0;
                        this.next_player()
                    }
                }
            }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.container{
  width: 750px;
  padding: 0px;
}
.cen{
  text-align: center;
  margin-top: 25px;
}
.winner{
  background-color: #ff0000;
}
.current_container{
  background-color: #ff0000;
  width: 85px;
  margin: auto;
  margin-bottom: 20px;
}
.top{
  margin-top: 40px;
  margin-bottom: 20px;
}
.lef{
  margin-left: 95px;
}
.siz_img{
  height: 140px;
}
.active{
  background-color: #ccc;
}
.btn-new{
  margin-left: 13px;
  border: none;
}
.btn-rel{
  margin-left: 20px;
  border: none;
}
.btn-hld{
  margin-left: 25px;
  border: none;
}
.img{
  margin-left: 40px;
  margin-top: 25px;
}

</style>
