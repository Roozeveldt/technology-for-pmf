<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mt-2">Список сотрудников</h5>
                </div>
                <div class="card-body">
                    <div v-if="employees.length > 0">
                        <table class="table table-bordered align-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ФИО</th>
                                <th scope="col">Email</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Должность</th>
                                <th scope="col">Роль</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(employee, idx) in employees">
                                <th scope="row">{{ idx + 1 }}</th>
                                <td>{{ employee.name }}</td>
                                <td>{{ employee.email }}</td>
                                <td>{{ employee.phone }}</td>
                                <td>{{ employee.position }}</td>
                                <td>{{ employee.role }}</td>
                                <td>
                                    <router-link :to="{ name: 'employee.edit', params: { id: employee.id }}"
                                                 class="btn btn-sm btn-outline-primary">Редактировать
                                    </router-link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div v-else>
                        <p>В базе данных сотрудники не добавлены.</p>
                    </div>
                </div>
                <div class="card-footer">
                    <router-link :to="{ name: 'employee.create' }" class="btn btn-success" role="button">Добавить новую
                        запись
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Index',

    data() {
        return {
            employees: [],
        };
    },

    methods: {
        async getEmployees() {
            await axios.get('/api/employees').then((res) => {
                this.employees = res.data.data;
            });
        },
    },

    mounted() {
        this.getEmployees();
    },
};
</script>

<style scoped>

</style>
