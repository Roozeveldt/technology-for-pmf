<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mt-2">Список форматов</h5>
                </div>
                <div class="card-body">
                    <div v-if="formats.length > 0">
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
                            <tr v-for="(format, idx) in formats">
                                <th scope="row">{{ idx + 1 }}</th>
                                <td>{{ format.code }}</td>
                                <td>{{ format.title }}</td>
                                <td>
                                    <router-link :to="{ name: 'format.edit', params: { id: format.id }}"
                                                 class="btn btn-sm btn-outline-primary">Редактировать
                                    </router-link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div v-else>
                        <p>В базе данных не добавлены форматы.</p>
                    </div>
                </div>
                <div class="card-footer">
                    <router-link :to="{ name: 'format.create' }" class="btn btn-success" role="button">Добавить новую
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
            formats: [],
        };
    },

    methods: {
        getFormats() {
            axios.get('/api/formats').then(async (res) => {
                this.formats = await res.data.data;
            });
        },
    },

    mounted() {
        this.getFormats();
    },
};
</script>

<style scoped>

</style>
