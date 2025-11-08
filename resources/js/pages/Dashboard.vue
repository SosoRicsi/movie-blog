<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps<{
    films_count: number;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex flex-wrap justify-between gap-4 md:grid-cols-3">
                <div class="border-1 border-gray-200 p-3 rounded-lg w-xs">
                    <span class="font-bold underline">Készülő filmek:</span> {{ films_count }}
                </div>
                <div class="border-1 border-gray-200 p-3 rounded-lg w-xs">a</div>
                <div class="border-1 border-gray-200 p-3 rounded-lg w-xs">a</div>
                <div class="border-1 border-gray-200 p-3 rounded-lg w-xs">a</div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>
