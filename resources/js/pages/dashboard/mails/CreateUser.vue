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
import Checkbox from '@/components/ui/checkbox/Checkbox.vue';
import { ref } from 'vue';

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
    }[];
    users: {
        id: number;
        name: string;
    }[]
}>();

const same_as_users = ref<boolean>(true);
</script>

<template>

    <Head title="Film feltöltése" />

    <AppLayout :breadcrumbs>
        <div class="md:w-6xl w-full mx-auto p-10 mt-12 bg-gray-50 rounded-lg">
            <Form method="post" :action="route('mails.users.store')" #default="{ errors }">
                <div class="my-5">
                    <Label class="text-base" for="local_part">Email</Label>
                    <Input id="local_part" name="local_part" type="text" placeholder="Email" required />
                    <div v-if="errors['local_part']">{{ errors['local_part'] }}</div>
                </div>
                <div class="my-5">
                    <Label class="text-base" for="password">Jelszó</Label>
                    <div class="flex space-x-2 my-2">
                        <Checkbox id="same_as_users" v-model="same_as_users" name="same_as_users" value="1" />
                        <Label for="same_as_users">Egyenlő a csatolt felhasználó jelszavával.</Label>
                    </div>
                    <Input v-if="!same_as_users" id="password" name="password" type="password" placeholder="Jelszó" required />
                    <div v-if="errors['password']">{{ errors['password'] }}</div>
                </div>
                <div class="my-5" v-if="!same_as_users">
                    <Label class="text-base" for="password_confirmation">Jelszó újra</Label>
                    <Input id="password_confirmation" name="password_confirmation" type="password" placeholder="Jelszó újra" />
                    <div v-if="errors['password_confirmation']">{{ errors['password_confirmation'] }}</div>
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
                    <div v-if="errors['domain_id']">{{ errors['domain_id'] }}</div>
                </div>
                <div class="my-5">
                    <Label class="text-base" for="status">Csatolt felhasználó</Label>
                    <Select name="user_id">
                        <SelectTrigger class="w-full">
                            <SelectValue placeholder="Válaszd ki, hogy melyik felhasználóé legyen ez a fiók. Ezt a lépést kihagyhatod." />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectItem v-for="{ id, name } in users" :value="id">
                                    {{ name }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                    <div v-if="errors['user_id']">{{ errors['user_id'] }}</div>
                </div>
                <Button theme="dark-outline" type="submit" class="py-1!">Létrehozás</Button>
            </Form>
        </div>
    </AppLayout>
</template>

<style scoped></style>
