const formatRoutes = [
    {
        path: '/formats',
        component: () => import('../views/Format/Index.vue'),
        name: 'format.index',
        meta: {
            title: 'Справочники :: Форматы макаронных изделий',
        },
    },
    {
        path: '/formats/create',
        component: () => import('../views/Format/Create.vue'),
        name: 'format.create',
        meta: {
            title: 'Справочники :: Новый формат',
        },
    },
    {
        path: '/formats/edit/:id',
        component: () => import('../views/Format/Edit.vue'),
        name: 'format.edit',
        meta: {
            title: 'Справочники :: Редактирование формата',
        },
    },
];

export default formatRoutes;
