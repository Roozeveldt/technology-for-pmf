<template>
    <div class="mb-3">
        <label :for="id" class="form-label">{{ label }}</label>
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
