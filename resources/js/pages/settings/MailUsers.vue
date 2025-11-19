<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';

import DeleteUser from '@/components/DeleteUser.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { type BreadcrumbItem, type SharedData, type User } from '@/types';
import { useI18n } from 'vue-i18n';
import { route } from '@/lib/routes';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableFooter,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table'
import { MailUser } from '@/types/mails';

const { t } = useI18n();

interface Props {
    mail_users: MailUser[]
}

defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: t('settings.profile.breadcrumbs.settings'),
        href: '/settings',
    },
    {
        title: 'Mail felhasználóim',
        href: route('user.mail_users'),
    },
];

const page = usePage<SharedData>();
const user = page.props.auth.user as User;
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head :title="t('settings.profile.title')" />

        <SettingsLayout>
            <div class="flex flex-col space-y-6">
                <HeadingSmall title="A hozzám tartozó email címek."
                    description="Itt láthatod a fiókodhoz csatolt <strong>@silentwords.eu</strong> végződésű email címeket. A jelszavuk megegyezik a fiókod jelszavával." />

                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[100px]">
                                Név
                            </TableHead>
                            <TableHead>Teljes email</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="mail_user in mail_users" :key="mail_user.id">
                            <TableCell class="font-medium">
                                {{ mail_user.local_part }}
                            </TableCell>
                            <TableCell>{{ mail_user.local_part + "@" + mail_user.domain.name }}</TableCell>
                        </TableRow>
                    </TableBody>

                </Table>
            </div>
        </SettingsLayout>
    </AppLayout>
</template>
