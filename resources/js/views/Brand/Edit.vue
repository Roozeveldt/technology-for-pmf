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
                        <app-checkbox
                            label="Выберите названия форматов"
                            name="formats"
                            :options="formats"
                            :form="form"
                            :checked="form.checked"
                        ></app-checkbox>

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
import AppCheckbox from '../../components/forms/Checkbox.vue';
import axios from 'axios';

export default {
    name: 'Create',

    data() {
        return {
            formats: [],
            ids: [],
            form: new Form({
                id: '',
                code: '',
                title: '',
                formats: this.formats,
                checked: true,
            }),
        };
    },

    methods: {
        async getBrand() {
            await axios.get('/api/brands/' + this.$route.params.id)
                .then((response) => {
                    this.form.fill(response.data.data);
                    this.ids = this.form.formats.map(item => item.id);
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                    this.$swal({
                        icon: 'error',
                        title: 'Что-то пошло не так!',
                    });
                });
        },

        async getFormats() {
            await axios
                .get('/api/formats')
                .then((response) => {
                    this.formats = response.data.data;
                })
                .catch((err) => {
                });
        },

        async update() {
            try {
                // this.form.update({ formats: this.selectedFormats });
                await this.form.put('/api/brands/' + this.form.id).then((response) => {
                    console.log(response);
                    /*this.$router.push({ name: 'brand.index' });
                    this.$swal({
                        icon: 'success',
                        title: 'Запись обновлена.',
                    });*/
                });
            } catch ( err ) {
                console.log(err);
            }
        },
    },

    mounted() {
        this.getBrand();
        this.getFormats();
    },

    components: {
        AppInput,
        AppCheckbox,
    },
};
</script>

<style scoped>

</style>
