<template>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mt-2">Редактирование записи ID #{{ form.id }}</h5>
                </div>
                <form @submit.prevent="update" @keydown="form.onKeydown($event)">
                    <div class="card-body">
                        <app-input
                            label="Код вида упаковки (уникальный)"
                            name="code"
                            :form="form"
                            type="text"
                        ></app-input>
                        <app-input
                            label="Название вида упаковки"
                            name="title"
                            :form="form"
                            type="text"
                        ></app-input>
                        <app-input
                            label="Описание вида упаковки"
                            name="description"
                            :form="form"
                            type="text"
                        ></app-input>
                    </div>
                    <div class="card-footer">
                        <button
                            type="submit"
                            class="btn btn-danger"
                            :disabled="form.busy"
                        >Обновить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from 'vform';
import AppInput from '../../components/forms/Input.vue';
import AppTextarea from '../../components/forms/Textarea.vue';
import axios from 'axios';

export default {
    name: 'Create',

    data() {
        return {
            form: new Form({
                id: '',
                code: '',
                title: '',
                description: '',
            }),
        };
    },

    methods: {
        async getPackageKind() {
            await axios.get('/api/packages/' + this.$route.params.id)
                .then((response) => {
                    this.form.fill(response.data.data);
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                    this.$swal({
                        icon: 'error',
                        title: 'Что-то пошло не так!',
                    });
                });
        },
        async update() {
            try {
                await this.form.put('/api/packages/' + this.form.id).then((response) => {
                    this.$router.push({ name: 'package.index' });
                    this.$swal({
                        icon: 'success',
                        title: 'Запись обновлена.',
                    });
                });
            } catch ( err ) {
            }
        },
    },

    mounted() {
        this.getPackageKind();
    },

    components: {
        AppInput,
        AppTextarea,
    },
};
</script>

<style scoped>

</style>
