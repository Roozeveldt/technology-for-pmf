<template>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <router-link :to="{ name: 'dashboard' }" class="nav-link">Главная</router-link>
                </li>
                ТЕХНОЛОГ
                <li class="nav-item">
                    <router-link :to="{ name: 'technolog.plan.index' }" class="nav-link">Планирование по линиям</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'technolog.plan.create' }" class="nav-link">Создать новый план</router-link>
                </li>
                СПРАВОЧНИКИ
                <li class="nav-item">
                    <router-link :to="{ name: 'employee.index' }" class="nav-link">Сотрудники</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'line.index' }" class="nav-link">Линии</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'brand.index' }" class="nav-link">Бренды</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'format.index' }" class="nav-link">Форматы</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'package.index' }" class="nav-link">Упаковка</router-link>
                </li>
                <li class="nav-item">
                    <a @click.prevent="logout" href="#" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'TheSidebar',

    methods: {
        logout() {
            axios.post('/logout').then((response) => {
                localStorage.removeItem('x_xsrf_token');
                this.$router.push({ name: 'login' });
            });
        },
    },
};
</script>

<style scoped>
.sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 100; /* Behind the navbar */
    padding: 48px 0 0; /* Height of navbar */
    box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

.sidebar-sticky {
    height: calc(100vh - 48px);
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

.sidebar .nav-link {
    font-weight: 700;
    color: #333;
}

.sidebar .nav-link.active {
    color: #2470dc;
}
</style>
