// Login Page
let login = require("./components/auth/login.vue").default;

// register Page
let register = require("./components/auth/register.vue").default;

// forgot password page
let forget = require("./components/auth/forget.vue").default;

export const routes = [
    { path: "/", component: login, name: "/" },
    { path: "/register", component: register, name: "register" },
    { path: "/forgot-password", component: forget, name: "forgot-password" },
];
