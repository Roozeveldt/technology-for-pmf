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
                            label="Название линии"
                            name="title"
                            :form="form"
                            type="text"
                        ></app-input>
                        <app-textarea
                            label="Описание линии"
                            name="description"
                            :form="form"
                        ></app-textarea>
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
                title: '',
                description: '',
            }),
        };
    },

    methods: {
        async getLine() {
            await axios.get('/api/lines/' + this.$route.params.id)
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
                await this.form.put('/api/lines/' + this.form.id).then((response) => {
                    this.$router.push({ name: 'line.index' });
                    this.$swal({
                        icon: 'success',
                        title: 'Запись обновлена.',
                    });
                });
            } catch ( err ) {
                /*console.log(err.response.data.message);
                this.$swal({
                    icon: 'error',
                    title: 'Что-то пошло не так!',
                });*/
            }
        },
    },

    mounted() {
        this.getLine();
    },

    components: {
        AppInput,
        AppTextarea,
    },
};
</script>

<style scoped>

</style>
