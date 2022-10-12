<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mt-2">Список видов упаковки</h5>
                </div>
                <div class="card-body">
                    <div v-if="packageKinds.length > 0">
                        <table class="table table-bordered align-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Код (уникальный)</th>
                                <th scope="col">Название</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(packageKind, idx) in packageKinds">
                                <th scope="row">{{ idx + 1 }}</th>
                                <td>{{ packageKind.code }}</td>
                                <td>{{ packageKind.title }}</td>
                                <td>{{ packageKind.description }}</td>
                                <td>
                                    <router-link :to="{ name: 'package.edit', params: { id: packageKind.id }}"
                                                 class="btn btn-sm btn-outline-primary">Редактировать
                                    </router-link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div v-else>
                        <p>В базе данных не добавлены виды упаковок.</p>
                    </div>
                </div>
                <div class="card-footer">
                    <router-link :to="{ name: 'package.create' }" class="btn btn-success" role="button">Добавить новую
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
            packageKinds: [],
        };
    },

    methods: {
        getPackageKinds() {
            axios.get('/api/packages').then(async (res) => {
                this.packageKinds = await res.data.data;
            });
        },
    },

    mounted() {
        this.getPackageKinds();
    },
};
</script>

<style scoped>

</style>
