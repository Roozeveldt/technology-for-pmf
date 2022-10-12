<template>
    <div class="mb-3">
        <label :for="id" class="form-label">{{ label }}</label>
        <input
            :type="type"
            class="form-control"
            :class="inputClasses"
            :id="id"
            :name="name"
            v-model="form[name]"
        />
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
        type: { type: String, default: 'text' },
    },
};
</script>
