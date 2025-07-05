<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Jobs',
        href: '/jobs',
    },
];
</script>

<template>
    <Head title="Jobs" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-6 p-6">
            <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Job Listings</h1>
                <p class="text-gray-600">Find your next career opportunity from thousands of job postings.</p>
                <!-- Job listings will go here -->
                <div class="mt-6 p-8 text-center text-gray-500">
                    <p>Job listings coming soon...</p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
