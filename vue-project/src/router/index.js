import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Hello from '@/components/Hello'
import Trial from '@/components/Trial'
import Dice from '@/components/Dice'
import Img from '@/components/Img'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/1',
      name: 'Hello',
      component: Hello
    },
    {
      path: '/2',
      name: 'Trial',
      component: Trial
    },
    {
      path: '/3',
      name: 'Dice',
      component: Dice
    },
    {
      path: '/4',
      name: 'Img',
      component: Img
    }
  ]
})
