<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mt-2">Список брендов</h5>
                </div>
                <div class="card-body">
                    <div v-if="brands.length > 0">
                        <table class="table table-bordered align-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Код (уникальный)</th>
                                <th scope="col">Название</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(brand, idx) in brands">
                                <th scope="row">{{ idx + 1 }}</th>
                                <td>{{ brand.code }}</td>
                                <td>{{ brand.title }}</td>
                                <td>
                                    <router-link :to="{ name: 'brand.edit', params: { id: brand.id }}"
                                                 class="btn btn-sm btn-outline-primary">Редактировать
                                    </router-link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div v-else>
                        <p>В базе данных не добавлены бренды.</p>
                    </div>
                </div>
                <div class="card-footer">
                    <router-link :to="{ name: 'brand.create' }" class="btn btn-success" role="button">Добавить новую
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
            brands: [],
        };
    },

    methods: {
        getBrands() {
            axios.get('/api/brands').then(async (res) => {
                this.brands = await res.data.data;
            });
        },
    },

    mounted() {
        this.getBrands();
    },
};
</script>

<style scoped>

</style>
