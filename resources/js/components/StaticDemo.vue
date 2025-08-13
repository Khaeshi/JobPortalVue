<template>
    <div class="min-h-screen bg-background text-foreground">
        <!-- Header -->
        <header class="border-b border-border bg-card">
            <div class="container mx-auto px-4 py-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-primary-600">JobPortal Demo</h1>

                    <!-- Profile Dropdown -->
                    <DropdownMenu>
                        <DropdownMenuTrigger :as-child="true">
                            <Button
                                variant="ghost"
                                size="icon"
                                class="relative size-10 w-auto rounded-full p-1 focus-within:ring-2 focus-within:ring-primary"
                            >
                                <Avatar class="size-8 overflow-hidden rounded-full">
                                    <AvatarFallback class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white">
                                        {{ getInitials(mockUser.name) }}
                                    </AvatarFallback>
                                </Avatar>
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end" class="w-56">
                            <UserMenuContent :user="mockUser" />
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <div class="max-w-4xl mx-auto space-y-8">
                <!-- Profile Modal Demo Section -->
                <section class="space-y-4">
                    <h2 class="text-3xl font-bold">Profile Modal Demo</h2>
                    <p class="text-muted-foreground">
                        This demonstrates the fixed profile modal styling after updating to Tailwind CSS 4.
                    </p>

                    <!-- Interactive Demo -->
                    <div class="flex items-center gap-4 p-6 bg-card rounded-lg border">
                        <span class="text-sm text-muted-foreground">Click the profile button above to see the modal</span>
                    </div>
                </section>

                <!-- Color System Demo -->
                <section class="space-y-4">
                    <h2 class="text-3xl font-bold">Color System</h2>
                    <p class="text-muted-foreground">
                        Showcasing the color variables defined in CSS for Tailwind CSS 4.
                    </p>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="space-y-2">
                            <div class="h-20 bg-primary-600 rounded-lg"></div>
                            <p class="text-sm font-medium">Primary 600</p>
                        </div>
                        <div class="space-y-2">
                            <div class="h-20 bg-accent-500 rounded-lg"></div>
                            <p class="text-sm font-medium">Accent 500</p>
                        </div>
                        <div class="space-y-2">
                            <div class="h-20 bg-muted rounded-lg"></div>
                            <p class="text-sm font-medium">Muted</p>
                        </div>
                        <div class="space-y-2">
                            <div class="h-20 bg-popover rounded-lg border"></div>
                            <p class="text-sm font-medium">Popover</p>
                        </div>
                    </div>
                </section>

                <!-- Component Showcase -->
                <section class="space-y-4">
                    <h2 class="text-3xl font-bold">Component Showcase</h2>
                    <p class="text-muted-foreground">
                        Various UI components using the new color system.
                    </p>

                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <Button variant="default">Default Button</Button>
                            <Button variant="outline">Outline Button</Button>
                            <Button variant="secondary">Secondary Button</Button>
                            <Button variant="ghost">Ghost Button</Button>
                        </div>

                        <div class="flex gap-4">
                            <Button variant="destructive">Destructive Button</Button>
                            <Button variant="link">Link Button</Button>
                        </div>
                    </div>
                </section>

                <!-- Dark Mode Toggle -->
                <section class="space-y-4">
                    <h2 class="text-3xl font-bold">Dark Mode</h2>
                    <p class="text-muted-foreground">
                        Test the dark mode color scheme.
                    </p>

                    <Button @click="toggleDarkMode" variant="outline">
                        {{ isDark ? 'Switch to Light' : 'Switch to Dark' }}
                    </Button>
                </section>
            </div>
        </main>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Button } from '@/components/ui/button';
import { Avatar, AvatarFallback } from '@/components/ui/avatar';
import { DropdownMenu, DropdownMenuContent, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import UserMenuContent from './UserMenuContent.vue';

// Mock user data for demo
const mockUser = {
    name: 'John Doe',
    email: 'john.doe@example.com',
    profile_photo_url: null,
    avatar: null,
};

// Dark mode state
const isDark = ref(false);

// Toggle dark mode
const toggleDarkMode = () => {
    isDark.value = !isDark.value;
    if (isDark.value) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
};

// Get user initials
const getInitials = (name: string) => {
    return name
        .split(' ')
        .map(n => n[0])
        .join('')
        .toUpperCase()
        .slice(0, 2);
};
</script>
