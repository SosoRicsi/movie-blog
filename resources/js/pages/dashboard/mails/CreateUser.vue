<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import Input from '@/components/ui/input/Input.vue';
import Button from '@/components/Button.vue';
import Label from '@/components/ui/label/Label.vue';
import { Form } from '@inertiajs/vue3'
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select'
import { route } from '@/lib/routes';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: "Dashboard",
        href: route('dashboard')
    },
    {
        title: "Emailek",
        href: route('dashboard')
    },
    {
        title: "Felhasználó létrehozása",
        href: route('film.create')
    }
];

const props = defineProps<{
    domains: {
        id: number;
        name: string;
    }[]
}>();

</script>

<template>

    <Head title="Film feltöltése" />

    <AppLayout :breadcrumbs>
        <div class="md:w-6xl w-full mx-auto p-10 mt-12 bg-gray-50 rounded-lg">
            <Form method="post" :action="route('mails.users.store')" #default="{ errors }">
                <div class="my-5">
                    <Label class="text-base" for="local_part">Email</Label>
                    <Input id="local_part" name="local_part" type="text" placeholder="Email" />
                    <div v-if="errors['local_part']">{{ errors['local_part'] }}</div>
                </div>
                <div class="my-5">
                    <Label class="text-base" for="password">Jelszó</Label>
                    <Input id="password" name="password" type="password" placeholder="Jelszó" />
                    <div v-if="errors['password']">{{ errors['password'] }}</div>
                </div>
                <div class="my-5">
                    <Label class="text-base" for="status">Domain cím</Label>
                    <Select name="domain_id">
                        <SelectTrigger class="w-full">
                            <SelectValue placeholder="Válaszd ki, milyen szakaszban van a film." />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectItem v-for="{ id, name } in domains" :value="id">
                                    {{ name }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                    <div v-if="errors['domain']">{{ errors['domain'] }}</div>
                </div>
                <Button theme="dark-outline" type="submit" class="py-1!">Feltöltés</Button>
            </Form>
        </div>
    </AppLayout>
</template>

<style scoped></style>
