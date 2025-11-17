<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { SharedData, type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps<{
    films_count: number;
}>();

const page = usePage<SharedData>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="bg-gray-50 p-3 rounded-lg" v-if="page.props.flash.error || page.props.flash.success">
                {{ page.props.flash.error ? t(page.props.flash.error) : null }}
                {{ page.props.flash.success ? t(page.props.flash.success) : null }}
            </div>
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
