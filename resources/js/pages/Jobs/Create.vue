<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import draggable from 'vuedraggable';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Jobs', href: '/jobs' },
    { title: 'Post a Job', href: '/jobs/create' },
];

const form = useForm({
    title: '',
    company: '',
    type: '',
    location: '',
    salary: '',
    description: '',
    requirements: [''],
    benefits: [''],
    status: 'active',
});

const jobTypes = ['Full-time', 'Part-time', 'Contract', 'Internship', 'Remote'];

function addRequirement() {
    form.requirements.push('');
}
function removeRequirement(index: number) {
    if (form.requirements.length > 1) form.requirements.splice(index, 1);
}
function addBenefit() {
    form.benefits.push('');
}
function removeBenefit(index: number) {
    if (form.benefits.length > 1) form.benefits.splice(index, 1);
}
</script>

<template>
    <Head title="Post a Job" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col items-center justify-center bg-gray-50 dark:bg-gray-900 py-8">
            <div class="w-full max-w-2xl rounded-2xl bg-white dark:bg-gray-800 shadow-xl border border-gray-200 dark:border-gray-700 p-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Post a Job</h1>
                <form @submit.prevent="form.post('/jobs')" class="space-y-8">
                    <!-- Job Details Section -->
                    <div>
                        <h2 class="text-lg font-semibold text-primary-700 dark:text-primary-300 mb-4">Job Details</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Job Title</label>
                                <input v-model="form.title" type="text" class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition" required placeholder="e.g. Senior Developer" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Company</label>
                                <input v-model="form.company" type="text" class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition" required placeholder="e.g. TechCorp" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Job Type</label>
                                <select v-model="form.type" class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition" required>
                                    <option value="" disabled>Select type</option>
                                    <option v-for="type in jobTypes" :key="type" :value="type">{{ type }}</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Location</label>
                                <input v-model="form.location" type="text" class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition" required placeholder="e.g. Remote, New York" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Salary</label>
                                <input v-model="form.salary" type="text" class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition" required placeholder="e.g. $80k - $120k" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Status</label>
                                <select v-model="form.status" class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-6">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Description</label>
                            <textarea v-model="form.description" rows="4" class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition" required placeholder="Describe the role, responsibilities, and expectations..."></textarea>
                        </div>
                    </div>

                    <!-- Requirements & Benefits Section -->
                    <div>
                        <h2 class="text-lg font-semibold text-primary-700 dark:text-primary-300 mb-4">Requirements & Benefits</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Requirements -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Requirements</label>
                                <draggable v-model="form.requirements" item-key="index" class="space-y-3" :animation="200" ghost-class="drag-ghost" chosen-class="drag-chosen">
                                    <template #item="{ index }">
                                        <transition name="fade-move" mode="out-in">
                                            <div class="flex items-center gap-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm px-4 py-3" :key="index">
                                                <span class="cursor-move text-gray-400">&#x2630;</span>
                                                <input
                                                    v-model="form.requirements[index]"
                                                    type="text"
                                                    class="flex-1 bg-transparent border-none focus:ring-0 text-base"
                                                    :placeholder="`Requirement #${index + 1}`"
                                                />
                                                <button type="button" @click="removeRequirement(index)" class="text-red-500 hover:text-red-700 px-2" :disabled="form.requirements.length === 1">
                                                    &times;
                                                </button>
                                            </div>
                                        </transition>
                                    </template>
                                </draggable>
                                <button type="button" @click="addRequirement" class="mt-2 text-primary-600 hover:underline">
                                    + Add Requirement
                                </button>
                            </div>
                            <!-- Benefits -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Benefits</label>
                                <draggable v-model="form.benefits" item-key="index" class="space-y-3" :animation="200" ghost-class="drag-ghost" chosen-class="drag-chosen">
                                    <template #item="{ index }">
                                        <transition name="fade-move" mode="out-in">
                                            <div class="flex items-center gap-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm px-4 py-3" :key="index">
                                                <span class="cursor-move text-gray-400">&#x2630;</span>
                                                <input
                                                    v-model="form.benefits[index]"
                                                    type="text"
                                                    class="flex-1 bg-transparent border-none focus:ring-0 text-base"
                                                    :placeholder="`Benefit #${index + 1}`"
                                                />
                                                <button type="button" @click="removeBenefit(index)" class="text-red-500 hover:text-red-700 px-2" :disabled="form.benefits.length === 1">
                                                    &times;
                                                </button>
                                            </div>
                                        </transition>
                                    </template>
                                </draggable>
                                <button type="button" @click="addBenefit" class="mt-2 text-primary-600 hover:underline">
                                    + Add Benefit
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full rounded-xl bg-[var(--primary-600)] px-8 py-3 text-lg font-semibold text-white shadow hover:bg-[var(--primary-700)] transition-colors">
                        <span v-if="form.processing">Posting...</span>
                        <span v-else>Post Job</span>
                    </button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.fade-move-move {
  transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}
.drag-ghost {
  opacity: 0.5;
}
.drag-chosen {
  box-shadow: 0 4px 16px 0 rgba(0,0,0,0.10);
  background: #f3f4f6;
}
</style>


