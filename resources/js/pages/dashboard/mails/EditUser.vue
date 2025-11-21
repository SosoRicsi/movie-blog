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
import { MailUser } from '@/types/mails';
import { ref } from 'vue';
import Checkbox from '@/components/ui/checkbox/Checkbox.vue';

const props = defineProps<{
    mail_user: MailUser,
    users: {
        id: number;
        name: string;
    }[]
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: "Dashboard",
        href: route('dashboard')
    },
    {
        title: "Emailek",
        href: route('mails.users.index')
    },
    {
        title: "Email felhasználó szerkesztése",
        href: route('mails.users.edit', {user: props.mail_user.id})
    }
];

const same_as_users = ref<boolean>(props.mail_user.sync_with_user_password);
</script>

<template>
    <Head title="E-mail felhasználó szerkesztés" />

    <AppLayout :breadcrumbs>
        <div class="md:w-6xl w-full mx-auto p-10 mt-12 bg-gray-50 rounded-lg">
            <Form method="put" :action="route('mails.users.update', {user: props.mail_user.id})" #default="{ errors }">
                <div class="my-5">
                    <Label class="text-base" for="local_part">Email</Label>
                    <Input id="local_part" name="local_part" type="text" placeholder="Email" :default-value="props.mail_user.local_part" />
                    <div v-if="errors['local_part']">{{ errors['local_part'] }}</div>
                </div>
                <div class="my-5">
                    <Label class="text-base" for="password">Jelszó</Label>
                    <div class="flex space-x-2 my-2">
                        <Checkbox id="same_as_users" v-model="same_as_users" name="same_as_users" value="1" />
                        <Label for="same_as_users">Egyenlő a csatolt felhasználó jelszavával.</Label>
                    </div>
                    <Input v-if="!same_as_users" id="password" name="password" type="password" placeholder="Jelszó" />
                    <div v-if="errors['password']">{{ errors['password'] }}</div>
                </div>
                <div class="my-5" v-if="!same_as_users">
                    <Label class="text-base" for="password_confirmation">Jelszó</Label>
                    <Input id="password_confirmation" name="password_confirmation" type="password" placeholder="Jelszó" />
                    <div v-if="errors['password_confirmation']">{{ errors['password_confirmation'] }}</div>
                </div>
                <div class="my-5">
                    <Label class="text-base" for="status">Csatolt felhasználó</Label>
                    <Select name="user_id" :default-value="props.mail_user.user?.id" required>
                        <SelectTrigger class="w-full">
                            <SelectValue placeholder="Válaszd ki, hogy melyik felhasználóé legyen ez a fiók. Ezt a lépést kihagyhatod." />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectItem v-for="{ id, name } in users" :key="id" :value="id">
                                    {{ name }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                    <div v-if="errors['user_id']">{{ errors['user_id'] }}</div>
                </div>
                <Button theme="dark-outline" type="submit" class="py-1.5!">Frissítés</Button>
            </Form>
        </div>
    </AppLayout>
</template>

<style scoped></style>
