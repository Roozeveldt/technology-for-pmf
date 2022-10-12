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
                code: '',
                title: '',
                description: '',
            }),
        };
    },

    methods: {
        async create() {
            try {
                await this.form.post('/api/packages').then((response) => {
                    this.$router.push({ name: 'package.index' });
                    this.$swal({
                        icon: 'success',
                        title: 'Запись добавлена.',
                    });
                });
            } catch ( err ) {
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
