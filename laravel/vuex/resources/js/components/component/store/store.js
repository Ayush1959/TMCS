import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        counter: 0,
        value: 2 //for vmodel
    },
    getters: {
        doubleCounter: state => {
            return state.counter * 2;
        },
        stringCounter: state => {
            return state.counter + " clicks";
        },
        value: state => {
            return state.value;
        }
    },
    mutations: {
        increment: state => {
            state.counter++;
        },
        decrement: state => {
            state.counter--;
        },
        updateValue: (state, payload) => {
            state.value = payload;
        }
    },
    actions: {
        increment: context => {
            context.commit("increment");
        },
        decrement: ({ commit }) => {
            commit("decrement");
        },
        asyncIncrement: context => {
            setTimeout(() => {
                context.commit("increment");
            }, 1000);
        },
        asyncDecrement: ({ commit }) => {
            setTimeout(() => {
                commit("decrement");
            }, 1000);
        },
        updateValue: ({ commit }, payload) => {
            commit("updateValue", payload);
        }
    }
});
