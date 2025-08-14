import { createRouter, createWebHashHistory } from 'vue-router';
import StaticDemo from '@/components/StaticDemo.vue';
import Dashboard from '@/pages/Dashboard.vue';
import JobsIndex from '@/pages/Jobs/Index.vue';
import JobsCreate from '@/pages/Jobs/Create.vue';

const mockJobs = [
    {
        id: 1,
        title: 'Senior Frontend Developer',
        type: 'Full-time',
        company: 'TechCorp Inc.',
        location: 'Remote',
        posted: '2 days ago',
        salary: '$80k - $120k',
        description: 'Build and maintain modern frontend applications.',
        requirements: ['5+ years experience', 'Vue 3', 'TypeScript'],
        benefits: [{ value: 'Health insurance' }, { value: 'Remote stipend' }],
        status: 'active',
    },
];

export const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        { path: '/', component: StaticDemo },
        { path: '/dashboard', component: Dashboard },
        { path: '/jobs', component: JobsIndex, props: { jobs: mockJobs } },
        { path: '/jobs/create', component: JobsCreate },
    ],
});


