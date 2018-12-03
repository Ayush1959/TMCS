import Wizard from "./components/Wizard.vue";
import Header from "./components/Header.vue";
import Home from "./components/Home.vue";

const User = resolve => {
  require.ensure(["./components/user/User.vue"], () => {
    resolve(require("./components/user/User.vue"));
  });
};

export const routes = [{
    path: "",
    component: Home,
    name: "home"
  },
  {
    path: "/user",
    component: User,
    name: "user"
  }
];
