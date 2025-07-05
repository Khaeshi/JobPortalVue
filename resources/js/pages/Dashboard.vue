<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Briefcase, Users, TrendingUp, Building2, MapPin, DollarSign } from 'lucide-vue-next';
import axios from 'axios';
import {ref, onMounted} from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage<SharedData>();
const user = page.props.auth.user;

const stats = ref({
    active_jobs:0,
    applications: 0,
    interviews: 0,
    saved_jobs: 0,
})

onMounted(async () => {
    try{
        const response = await axios.get('/api/dashboard-stats', { withCredentials: true });
        stats.value = response.data
    } catch(e){
        console.log(e, "Error on line 21");
    }
})

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-6 p-6">
            <!-- Welcome Section -->
            <div class="rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 p-6 text-white">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome back {{ user.name.split(' ')[0] }}!</h1>
                <p class="mt-2 text-primary-100 dark:text-primary-200">Here's what's happening with your job search today.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-black">Active Jobs</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-black">{{ stats.active_jobs }}</p>
                        </div>
                        <div class="rounded-lg bg-primary-100 p-3">
                            <Briefcase class="h-6 w-6 text-primary-600 dark:text-black" />
                        </div>
                    </div>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-black">Applications</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-black">{{ stats.applications }}</p>
                        </div>
                        <div class="rounded-lg bg-accent-100 p-3">
                            <Users class="h-6 w-6 text-primary-600 dark:text-black" />
                        </div>
                    </div>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-black">Interviews</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-black">{{ stats.interviews }}</p>
                        </div>
                        <div class="rounded-lg bg-green-100 p-3">
                            <TrendingUp class="h-6 w-6 text-green-600" />
                        </div>
                    </div>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-black">Saved Jobs</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-black">{{ stats.saved_jobs }}</p>
                        </div>
                        <div class="rounded-lg bg-purple-100 p-3">
                            <Building2 class="h-6 w-6 text-purple-600" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Jobs Section -->
            <div class="rounded-xl bg-white shadow-sm border border-gray-100">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-black">Recent Job Opportunities</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 rounded-lg border border-gray-100 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                                    <Building2 class="h-6 w-6 text-primary-600" />
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-black">Senior Frontend Developer</h3>
                                    <p class="text-sm text-gray-600 dark:text-black">TechCorp Inc.</p>
                                    <div class="flex items-center space-x-4 mt-1">
                                        <span class="flex items-center text-xs text-gray-500">
                                            <MapPin class="h-3 w-3 mr-1" />
                                            Remote
                                        </span>
                                        <span class="flex items-center text-xs text-gray-500">
                                            <DollarSign class="h-3 w-3 mr-1" />
                                            $80k - $120k
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-primary-600 text-black rounded-lg hover:bg-primary-700 transition-colors">
                                Apply Now
                            </button>
                        </div>

                        <div class="flex items-center justify-between p-4 rounded-lg border border-gray-100 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                                    <Building2 class="h-6 w-6 text-accent-600" />
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-black">Product Manager</h3>
                                    <p class="text-sm text-gray-600 dark:text-black">InnovateLabs</p>
                                    <div class="flex items-center space-x-4 mt-1">
                                        <span class="flex items-center text-xs text-gray-500">
                                            <MapPin class="h-3 w-3 mr-1" />
                                            San Francisco
                                        </span>
                                        <span class="flex items-center text-xs text-gray-500">
                                            <DollarSign class="h-3 w-3 mr-1" />
                                            $100k - $150k
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-accent-600 text-black rounded-lg hover:bg-accent-700 transition-colors">
                                Apply Now
                            </button>
                        </div>

                        <div class="flex items-center justify-between p-4 rounded-lg border border-gray-100 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <Building2 class="h-6 w-6 text-green-600" />
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-black">UX Designer</h3>
                                    <p class="text-sm text-gray-600 dark:text-black">DesignStudio</p>
                                    <div class="flex items-center space-x-4 mt-1">
                                        <span class="flex items-center text-xs text-gray-500">
                                            <MapPin class="h-3 w-3 mr-1" />
                                            New York
                                        </span>
                                        <span class="flex items-center text-xs text-gray-500">
                                            <DollarSign class="h-3 w-3 mr-1" />
                                            $70k - $110k
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-green-600 text-black rounded-lg hover:bg-green-700 transition-colors">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
