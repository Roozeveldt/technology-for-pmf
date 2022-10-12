<template>
    <div class="mb-3">
        <label :for="id" class="form-label">{{ label }}</label>
        <div
            class="form-check"
            :class="inputClasses"
            v-for="option in options"
            :key="option.id"
        >
            <input
                class="form-check-input"
                type="checkbox"

                :name="name"
                :id="'field_' + option.id"
                :value="option.id"
                v-model="form[name]"

            >
            <label
                class="form-check-label"
                :for="'field_' + option.id"
            >{{ option.title }}</label>
        </div>
        {{ form[name] }}
        {{ typeof form[name] }}

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

        // ids: { type: Array, default: [] },
    },

    data() {
        return {
            // {{ Object.values(form[name]).map(value => value.id).includes(1) }}
            // {{ typeof option.id }} {{ Object.values(form[name]).map(v => v.id).includes(option.id) }}
            // ids: [1, 3]
        };
    },
};
</script>
