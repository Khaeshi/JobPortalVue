<script setup lang="ts">
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { useInitials } from '@/composables/useInitials';
import type { User } from '@/types';
//import { computed } from 'vue';



interface Props {
    user: User;
    showEmail?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    showEmail: false,
});

const { getInitials } = useInitials();

// Compute whether we should show the avatar image --> uncomment import computed
//const showAvatar = computed(() => user.avatar && user.avatar !== '');

</script>

<template>
    <Avatar class="h-8 w-8 overflow-hidden rounded-lg">
        <AvatarImage
            v-if="props.user.profile_photo_url"
            :key="(props.user.profile_photo_url || '') + Date.now()"
            :src="props.user.profile_photo_url + '?t=' + Date.now()"
            :alt="props.user.name"
        />
        <AvatarFallback class="rounded-lg text-black dark:text-white">
            {{ getInitials(props.user.name) }}
        </AvatarFallback>
    </Avatar>

    <div class="grid flex-1 text-left text-sm leading-tight">
        <span class="truncate font-medium">{{ props.user.name }}</span>
        <span v-if="props.showEmail" class="truncate text-xs text-muted-foreground">{{ props.user.email }}</span>
    </div>
</template>
