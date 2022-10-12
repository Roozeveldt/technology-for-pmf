const lineRoutes = [
    {
        path: '/lines',
        component: () => import('../views/Line/Index.vue'),
        name: 'line.index',
        meta: {
            title: 'Справочники :: Технологические линии',
        },
    },
    {
        path: '/lines/create',
        component: () => import('../views/Line/Create.vue'),
        name: 'line.create',
        meta: {
            title: 'Справочники :: Новая технологическая линия',
        },
    },
    {
        path: '/lines/edit/:id',
        component: () => import('../views/Line/Edit.vue'),
        name: 'line.edit',
        meta: {
            title: 'Справочники :: Редактирование технологической линии',
        },
    },
];

export default lineRoutes;
