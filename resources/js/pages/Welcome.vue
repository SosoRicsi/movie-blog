<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Főoldal" />
    <div class="min-h-screen bg-gray-50 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-5xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-4xl mx-auto">
                    <div>
                        <h1 class="text-3xl font-semibold text-gray-800">
                            Üdvözli önt a <span class="underline decoration-from-font decoration-blue-600">FamilyManager</span>!
                        </h1>
                    </div>
                    <div class="divide-y divide-gray-200 mt-6">
                        <span class="p-0 m-0 text-gray-700">Családon belüli funkciók:</span>
                        <div class="py-8 pt-3 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">

                            <div class="flex items-center space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="h-6 w-6 text-blue-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="font-medium">
                                    <p variant="ghost">naptár kezelés</p>
                                </span>
                            </div>

                            <div class="flex items-center space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6 text-yellow-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2m-4 4h4m-2-4v8m-1.172 1.172a4.5 4.5 0 006.364 0m-6.364 0a4.5 4.5 0 016.364 0m-6.364-3.182v3.182" />
                                </svg>
                                <span class="font-medium">
                                    <p variant="ghost">feladat kiosztás</p>
                                </span>
                            </div>

                            <div class="flex items-center space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6 text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                <span class="font-medium">
                                    <p variant="ghost">bevásárlólista megosztás</p>
                                </span>
                            </div>

                            <div class="flex items-center space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                                <span class="font-medium">
                                    <p variant="ghost">recept megosztás</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
