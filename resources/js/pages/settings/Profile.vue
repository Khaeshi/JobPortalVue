<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useInitials } from '@/composables/useInitials';
import axios from 'axios';
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar';

import DeleteUser from '@/components/DeleteUser.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { type BreadcrumbItem, type SharedData, type User } from '@/types';

interface Props {
    mustVerifyEmail: boolean;
    status?: string;
}

defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Profile settings',
        href: '/settings/profile',
    },
];

const page = usePage<SharedData>();
const user = page.props.auth.user as User;

const form = useForm({
    name: user.name,
    email: user.email,
    avatar: '',
});

const avatarInput = ref<HTMLInputElement | null>(null);
const avatarPreview = ref<string | null>(null);

const { getInitials } = useInitials();

function triggerAvatarInput() {
    avatarInput.value?.click();
}

function handleAvatarChange(event: Event) {
    const file = (event.target as HTMLInputElement).files?.[0];
    if (file) {
        avatarPreview.value = URL.createObjectURL(file);
        const formData = new FormData();
        formData.append('avatar', file);
        axios.post('/api/user/avatar', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
            withCredentials: true,
        })
        .then(response => {
            user.profile_photo_url = response.data.avatar_url;
            avatarPreview.value = null;
        })
        .catch(error => {
            form.errors.avatar = error.response?.data?.message || 'Failed to upload avatar.';
        });
    }
}

const submit = () => {
    form.patch(route('profile.update'), {
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Profile settings" />

        <SettingsLayout>
            <div class="flex flex-col space-y-6">
                <HeadingSmall title="Profile information" description="Update your profile information and avatar" />

                <form @submit.prevent="submit" class="space-y-6">
                    <div class="flex items-center gap-6">
                        <div class="relative cursor-pointer" @click="triggerAvatarInput">
                            <Avatar class="h-24 w-24 overflow-hidden rounded-lg">
                                <AvatarImage
                                    v-if="avatarPreview || user.profile_photo_url"
                                    :key="(user.profile_photo_url || '') + Date.now()"
                                    :src="avatarPreview || (user.profile_photo_url + '?t=' + Date.now())"
                                    :alt="user.name"
                                />
                                <AvatarFallback class="rounded-lg text-2xl text-black dark:text-white">
                                    {{ getInitials(user.name) }}
                                </AvatarFallback>
                            </Avatar>
                            <input
                                ref="avatarInput"
                                type="file"
                                accept="image/*"
                                class="absolute inset-0 cursor-pointer opacity-0"
                                @change="handleAvatarChange"
                                style="display: none"
                            />
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-muted-foreground">
                                Click on the avatar to upload a new one. We recommend using a square image for best results.
                            </p>
                            <InputError class="mt-2" :message="form.errors.avatar" />
                        </div>
                    </div>

                    <div class="grid gap-2">
                        <Label for="name">Name</Label>
                        <Input id="name" class="mt-1 block w-full" v-model="form.name" required autocomplete="name" placeholder="Full name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="email">Email address</Label>
                        <Input
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autocomplete="username"
                            placeholder="Email address"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div v-if="mustVerifyEmail && !user.email_verified_at">
                        <p class="-mt-4 text-sm text-muted-foreground">
                            Your email address is unverified.
                            <Link
                                :href="route('verification.send')"
                                method="post"
                                as="button"
                                class="text-foreground underline decoration-neutral-300 underline-offset-4 transition-colors duration-300 ease-out hover:decoration-current! dark:decoration-neutral-500"
                            >
                                Click here to resend the verification email.
                            </Link>
                        </p>

                        <div v-if="status === 'verification-link-sent'" class="mt-2 text-sm font-medium text-green-600">
                            A new verification link has been sent to your email address.
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <Button :disabled="form.processing">Save</Button>

                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                            <p v-show="form.recentlySuccessful" class="text-sm text-neutral-600">Saved!</p>
                        </Transition>
                    </div>
                </form>
            </div>

            <DeleteUser />
        </SettingsLayout>
    </AppLayout>
</template>
