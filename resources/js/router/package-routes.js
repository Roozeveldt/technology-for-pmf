const packageRoutes = [
    {
        path: '/packages',
        component: () => import('../views/PackageKind/Index.vue'),
        name: 'package.index',
        meta: {
            title: 'Справочники :: Виды упаковки',
        },
    },
    {
        path: '/packages/create',
        component: () => import('../views/PackageKind/Create.vue'),
        name: 'package.create',
        meta: {
            title: 'Справочники :: Новый вид упаковки',
        },
    },
    {
        path: '/packages/edit/:id',
        component: () => import('../views/PackageKind/Edit.vue'),
        name: 'package.edit',
        meta: {
            title: 'Справочники :: Редактирование вида упаковки',
        },
    },
];

export default packageRoutes;
