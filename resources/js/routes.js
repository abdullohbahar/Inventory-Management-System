// Login Page
let login = require("./components/auth/login.vue").default;

// register Page
let register = require("./components/auth/register.vue").default;

// forgot password page
let forget = require("./components/auth/forget.vue").default;

// Logout
let logout = require("./components/auth/logout.vue").default;

// Dashbiard Page
let home = require("./components/home.vue").default;

// Employee Page
let employee = require("./components/employee/index.vue").default;
let storeemployee = require("./components/employee/create.vue").default;
let editemployee = require("./components/employee/edit.vue").default;

export const routes = [
    // Dashboard Page
    {
        path: "/",
        component: login,
        name: "/",
    },

    // Register Page
    {
        path: "/register",
        component: register,
        name: "register",
    },

    // Forgot password Page
    {
        path: "/forgot-password",
        component: forget,
        name: "forgot-password",
    },

    // Logout
    {
        path: "/logout",
        component: logout,
        name: "logout",
    },

    // Dashboard Page
    {
        path: "/home",
        component: home,
        name: "home",
    },

    // Employee page
    {
        path: "/employee",
        component: employee,
        name: "employee",
    },

    // Add Employee page
    {
        path: "/store-employee",
        component: storeemployee,
        name: "store-employee",
    },

    // Edit Employee
    {
        path: "/edit-employee/:id",
        component: editemployee,
        name: "edit-employee",
    },
];
