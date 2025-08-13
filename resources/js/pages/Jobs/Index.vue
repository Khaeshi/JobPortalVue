<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { ref } from 'vue';
import { Building2, MapPin, Clock, Briefcase, Calendar, GraduationCap, X } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Jobs',
        href: '/jobs',
    },
];

interface Job {
  id: number;
  title: string;
  type: string;
  company: string;
  location: string;
  posted: string;
  salary: string;
  description?: string;
  requirements?: string[];
  benefits?: { value: string }[];
  status: string;
  // ...other fields
}

const { jobs } = defineProps<{ jobs: Job[] }>();

// Job details modal state
const selectedJob = ref<Job | null>(null);
const isModalOpen = ref(false);

const openJobDetails = (job: Job) => {
    selectedJob.value = job;
    isModalOpen.value = true;
};

const closeJobDetails = () => {
    isModalOpen.value = false;
    setTimeout(() => {
        selectedJob.value = null;
    }, 200);
};

</script>

<template>
    <Head title="Jobs" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <!-- Stats Grid -->
            <div class="grid auto-rows-min gap-4 md:grid-cols-4">
                <!-- ... Previous stats panes code ... -->
            </div>

            <!-- Recent Jobs Section -->
            <div class="relative flex-1 rounded-xl border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-800">
                <h2 class="mb-4 text-xl font-semibold">Recent Job Listings</h2>
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="job in jobs"
                        :key="job.id"
                        class="rounded-xl border border-gray-200 p-4 transition-all hover:shadow-lg dark:border-gray-700 dark:hover:border-gray-600"
                    >
                        <div class="mb-3 flex items-start justify-between">
                            <h3 class="font-semibold text-lg">{{ job.title }}</h3>
                            <span class="rounded-full bg-blue-100 px-3 py-1 text-sm text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                {{ job.type }}
                            </span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                <Building2 class="h-4 w-4" />
                                <span>{{ job.company }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                <MapPin class="h-4 w-4" />
                                <span>{{ job.location }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                <Clock class="h-4 w-4" />
                                <span>{{ job.posted }}</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="font-medium text-green-600 dark:text-green-400">{{ job.salary || 'N/A' }}</p>
                        </div>
                        <button
                            @click="openJobDetails(job)"
                            class="mt-4 w-full rounded-lg bg-blue-600 px-4 py-2 text-white transition-colors hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600"
                        >
                            View Details
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Details Modal -->
        <Transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="transform opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition duration-200 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="transform opacity-0"
        >
            <div
                v-if="isModalOpen"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
                @click.self="closeJobDetails"
            >
                <div
                    class="max-h-[90vh] w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-6 shadow-xl dark:bg-gray-800"
                >
                    <div class="mb-6 flex items-start justify-between">
                        <div>
                            <h2 class="text-2xl font-bold">{{ selectedJob?.title }}</h2>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">{{ selectedJob?.company }}</p>
                        </div>
                        <button
                            @click="closeJobDetails"
                            class="rounded-lg p-1 hover:bg-gray-100 dark:hover:bg-gray-700"
                        >
                            <X class="h-6 w-6" />
                        </button>
                    </div>

                    <div class="space-y-6">
                        <!-- Job Overview -->
                        <div class="grid gap-4 rounded-lg bg-gray-50 p-4 dark:bg-gray-700/50 md:grid-cols-2">
                            <div class="flex items-center gap-3">
                                <MapPin class="h-5 w-5 text-gray-400" />
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Location</p>
                                    <p class="font-medium">{{ selectedJob?.location }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <Briefcase class="h-5 w-5 text-gray-400" />
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Job Type</p>
                                    <p class="font-medium">{{ selectedJob?.type }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <Calendar class="h-5 w-5 text-gray-400" />
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Posted</p>
                                    <p class="font-medium">{{ selectedJob?.posted }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <GraduationCap class="h-5 w-5 text-gray-400" />
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Salary Range</p>
                                    <p class="font-medium">{{ selectedJob?.salary }}</p>
                                </div>
                            </div>
                            <div>
                                <span class="font-semibold">Status:</span>
                                <span v-if="selectedJob && selectedJob.status" :class="selectedJob.status === 'active' ? 'text-green-500' : 'text-red-500'">
                                    {{ selectedJob?.status }}
                                </span>
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div>
                            <h3 class="mb-2 text-lg font-semibold">Job Description</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ selectedJob?.description }}</p>
                        </div>

                        <!-- Requirements -->
                        <div>
                            <h3 class="mb-2 text-lg font-semibold">Requirements</h3>
                            <ul v-if="selectedJob?.requirements && selectedJob.requirements.length" class="list-inside list-disc space-y-1 text-gray-600 dark:text-gray-400">
                                <li v-for="(req, index) in selectedJob.requirements" :key="index">
                                    {{ req }}
                                </li>
                            </ul>
                            <p v-else class="text-gray-400">No requirements listed.</p>
                        </div>

                        <!-- Benefits -->
                        <div>
                            <h3 class="mb-2 text-lg font-semibold">Benefits</h3>
                            <ul v-if="selectedJob?.benefits && selectedJob.benefits.length" class="list-inside list-disc space-y-1 text-gray-600 dark:text-gray-400">
                                <li v-for="(benefit, index) in selectedJob.benefits" :key="index">
                                    {{ benefit }}
                                </li>
                            </ul>
                            <p v-else class="text-gray-400">No benefits listed.</p>
                        </div>

                        <!-- Apply Button -->
                        <button class="w-full rounded-lg bg-blue-600 px-6 py-3 text-white transition-colors hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600">
                            Apply for this Position

                        </button>
                    </div>
                </div>
            </div>
        </Transition>
    </AppLayout>
</template>
