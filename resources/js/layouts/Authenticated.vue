<template>
    <the-header></the-header>
    <div class="container-fluid">
        <div class="row">
            <the-sidebar></the-sidebar>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="my-3">{{ currentPageTitle }}</h1>
                <router-view></router-view>
            </main>
        </div>
    </div>
</template>

<script>
import TheHeader from '../components/ui/TheHeader.vue';
import TheSidebar from '../components/ui/TheSidebar.vue';

export default {
    name: 'Authenticated',
    components: { TheSidebar, TheHeader },
    computed: {
        currentPageTitle() {
            return this.$route.meta.title;
        },
    },
};
</script>

<style scoped>

</style>
