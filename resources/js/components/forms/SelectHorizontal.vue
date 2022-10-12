<template>
    <div class="row mb-3">
        <label :for="id" class="col-sm-2 col-form-label">{{ label }}</label>
        <div class="col-sm-10">
            <select
                class="form-select"
                :class="inputClasses"
                :id="id"
                :name="name"
                v-model="form[name]"
            >
                <option selected disabled value="">Выберите нужный вариант из списка</option>
                <option
                    v-for="option in options"
                    :key="option.id"
                    :value="option.id"
                >
                    {{ option.title }}
                </option>
            </select>
            <div v-if="hasError" class="invalid-feedback">
                {{ errorText }}
            </div>
        </div>
    </div>
</template>

<script>
import baseInput from '../mixins/base-input';

export default {
    mixins: [
        baseInput,
    ],
    props: {
        options: { type: Object, required: true },
    },
};
</script>
