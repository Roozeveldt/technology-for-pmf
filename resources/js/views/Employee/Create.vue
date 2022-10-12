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
                            label="ФИО сотрудника"
                            name="name"
                            :form="form"
                            type="text"
                        ></app-input>
                        <app-input
                            label="Email сотрудника"
                            name="email"
                            :form="form"
                            type="email"
                        ></app-input>
                        <app-input
                            label="Телефон сотрудника"
                            name="phone"
                            :form="form"
                            type="text"
                        ></app-input>
                        <app-input
                            label="Должность сотрудника"
                            name="position"
                            :form="form"
                            type="text"
                        ></app-input>
                        <app-select
                            label="Роль"
                            name="role"
                            :options="roles"
                            :form="form"
                        ></app-select>
                        <app-input
                            label="Пароль"
                            name="password"
                            :form="form"
                            type="password"
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
import AppSelect from '../../components/forms/Select.vue';

export default {
    name: 'Create',

    data() {
        return {
            roles: [
                {
                    id: 10,
                    title: 'Оператор',
                },
                {
                    id: 15,
                    title: 'Технолог',
                },
                {
                    id: 20,
                    title: 'Администратор',
                },
            ],
            form: new Form({
                name: '',
                email: '',
                phone: '',
                position: '',
                role: '',
                password: '',
            }),
        };
    },

    methods: {
        async create() {
            try {
                await this.form.post('/api/employees').then(() => {
                    this.$router.push({ name: 'employee.index' });
                    this.$swal({
                        icon: 'success',
                        title: 'Запись добавлена.',
                    });
                });
            } catch ( err ) {
                this.$swal({
                    icon: 'error',
                    title: 'Что-то пошло не так!',
                    text: err.response.data.message
                });
            }
        },
    },

    components: {
        AppInput,
        AppSelect,
    },
};
</script>

<style scoped>

</style>
