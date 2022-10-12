<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mt-2">Список технологических линий</h5>
                </div>
                <div class="card-body">
                    <div v-if="lines.length > 0">
                        <table class="table table-bordered align-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(line, idx) in lines">
                                <th scope="row">{{ idx + 1 }}</th>
                                <td>{{ line.title }}</td>
                                <td>{{ line.description }}</td>
                                <td>
                                    <router-link :to="{ name: 'line.edit', params: { id: line.id }}" class="btn btn-sm btn-outline-primary">Редактировать</router-link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div v-else>
                        <p>В базе данных не добавлены технологические линии.</p>
                    </div>
                </div>
                <div class="card-footer">
                    <router-link :to="{ name: 'line.create' }" class="btn btn-success" role="button">Добавить новую запись
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
            lines: [],
        };
    },

    methods: {
        getLines() {
            axios.get('/api/lines').then(async (res) => {
                this.lines = await res.data.data;
            });
        },
    },

    mounted() {
        this.getLines();
    },
};
</script>

<style scoped>

</style>
