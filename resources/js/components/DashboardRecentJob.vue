<script setup lang="ts">
import { Building2, MapPin, DollarSign } from 'lucide-vue-next';

interface Job {
    id: number;
    title: string;
    company: string;
    location: string;
    type: string;
    salary: string;
    status: string;
    created_at: string;
}

const { job } = defineProps<{ job: Job }>();
</script>

<template>
    <div
        class="grid p-4 rounded-lg border border-gray-100 hover:bg-gray-50 transition-colors gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-[auto_1fr_auto] items-center"
    >
        <div class="flex items-center gap-4 sm:gap-6 min-w-0 flex-1">
            <div class="w-12 h-12 bg-[var(--primary-100)] rounded-lg flex items-center justify-center">
                <Building2 class="h-6 w-6 text-[var(--primary-600)]" />
            </div>
            <div class="min-w-0">
                <h3 class="font-medium text-gray-900 dark:text-black">{{ job.title }}</h3>
                <p class="text-sm text-gray-600 dark:text-black">{{ job.company }}</p>
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1">
                    <span class="flex items-center text-xs text-gray-500">
                        <MapPin class="h-3 w-3 mr-1" />
                        {{ job.location }}
                    </span>
                    <span class="flex items-center text-xs text-gray-500">
                        <DollarSign class="h-3 w-3 mr-1" />
                        {{ job.salary }}
                    </span>
                    <span class="text-xs text-gray-500">
                        {{ job.type }}
                    </span>
                </div>
            </div>
        </div>
        <button
            class="px-4 py-2 bg-[var(--primary-600)] text-black rounded-lg hover:bg-[var(--primary-700)] transition-colors w-full sm:w-auto sm:justify-self-end"
        >
            Apply Now
        </button>
    </div>
</template>
