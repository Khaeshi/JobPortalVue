<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import DashboardRecentJob from '@/components/DashboardRecentJob.vue';
import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Briefcase, Users, TrendingUp, Building2 } from 'lucide-vue-next';
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

const recentJobs = ref<Job[]>([]);
const recentJobsLoading = ref(true);
const recentJobsError = ref<string | null>(null);

onMounted(async () => {
    try{
        const response = await axios.get('/api/dashboard-stats', { withCredentials: true });
        stats.value = response.data
    } catch(e){
        console.log(e, "Cannot fetch dashboard stats");
    }

    try {
        const jobsRes = await axios.get('/api/recent-jobs', { withCredentials: true });
        recentJobs.value = jobsRes.data;
    } catch (e) {
        recentJobsError.value = 'Failed to load recent jobs';
        console.log(e, "Cannot fetch recent jobs");
    } finally {
        recentJobsLoading.value = false;
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
            <div class="rounded-xl bg-gradient-to-r from-[var(--primary-600)] to-[var(--primary-700)] p-6 text-white">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome back {{ user.name.split(' ')[0] }}!</h1>
                <p class="mt-2 text-[var(--primary-100)] dark:text-primary-200">Here's what's happening with your job search today.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-black">Active Jobs</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-black">{{ stats.active_jobs }}</p>
                        </div>
                        <div class="rounded-lg bg-[var(--primary-100)] p-3">
                            <Briefcase class="h-6 w-6 text-[var(--primary-600)] dark:text-black" />
                        </div>
                    </div>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-black">Applications</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-black">{{ stats.applications }}</p>
                        </div>
                        <div class="rounded-lg bg-[var(--accent-100)] p-3">
                            <Users class="h-6 w-6 text-[var(--primary-600)] dark:text-black" />
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
                    <div v-if="recentJobsLoading" class="space-y-4">
                        <div class="grid p-4 rounded-lg border border-gray-100 gap-4 grid-cols-1 sm:grid-cols-[auto_1fr_auto] items-center animate-pulse">
                            <div class="w-12 h-12 bg-gray-200 rounded-lg"></div>
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                                <div class="h-3 bg-gray-200 rounded w-1/2"></div>
                            </div>
                            <div class="h-8 w-24 bg-gray-200 rounded"></div>
                        </div>
                    </div>
                    <div v-else-if="recentJobsError" class="text-red-600">{{ recentJobsError }}</div>
                    <div v-else-if="recentJobs.length === 0" class="text-gray-500">No recent jobs found</div>
                    <div v-else class="space-y-4">
                        <DashboardRecentJob v-for="job in recentJobs" :key="job.id" :job="job" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
