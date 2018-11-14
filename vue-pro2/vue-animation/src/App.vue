<template>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <h1>Animations</h1>
        <hr>
        <button @click="show = !show" class="btn btn-primary">Show alert</button>
        <br><br>
        <transition name="fade">
          <div v-if="show" class="alert alert-info">This is some info</div>
        </transition>
        <transition name="slide" type="animation">
          <div v-if="show" class="alert alert-info">This is some info in slide</div>
        </transition>
        <transition
         enter-active-class="animated bounce"
         leave-active-class="animated shake"
         >
          <div v-if="show" class="alert alert-info">This is some info</div>
        </transition>
        <hr>
        <button class="btn btn-primary" @click="load = !load">Load / Remove content</button>
        <br><br>
        <transition
              @before-enter="beforeEnter"
              @enter="enter"
              @after-enter="afterEnter"
              @enter-cancelled="enterCancelled"

              @before-leave="beforeLeave"
              @leave="leave"
              @after-leave="afterLeave"
              @leave-cancelled="leaveCancelled"
              :css="false"
              >
          <div style="width:100px; height:100px; background-color: lightgreen" v-if="load">
          </div>
        </transition>
        <hr>
        <button class="btn btn-primary" @click="addItem">Add item</button>
        <br><br>
        <ul class="list-group">
          <transition-group name="slide">
          <li 
            class="list-group-item"
            v-for="(number, index) in numbers"
            @click="removeItem(index)"
            style="cursor: pointer"
            :key="number"
            >
              {{ number }}
          </li>
          </transition-group>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: false,
      load: true,
      numbers: [1, 2, 3, 4, 5]
    };
  },
  methods: {
    beforeEnter(el) {
      console.log("beforeEnter");
      this.elementWidth = 100;
      el.style.width = this.elementWidth + "px";
    },
    enter(el, done) {
      console.log("enter");
      let round = 1;
      const interval = setInterval(() => {
        el.style.width = this.elementWidth + round * 10 + "px";
        round++;
        if (round > 20) {
          clearInterval(interval);
          done();
        }
      }, 20);
    },
    afterEnter(el) {
      console.log("afterEnter");
    },
    enterCancelled(el) {
      console.log("enterCancelled");
    },
    beforeLeave(el) {
      console.log("beforeLeave");
      this.elementWidth = 300;
      el.style.width = this.elementWidth + "px";
    },
    leave(el, done) {
      console.log("Leave");
      let round = 1;
      const interval = setInterval(() => {
        el.style.width = this.elementWidth - round * 10 + "px";
        round++;
        if (round > 20) {
          clearInterval(interval);
          done();
        }
      }, 20);
    },
    afterLeave(el) {
      console.log("afterLeave");
    },
    leaveCancelled(el) {
      console.log("LeaveCancelled");
    },
    addItem() {
      const pos = Math.floor(Math.random() * this.numbers.length);
      this.numbers.splice(pos, 0, this.numbers.length + 1);
    },
    removeItem(index) {
      this.numbers.splice(index, 1);
    }
  }
};
</script>

<style>
.fade-enter {
  opacity: 0;
}

.fade-enter-active {
  transition: opacity 1s;
}

.fade-leave {
}

.fade-leave-active {
  transition: opacity 1s;
  opacity: 0;
}

.slide-enter {
  opacity: 0;
}

.slide-enter-active {
  animation: slide-in 1s ease-out forwards;
  transition: opacity 0.5s;
}

.slide-leave {
}

.slide-leave-active {
  animation: slide-out 1s ease-out forwards;
  transition: opacity 3s;
  opacity: 0;
  position: absolute;
}

.slide-move {
  transition: transform 1s;
}

@keyframes slide-in {
  from {
    transform: translateY(20px);
  }
  to {
    transform: translateY(0);
  }
}

@keyframes slide-out {
  from {
    transform: translateY(0);
  }
  to {
    transform: translateY(20px);
  }
}
</style>
