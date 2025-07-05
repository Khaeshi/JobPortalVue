<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'About',
        href: '/about',
    },
];
</script>

<template>
    <Head title="About Us" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-6 p-6">
            <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">About JobPortal</h1>
                <p class="text-gray-600 mb-4">
                    JobPortal is a modern platform connecting talented professionals with their dream careers.
                </p>
                <p class="text-gray-600">
                    We believe everyone deserves to find meaningful work that aligns with their skills and aspirations.
                </p>
            </div>
        </div>
    </AppLayout>
</template>
