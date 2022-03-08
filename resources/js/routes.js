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

// Category Page
let category = require("./components/category/index.vue").default;
let storecategory = require("./components/category/create.vue").default;
let editcategory = require("./components/category/edit.vue").default;

// Product Page
let product = require("./components/product/index.vue").default;
let storeproduct = require("./components/product/create.vue").default;
let editproduct = require("./components/product/edit.vue").default;

// Expense Page
let expense = require("./components/expense/index.vue").default;
let storeexpense = require("./components/expense/create.vue").default;
let editexpense = require("./components/expense/edit.vue").default;

// Sallary Page
let sallary = require("./components/sallary/all_employee.vue").default;
let paysallary = require("./components/sallary/create.vue").default;
let allsallary = require("./components/sallary/index.vue").default;
let viewsallary = require("./components/sallary/view.vue").default;
let editsallary = require("./components/sallary/edit.vue").default;

// Stock Page
let stock = require("./components/product/stock.vue").default;
let editstock = require("./components/product/edit_stock.vue").default;

// Expense Page
let customer = require("./components/customer/index.vue").default;
let storecustomer = require("./components/customer/create.vue").default;
let editcustomer = require("./components/customer/edit.vue").default;

// Pos Page
let pos = require("./components/pos/index.vue").default;

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

    // Product page
    {
        path: "/product",
        component: product,
        name: "product",
    },
    {
        path: "/store-product",
        component: storeproduct,
        name: "store-product",
    },
    {
        path: "/edit-product/:id",
        component: editproduct,
        name: "edit-product",
    },

    // Expense page
    {
        path: "/expense",
        component: expense,
        name: "expense",
    },
    {
        path: "/store-expense",
        component: storeexpense,
        name: "store-expense",
    },
    {
        path: "/edit-expense/:id",
        component: editexpense,
        name: "edit-expense",
    },

    // Sallary page
    {
        path: "/given-sallary",
        component: sallary,
        name: "given-sallary",
    },
    {
        path: "/pay-sallary/:id",
        component: paysallary,
        name: "pay-sallary",
    },
    {
        path: "/sallary",
        component: allsallary,
        name: "sallary",
    },
    {
        path: "/view-sallary/:id",
        component: viewsallary,
        name: "view-sallary",
    },
    {
        path: "/edit-sallary/:id",
        component: editsallary,
        name: "edit-sallary",
    },

    // Stock Page
    {
        path: "/stock",
        component: stock,
        name: "stock",
    },
    {
        path: "/edit-stock/:id",
        component: editstock,
        name: "edit-stock",
    },

    // Expense page
    {
        path: "/customer",
        component: customer,
        name: "customer",
    },
    {
        path: "/store-customer",
        component: storecustomer,
        name: "store-customer",
    },
    {
        path: "/edit-customer/:id",
        component: editcustomer,
        name: "edit-customer",
    },

    // POS Page
    {
        path: "/pos",
        component: pos,
        name: "pos",
    },
];
