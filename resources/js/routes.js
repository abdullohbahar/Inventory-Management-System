// Login Page
let login = require("./components/auth/login.vue").default;

// register Page
let register = require("./components/auth/register.vue").default;

// forgot password page
let forget = require("./components/auth/forget.vue").default;

// Logout
let logout = require("./components/auth/logout.vue").default;

// Home Page
let home = require("./components/home.vue").default;

export const routes = [
    { path: "/", component: login, name: "/" },
    { path: "/register", component: register, name: "register" },
    { path: "/forgot-password", component: forget, name: "forgot-password" },
    { path: "/logout", component: logout, name: "logout" },
    { path: "/home", component: home, name: "home" },
];
