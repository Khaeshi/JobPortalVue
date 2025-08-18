<script setup lang="ts">
import { Head, /*usePage */ } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { ref /*onMounted */} from 'vue';
//import axios from 'axios';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Companies',
        href: '/companies',
    },
];

//const companies = ref(usePage().props.companies);
/*
onMounted(async () => {
    const response = await axios.get('/api/companies');
    companies.value = response.data;
});
*/

const companies = ref([
    {
        id: 1,
        companyName: 'TechCorp Inc.',
        companyDescription: 'Leading technology company providing innovative software solutions for businesses worldwide.',
        companyLocation: 'San Francisco, CA',
        companyWebsite: 'https://www.techcorp.com',
        companyLogo: 'https://via.placeholder.com/80x80/3B82F6/FFFFFF?text=TC',
        companySize: 1000,
        companyIndustry: 'Technology',
    },
    {
        id: 2,
        companyName: 'GreenEnergy Solutions',
        companyDescription: 'Sustainable energy company focused on renewable power and environmental conservation.',
        companyLocation: 'Austin, TX',
        companyWebsite: 'https://www.greenenergy.com',
        companyLogo: 'https://via.placeholder.com/80x80/10B981/FFFFFF?text=GE',
        companySize: 500,
        companyIndustry: 'Energy',
    },
    {
        id: 3,
        companyName: 'HealthTech Innovations',
        companyDescription: 'Revolutionary healthcare technology company improving patient care through AI and machine learning.',
        companyLocation: 'Boston, MA',
        companyWebsite: 'https://www.healthtech.com',
        companyLogo: 'https://via.placeholder.com/80x80/EF4444/FFFFFF?text=HT',
        companySize: 750,
        companyIndustry: 'Healthcare',
    },
    {
        id: 4,
        companyName: 'FinanceFlow Systems',
        companyDescription: 'Modern financial technology company streamlining banking and payment solutions.',
        companyLocation: 'New York, NY',
        companyWebsite: 'https://www.financeflow.com',
        companyLogo: 'https://via.placeholder.com/80x80/8B5CF6/FFFFFF?text=FF',
        companySize: 1200,
        companyIndustry: 'Finance',
    },
    {
        id: 5,
        companyName: 'EduTech Pro',
        companyDescription: 'Educational technology company creating innovative learning platforms and tools.',
        companyLocation: 'Seattle, WA',
        companyWebsite: 'https://www.edutechpro.com',
        companyLogo: 'https://via.placeholder.com/80x80/F59E0B/FFFFFF?text=EP',
        companySize: 300,
        companyIndustry: 'Education',
    },
    {
        id: 6,
        companyName: 'Retail Solutions Co.',
        companyDescription: 'Retail technology company helping businesses optimize their e-commerce operations.',
        companyLocation: 'Chicago, IL',
        companyWebsite: 'https://www.retailsolutions.com',
        companyLogo: 'https://via.placeholder.com/80x80/06B6D4/FFFFFF?text=RS',
        companySize: 800,
        companyIndustry: 'Retail',
    }
]);

</script>

<template>
    <Head title="Companies" />
    <AppLayout :breadcrumbs="breadcrumbs">

            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Companies</h1>
                <p class="text-gray-600">Explore top companies hiring on JobPortal.</p>

                <div v-if="!companies || companies.length === 0" class="mt-6 p-8 text-center text-gray-500">
                    <p>No data found</p>
                </div>

                <div v-else>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div v-for="company in companies" :key="company.id" class="bg-gray-50 rounded-xl shadow-sm p-4">
                            <img :src="company.companyLogo" :alt="company.companyName" class="w-20 h-20 object-contain mx-auto mb-2">
                            <h2 class="text-lg font-semibold text-gray-800 text-center">{{ company.companyName }}</h2>
                            <p class="text-gray-600 text-sm text-center">{{ company.companyDescription }}</p>
                            <p class="text-gray-500 text-xs mt-2 text-center">Location: {{ company.companyLocation }}</p>
                            <p class="text-gray-500 text-xs text-center">Size: {{ company.companySize }}</p>
                            <p class="text-gray-500 text-xs text-center">Industry: {{ company.companyIndustry }}</p>
                            <a :href="company.companyWebsite" target="_blank" class="block mt-4 text-blue-500 hover:text-blue-700 text-center text-sm">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>

    </AppLayout>
</template>
