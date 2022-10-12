<template>
    <div class="d-flex align-items-center text-center form-signin-wrapper">
        <div class="form-signin w-100 m-auto">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Guest',
};
</script>

<style scoped>
.form-signin-wrapper {
    height: 100vh;
    background-color: #f5f5f5 !important;
}
.form-signin {
    max-width: 330px;
    padding: 15px;
}
</style>
