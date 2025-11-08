<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import Input from '@/components/ui/input/Input.vue';
import Button from '@/components/Button.vue';
import Label from '@/components/ui/label/Label.vue';
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select'
import {
    NumberField,
    NumberFieldContent,
    NumberFieldDecrement,
    NumberFieldIncrement,
    NumberFieldInput,
} from '@/components/ui/number-field'
import { route } from '@/lib/routes';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: "Dashboard",
        href: route('dashboard')
    },
    {
        title: "Filmek",
        href: route('dashboard')
    },
    {
        title: "Film létrehozás",
        href: route('film.create')
    }
];

const props = defineProps<{
    available_statuses: {
        status: string;
        color: string;
    }[];
    available_languages: string[];
}>();

const { t } = useI18n();

</script>

<template>

    <Head title="Film feltöltése" />

    <AppLayout :breadcrumbs>
        <div class="md:w-6xl w-full mx-auto p-10 mt-12 bg-gray-50 rounded-lg">
            <!-- title -->
            <!-- status -->
            <!-- cover -->
            <!-- primary_language -->
            <!-- year -->
            <div class="my-5">
                <Label class="text-base" for="title">Film címe</Label>
                <Input id="title" name="title" type="text" placeholder="Film címe" />
            </div>
            <div class="my-5">
                <Label class="text-base" for="status">Film állapota</Label>
                <Select>
                    <SelectTrigger class="w-full">
                        <SelectValue placeholder="Válaszd ki, milyen szakaszban van a film." />
                    </SelectTrigger>
                    <SelectContent>
                        <SelectGroup>
                            <SelectItem v-for="{ status } in available_statuses" :value="status">
                                {{ t('film.statuses.'+status) }}
                            </SelectItem>
                        </SelectGroup>
                    </SelectContent>
                </Select>
            </div>
            <div class="my-5">
                <Label class="text-base" for="status">Film eredetinyelve</Label>
                <Select>
                    <SelectTrigger class="w-full">
                        <SelectValue placeholder="Válaszd ki, melyik a fő eredeti nyelve." />
                    </SelectTrigger>
                    <SelectContent>
                        <SelectGroup>
                            <SelectItem v-for="language in available_languages" :value="language">
                                {{ t('film.languages.'+language) }}
                            </SelectItem>
                        </SelectGroup>
                    </SelectContent>
                </Select>
            </div>
            <div class="my-5">
                <NumberField id="year" :default-value="2025" :min="2025" :max="2100">
                    <Label class="text-base" for="year">Film megjelenési éve</Label>
                    <NumberFieldContent>
                        <NumberFieldDecrement />
                        <NumberFieldInput />
                        <NumberFieldIncrement />
                    </NumberFieldContent>
                </NumberField>
            </div>
            <div class="my-5">
                <Label class="text-base" for="title">Boritókép</Label>
                <Input id="title" name="title" type="file" class="flex items-center" accept="png,jpg,jpeg" placeholder="Film címe" />
            </div>
            <Button theme="dark-outline" class="py-1">Feltöltés</Button>
        </div>
    </AppLayout>
</template>

<style scoped></style>
