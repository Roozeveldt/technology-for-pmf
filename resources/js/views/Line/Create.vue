<template>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mt-2">Добавление новой записи</h5>
                </div>
                <form @submit.prevent="create" @keydown="form.onKeydown($event)">
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
                        >Сохранить
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

export default {
    name: 'Create',

    data() {
        return {
            form: new Form({
                title: '',
                description: '',
            }),
        };
    },

    methods: {
        async create() {
            try {
                await this.form.post('/api/lines').then((response) => {
                    this.$router.push({ name: 'line.index' });
                    this.$swal({
                        icon: 'success',
                        title: 'Запись добавлена.',
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

    components: {
        AppInput,
        AppTextarea,
    },
};
</script>

<style scoped>

</style>
