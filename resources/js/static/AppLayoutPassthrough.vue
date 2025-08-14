<script setup lang="ts">
import type { BreadcrumbItemType } from '@/types';

withDefaults(defineProps<{ breadcrumbs?: BreadcrumbItemType[] }>(), {
  breadcrumbs: () => [],
});
</script>

<template>
  <slot />
  <!-- Passthrough layout used in static build to avoid double-wrapping -->
</template>


