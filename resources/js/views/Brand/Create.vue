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
                            label="Код бренда (уникальный)"
                            name="code"
                            :form="form"
                            type="text"
                        ></app-input>
                        <app-input
                            label="Название бренда"
                            name="title"
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

export default {
    name: 'Create',

    data() {
        return {
            form: new Form({
                code: '',
                title: '',
            }),
        };
    },

    methods: {
        async create() {
            try {
                await this.form.post('/api/brands').then((response) => {
                    this.$router.push({ name: 'brand.index' });
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
    },
};
</script>

<style scoped>

</style>
