import { createRouter, createWebHistory } from 'vue-router';
import axios from 'axios';

import AuthenticatedLayout from '../layouts/Authenticated.vue';
import GuestLayout from '../layouts/Guest.vue';

import LineRoutes from './line-routes';
import BrandRoutes from './brand-routes';
import FormatRoutes from './format-routes';
import PackageRoutes from './package-routes';
import EmployeeRoutes from './employee-routes';

import TechnologRoutes from './technolog-routes';

const routes = [
    {
        path: "/",
        redirect: { name: "login" },
        component: GuestLayout,
        children: [
            {
                path: '/login',
                component: () => import('../views/Login.vue'),
                name: 'login',
            },
            {
                path: '/user/registration',
                component: () => import('../components/user/Registration.vue'),
                name: 'user.registration',
            },
        ],
    },

    {
        component: AuthenticatedLayout,
        children: [
            {
                path: '/dashboard',
                component: () => import('../views/Dashboard/Index.vue'),
                name: 'dashboard',
                meta: {
                    title: 'Главная',
                },
            },
            ...LineRoutes,
            ...BrandRoutes,
            ...FormatRoutes,
            ...PackageRoutes,
            ...EmployeeRoutes,
            ...TechnologRoutes,
        ],
    },
    {
        path: '/:pathMatch(.*)*',
        component: () => import('../components/notFound.vue'),
        name: 'not-found',
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
    linkActiveClass: 'active',
    linkExactActiveClass: 'active',
});

router.beforeEach((to, from, next) => {

    axios.get('/api/user').then().catch((err) => {
        console.log(err);
        if ( err.response.status === 401 ) {
            localStorage.getItem('x_xsrf_token')
                ? localStorage.removeItem('x_xsrf_token')
                : '';
        }
    });

    const token = localStorage.getItem('x_xsrf_token');

    if ( !token ) {
        return to.name === 'login' || to.name === 'user.registration'
            ? next()
            : next({
                name: 'login',
            });
    }

    if (
        (to.name === 'login' || to.name === 'user.registration') &&
        token
    ) {
        return next({
            name: 'dashboard',
        });
    }

    next();
});

export default router;
