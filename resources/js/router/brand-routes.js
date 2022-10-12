const brandRoutes = [
    {
        path: '/brands',
        component: () => import('../views/Brand/Index.vue'),
        name: 'brand.index',
        meta: {
            title: 'Справочники :: Бренды',
        },
    },
    {
        path: '/brands/create',
        component: () => import('../views/Brand/Create.vue'),
        name: 'brand.create',
        meta: {
            title: 'Справочники :: Новый бренд',
        },
    },
    {
        path: '/brands/edit/:id',
        component: () => import('../views/Brand/Edit.vue'),
        name: 'brand.edit',
        meta: {
            title: 'Справочники :: Редактирование бренда',
        },
    },
];

export default brandRoutes;
