<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AppearanceTabs from '@/components/AppearanceTabs.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import { type BreadcrumbItem } from '@/types';
import { Monitor, Moon, Sun } from 'lucide-vue-next';

import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: t('settings.appearance.breadcrumbs.settings'),
        href: '/settings'
    },
    {
        title: t('settings.appearance.breadcrumbs.appearance_settings'),
        href: '/settings/appearance',
    },
];

const tabs = [
    { value: 'light', Icon: Sun, label: t('settings.appearance.tabs.light') },
    { value: 'dark', Icon: Moon, label: t('settings.appearance.tabs.dark') },
    { value: 'system', Icon: Monitor, label: t('settings.appearance.tabs.system') },
] as const;
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head :title="t('settings.appearance.title')" />

        <SettingsLayout>
            <div class="space-y-6">
                <HeadingSmall :title="t('settings.appearance.title')" :description="t('settings.appearance.description')" />
                <AppearanceTabs :tabs="tabs" />
            </div>
        </SettingsLayout>
    </AppLayout>
</template>
