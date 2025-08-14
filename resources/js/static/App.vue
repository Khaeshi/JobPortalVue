<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router';
import AppLayout from '@/layouts/AppLayout.vue';
import { router } from './router';
</script>

<template>
    <AppLayout :breadcrumbs="[]">
        <nav class="container mx-auto p-4 flex gap-4 text-sm">
            <RouterLink to="/">Home</RouterLink>
            <RouterLink to="/dashboard">Dashboard</RouterLink>
            <RouterLink to="/jobs">Jobs</RouterLink>
            <RouterLink to="/jobs/create">Post Job</RouterLink>
        </nav>
        <div class="container mx-auto px-4 pb-10">
            <RouterView />
        </div>
    </AppLayout>
</template>

<script lang="ts">
import { defineComponent, getCurrentInstance } from 'vue';
export default defineComponent({
    name: 'StaticAppRoot',
    setup() {
        const app = getCurrentInstance()?.appContext.app;
        // Install router on this app instance
        // @ts-ignore
        app?.use(router);
        return {};
    },
});
</script>


