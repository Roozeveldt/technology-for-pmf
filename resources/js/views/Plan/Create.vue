<template>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mt-2">Добавление новой записи</h5>
                </div>
                <form @submit.prevent="create" @keydown="form.onKeydown($event)">
                    <div class="card-body">
                        <app-select-horizontal
                            label="1. Линия"
                            name="lineNumber"
                            :options="lines"
                            :form="form"
                        ></app-select-horizontal>
                        <app-select-horizontal
                            label="2. Смена"
                            name="shiftNumber"
                            :options="shifts"
                            :form="form"
                        ></app-select-horizontal>
                        <app-select-horizontal
                            label="3. Оператор"
                            name="operatorName"
                            :options="employees"
                            :form="form"
                        ></app-select-horizontal>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mt-2">Расчёт по линии</h5>
                </div>
                <div class="card-body">Table</div>
            </div>
        </div>
    </div>
</template>

<script>
import Form from 'vform';
import AppInput from '../../components/forms/Input.vue';
import AppSelect from '../../components/forms/Select.vue';
import AppSelectHorizontal from '../../components/forms/SelectHorizontal.vue';
import axios from 'axios';

export default {
    name: 'Create',

    data() {
        return {
            lines: [],
            employees: [],
            shifts: [
                {
                    id: 1,
                    title: '1-я смена с 08:00 до 20:00',
                },
                {
                    id: 2,
                    title: '2-я смена с 20:00 до 08:00',
                },
            ],
            form: new Form({
                lineNumber: '',
                shiftNumber: '',
                operatorName: '',

            }),
        };
    },

    mounted() {
        this.getLines();
        this.getEmployees();
    },

    methods: {
        async getLines() {
            await axios
                .get('/api/lines')
                .then((response) => this.lines = response.data.data);
        },

        async getEmployees() {
            await axios
                .get('/api/employees')
                .then((response) => this.employees = response.data.data);
        },

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
                    text: err.response.data.message,
                });
            }
        },
    },

    components: {
        AppInput,
        AppSelect,
        AppSelectHorizontal,
    },
};
</script>

<style scoped>

</style>
