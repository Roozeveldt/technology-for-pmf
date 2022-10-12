const technologRoutes = [
    {
        path: '/technolog',
        component: () => import('../views/Plan/Index.vue'),
        name: 'technolog.plan.index',
        meta: {
            title: 'Главный технолог :: Планы по линиям',
        },
    },
    {
        path: '/technolog/create',
        component: () => import('../views/Plan/Create.vue'),
        name: 'technolog.plan.create',
        meta: {
            title: 'Главный технолог :: Планирование на смену',
        },
    },
];

export default technologRoutes;
