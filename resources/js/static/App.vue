<script setup lang="ts">
// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-ignore - types are available at runtime, CI may not resolve dts here
import { RouterView } from 'vue-router';
import AppLayout from '@/layouts/AppLayout.vue';
</script>

<template>
    <AppLayout :breadcrumbs="[]">
        <div class="container mx-auto px-4 pb-10">
            <RouterView />
        </div>
    </AppLayout>
</template>



