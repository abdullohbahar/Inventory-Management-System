// Login Page
let login = require("./components/auth/login.vue").default;

// register Page
let register = require("./components/auth/register.vue").default;

// forgot password page
let forget = require("./components/auth/forget.vue").default;

// Logout
let logout = require("./components/auth/logout.vue").default;

// Dashboard Page
let home = require("./components/home.vue").default;

// Employee Page
let employee = require("./components/employee/index.vue").default;
let storeemployee = require("./components/employee/create.vue").default;
let editemployee = require("./components/employee/edit.vue").default;

// Supplier Page
let supplier = require("./components/supplier/index.vue").default;
let storesupplier = require("./components/supplier/create.vue").default;
let editsupplier = require("./components/supplier/edit.vue").default;

// Supplier Page
let category = require("./components/category/index.vue").default;
let storecategory = require("./components/category/create.vue").default;
let editcategory = require("./components/category/edit.vue").default;

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
    {
        path: "/store-employee",
        component: storeemployee,
        name: "store-employee",
    },
    {
        path: "/edit-employee/:id",
        component: editemployee,
        name: "edit-employee",
    },

    // Employee page
    {
        path: "/supplier",
        component: supplier,
        name: "supplier",
    },
    {
        path: "/store-supplier",
        component: storesupplier,
        name: "store-supplier",
    },
    {
        path: "/edit-supplier/:id",
        component: editsupplier,
        name: "edit-supplier",
    },

    // Category page
    {
        path: "/category",
        component: category,
        name: "category",
    },
    {
        path: "/store-category",
        component: storecategory,
        name: "store-category",
    },
    {
        path: "/edit-category/:id",
        component: editcategory,
        name: "edit-category",
    },
];
