<template>
    <div id="app">
    <section class="row">
        <div class="small-6 columns">
            <h1 class="text-center">YOU</h1>
            <div class="healthbar">
                <div class="healthbar text-center" style="background-color: green; margin: 0; color: white;" :style="myStyle_you">
                  <p v-if="you_won" style="color:#000000;">Winner</p>
                  <p v-else>{{you_health}}</p>
                </div>
            </div>
        </div>
        <div class="small-6 columns">
            <h1 class="text-center">MONSTER</h1>
            <div class="healthbar">
                <div class="healthbar text-center" style="background-color: green; margin: 0; color: white;" :style="myStyle_mon">
                  <p v-if="mon_won" style="color:#000000;">Winner</p>
                  <p v-else>{{mon_health}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="row controls">
        <div class="small-12 columns">
          <!-- <p>Heyy</p> -->
            <button id="start-game" @click="start()" >START NEW GAME</button>
        </div>
    </section>
    <section class="row controls">
        <div v-if="show" class="small-12 columns">
            <button id="attack" @click="attack">ATTACK</button>
            <button id="special-attack" @click="spl_attack">SPECIAL ATTACK</button>
            <button id="heal" @click="heal">HEAL</button>
            <button id="give-up" @click="give_up" >GIVE UP</button>
        </div>
        <div v-else>
          <p>Click Start to Play</p>
        </div>
    </section>
    <section class="row log">
        <div class="small-12 columns">
            <ul>
                <li v-for="lie in list_el">{{lie}}
                </li>
            </ul>
        </div>
    </section>
</div>
</template>

<script>
export default {
  name: 'Trial',
  data () {
    return {
      show: false,
      you_health: 100,
      mon_health: 100,
      you_won: false,
      mon_won: false,
      atk_you: 0,
      atk_mon: 0,
      list_el: [],
      ran: 6,
      spcl: 10
    }
  },
  computed: {
    myStyle_you: function () {
      return {
        width: this.you_health + '%'
      }
    },
    myStyle_mon: function () {
      return {
        width: this.mon_health + '%'
      }
    }
  },
  methods: {
    start: function () {
      this.show = true,
      this.you_health = 100,
      this.mon_health = 100,
      this.you_won = false,
      this.mon_won =false,
      this.atk_mon =0,
      this.atk_you =0,
      this.list_el = [],
      this.ran = 6,
      this.spcl = 10
  },
  attack: function () {
    this.atk_you = Math.floor(Math.random() * (Math.floor(Math.random()* this.ran))) + 1;
    this.atk_mon = Math.floor(Math.random() * (Math.floor(Math.random()* this.ran))) + 1;
    this.you_health = this.you_health - this.atk_you;
    this.mon_health = this.mon_health - this.atk_mon;
    this.check_below();
    this.check_won();
    this.list_el.push('You lost ' + this.atk_you + ' health & Monster lost ' + this.atk_mon + ' health');
  },
  spl_attack: function () {
    this.atk_you = Math.floor(Math.random() * (Math.floor(Math.random()* this.ran))) + this.spcl;
    this.atk_mon = Math.floor(Math.random() * (Math.floor(Math.random()* this.ran))) + this.spcl;
    this.you_health = this.you_health - this.atk_you;
    this.mon_health = this.mon_health - this.atk_mon;
    this.check_below();
    this.check_won();
    this.list_el.push('You lost ' + this.atk_you + ' health & Monster lost ' + this.atk_mon + ' health');
  },
  heal: function () {
    if (this.you_health < 100) {
      this.atk_you = Math.floor(Math.random() * 6) + 1;
      this.you_health = this.you_health + this.atk_you;
    }
    if (this.mon_health <100) {
      this.atk_mon = Math.floor(Math.random() * 6) + 1;
      this.mon_health = this.mon_health + this.atk_mon;
    }
    this.list_el.push('You Gained ' + this.atk_you + ' health & Monster Gained ' + this.atk_mon + ' health');
  },
  check_below: function () {
    if (this.you_health < this.mon_health && this.you_health <15) {
      this.ran = Math.floor(Math.random() * this.you_health) + 1;
      this.spcl = Math.floor(Math.random() * this.you_health) + 1;
    }
    if (this.mon_health < this.you_health && this.mon_health <15) {
      this.ran = Math.floor(Math.random() * this.you_health) + 1;
      this.spcl = Math.floor(Math.random() * this.you_health) + 1;
    }
  },
    check_won: function () {
      if (this.you_health <= 0 && this.mon_health > 0) {
        this.mon_won = true
        this.show = false
    }
      else if (this.you_health > 0 && this.mon_health <= 0) {
        this.you_won = true
        this.show = false 
        }
      else if (this.you_health <= 0 && this.mon_health <= 0) {
        this.mon_won = true
        this.show = false
      }
    },
    give_up: function () {
      this.mon_won = true
      this.show = false
    }

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.text-center {
    text-align: center;
}
.healthbar {
    width: 80%;
    height: 40px;
    background-color: #eee;
    margin: auto;
    transition: width 500ms;
}

.controls, .log {
    margin-top: 30px;
    text-align: center;
    padding: 10px;
    border: 1px solid #ccc;
    box-shadow: 0px 3px 6px #ccc;
}

.turn {
    margin-top: 20px;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 22px;
}

.log ul {
    list-style: none;
    font-weight: bold;
    text-transform: uppercase;
}

.log ul li {
    margin: 5px;
}

.log ul .player-turn {
    color: blue;
    background-color: #e4e8ff;
}

.log ul .monster-turn {
    color: red;
    background-color: #ffc0c1;
}

button {
    font-size: 20px;
    background-color: #eee;
    padding: 12px;
    box-shadow: 0 1px 1px black;
    margin: 10px;
}

#start-game {
    background-color: #aaffb0;
}

#start-game:hover {
    background-color: #76ff7e;
}

#attack {
    background-color: #ff7367;
}

#attack:hover {
    background-color: #ff3f43;
}

#special-attack {
    background-color: #ffaf4f;
}

#special-attack:hover {
    background-color: #ff9a2b;
}

#heal {
    background-color: #aaffb0;
}

#heal:hover {
    background-color: #76ff7e;
}

#give-up {
    background-color: #ffffff;
}

#give-up:hover {
    background-color: #c7c7c7;
}

</style>
