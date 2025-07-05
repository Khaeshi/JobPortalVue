<script setup lang="ts">
import { Head, Link, usePage } from '@inertiajs/vue3';
import {
    Briefcase,
    Users,
    Building2,
    Search,
    CheckCircle2,
    Facebook,
    Instagram,
    Linkedin,
    Twitter,
    Youtube,
    Mail
} from 'lucide-vue-next';
import GuestLayout from '@/layouts/GuestLayout.vue';

const page = usePage() as any;

const features = [
    {
        icon: Briefcase,
        title: 'Job Listings',
        description: 'Access thousands of job opportunities across various industries'
    },
    {
        icon: Search,
        title: 'Smart Search',
        description: 'Find the perfect job match with our advanced filtering system'
    },
    {
        icon: Building2,
        title: 'Top Companies',
        description: 'Connect with leading companies looking for talent'
    },
    {
        icon: Users,
        title: 'Career Network',
        description: 'Build professional relationships and grow your network'
    }
];

const benefits = [
    'Easy application process',
    'Real-time job alerts',
    'Professional profile builder',
    'Direct employer contact',
    'Career resources and guides',
    'Mobile-friendly platform'
];

const socialLinks = [
    {
        name: 'LinkedIn',
        url: 'https://linkedin.com/YOUR_PROFILE',
        icon: Linkedin,
        color: 'hover:text-primary-500'
    },
    {
        name: 'Instagram',
        url: 'https://instagram.com/YOUR_PROFILE',
        icon: Instagram,
        color: 'hover:text-accent-500'
    },
    {
        name: 'Facebook',
        url: 'https://facebook.com/YOUR_PROFILE',
        icon: Facebook,
        color: 'hover:text-primary-600'
    },
    {
        name: 'Twitter',
        url: 'https://twitter.com/YOUR_PROFILE',
        icon: Twitter,
        color: 'hover:text-primary-400'
    },
    {
        name: 'YouTube',
        url: 'https://youtube.com/YOUR_CHANNEL',
        icon: Youtube,
        color: 'hover:text-red-500'
    },
    {
        name: 'Email',
        url: 'mailto:your.email@example.com',
        icon: Mail,
        color: 'hover:text-accent-600'
    }
];

</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
      <div class="min-h-screen bg-gradient-to-b from-primary-50 to-primary-100 dark:from-gray-900 dark:to-gray-800">
        <!-- Navigation -->
        <nav class="fixed top-0 z-50 w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm border-b border-primary-100 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <Link href="/" class="text-2xl font-bold text-primary-700 dark:text-primary-200">
                            JobPortal
                        </Link>
                    </div>
                    <div class="flex items-center space-x-4">
                        <Link
                            v-if="page.props.auth.user"
                            :href="route('dashboard')"
                            class="text-primary-700 dark:text-primary-200 hover:text-primary-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                        >
                            Dashboard
                        </Link>
                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="text-primary-700 dark:text-primary-200 hover:text-primary-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                            >
                                Log in
                            </Link>
                            <Link
                                :href="route('register')"
                                class="bg-primary-600 text-white hover:bg-primary-700 px-4 py-2 rounded-md text-sm font-medium shadow"
                            >
                                Get Started
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="pt-32 pb-20 text-center px-4 bg-gradient-to-b from-primary-100 to-primary-50 dark:from-gray-900 dark:to-gray-800">
            <h1 class="text-5xl font-bold text-primary-800 dark:text-white mb-6">
                Find Your Dream Job Today
            </h1>
            <p class="text-xl text-primary-600 dark:text-primary-100 mb-8 max-w-2xl mx-auto">
                Connect with top employers and discover opportunities that match your skills and aspirations.
            </p>
            <div class="flex justify-center gap-4">
                <Link
                    :href="route('register')"
                    class="bg-primary-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-primary-700 transition-colors shadow"
                    v-if="!page.props.auth.user"
                >
                    Start Your Journey
                </Link>
                <!-- For authenticated users, show dashboard button -->
                <Link
                    v-if="page.props.auth.user"
                    :href="route('dashboard')"
                    class="bg-primary-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-primary-700 transition-colors shadow"
                >
                    Go to Dashboard
                </Link>
                <!-- Conditional link for Browse Jobs -->
                <Link
                    :href="page.props.auth.user ? route('jobportal') : route('login')"
                    class="bg-accent-500 text-white px-6 py-3 rounded-lg text-lg font-semibold border border-accent-600 hover:bg-accent-600 transition-colors shadow"
                >
                    Browse Jobs
                </Link>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-20 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12 text-primary-800 dark:text-white">Why Choose Us</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div
                        v-for="feature in features"
                        :key="feature.title"
                        class="bg-primary-50 dark:bg-gray-700 p-6 rounded-xl hover:bg-primary-100 dark:hover:bg-gray-600 transition-colors shadow"
                    >
                        <component
                            :is="feature.icon"
                            class="w-12 h-12 text-primary-500 mb-4"
                        />
                        <h3 class="text-xl font-semibold mb-2 text-primary-800 dark:text-white">{{ feature.title }}</h3>
                        <p class="text-primary-600 dark:text-primary-100">{{ feature.description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="py-20 bg-primary-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12 text-primary-800 dark:text-white">Platform Benefits</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div
                        v-for="benefit in benefits"
                        :key="benefit"
                        class="flex items-center space-x-3 p-4 bg-white dark:bg-gray-800 rounded-lg border border-primary-100 dark:border-gray-700 shadow"
                    >
                        <CheckCircle2 class="w-6 h-6 text-green-500" />
                        <span class="text-primary-700 dark:text-primary-100">{{ benefit }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="py-20 bg-gradient-to-r from-primary-600 to-accent-500">
            <div class="max-w-4xl mx-auto text-center px-4">
                <h2 class="text-3xl font-bold mb-6 text-white">Ready to Take the Next Step?</h2>
                <p class="text-lg mb-8 text-white/90">
                    Join thousands of professionals who have found their perfect career match through our platform.
                </p>
                <Link
                    :href="route('register')"
                    class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-primary-50 transition-colors shadow"
                >
                    Create Your Account
                </Link>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-primary-900 dark:bg-gray-900 text-primary-100 dark:text-gray-400 py-12 border-t border-primary-800 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">JobPortal</h3>
                        <p class="text-sm">
                            Connecting talented professionals with their dream careers.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-sm">
                            <li><Link href="/about" class="hover:text-white transition-colors">About Us</Link></li>
                            <li><Link href="/contact" class="hover:text-white transition-colors">Contact</Link></li>
                            <li><Link href="/help" class="hover:text-white transition-colors">Help Center</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-4">Legal</h4>
                        <ul class="space-y-2 text-sm">
                            <li><Link href="/privacy" class="hover:text-white transition-colors">Privacy Policy</Link></li>
                            <li><Link href="/terms" class="hover:text-white transition-colors">Terms of Service</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-4">Follow Us</h4>
                        <div class="flex space-x-4">
                            <a
                                v-for="social in socialLinks"
                                :key="social.name"
                                :href="social.url"
                                :title="social.name"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-primary-100 dark:text-gray-400 transition-colors duration-200"
                                :class="social.color"
                            >
                                <component
                                    :is="social.icon"
                                    class="w-6 h-6"
                                />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-primary-800 dark:border-gray-800 text-sm text-center">
                    <p>&copy; {{ new Date().getFullYear() }} JobPortal all rights reserved. Created by Khaesey Angel Tablante.</p>
                </div>
            </div>
        </footer>
      </div>
    </GuestLayout>
</template>
