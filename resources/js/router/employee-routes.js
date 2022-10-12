const employeeRoutes = [
    {
        path: '/employees',
        component: () => import('../views/Employee/Index.vue'),
        name: 'employee.index',
        meta: {
            title: 'Справочники :: Сотрудники (технологи, операторы)',
        },
    },
    {
        path: '/employees/create',
        component: () => import('../views/Employee/Create.vue'),
        name: 'employee.create',
        meta: {
            title: 'Справочники :: Новый сотрудник',
        },
    },
    {
        path: '/employees/edit/:id',
        component: () => import('../views/Employee/Edit.vue'),
        name: 'employee.edit',
        meta: {
            title: 'Справочники :: Редактирование сотрудника',
        },
    },
];

export default employeeRoutes;
