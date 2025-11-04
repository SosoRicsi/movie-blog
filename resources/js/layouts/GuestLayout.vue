<script setup lang="ts">
import { ref, computed } from 'vue'
import { Head, usePage } from '@inertiajs/vue3';
import { Menu, X, Film, Instagram, Youtube, Linkedin, Mail, Phone, MapPin } from 'lucide-vue-next'
import { SharedData } from '@/types';

const mobileMenuOpen = ref(false)


const props = defineProps<{ title?: string }>()
const page = usePage<SharedData>()

const title = computed(() => props.title ?? page.props.name)
</script>

<template>
    <Head :title />
    <div class="min-h-screen bg-neutral-50 [--header:64px]">
        <header class="fixed top-0 left-0 right-0 z-50 bg-black/90 backdrop-blur-sm border-b border-white/10">
            <nav class="container mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="text-white text-2xl font-bold tracking-tight">
                        Név ide
                    </div>

                    <div class="hidden md:flex items-center gap-8">
                        <a href="#" class="text-neutral-300 hover:text-white transition-colors text-sm">Főoldal</a>
                        <a href="#projektek"
                            class="text-neutral-300 hover:text-white transition-colors text-sm">Projektek</a>
                        <a href="#rolunk" class="text-neutral-300 hover:text-white transition-colors text-sm">Rólunk</a>
                        <a href="#blog" class="text-neutral-300 hover:text-white transition-colors text-sm">Blog</a>
                        <a href="#kapcsolat"
                            class="text-neutral-300 hover:text-white transition-colors text-sm">Kapcsolat</a>
                    </div>

                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white p-2">
                        <Menu v-if="!mobileMenuOpen" :size="24" />
                        <X v-else :size="24" />
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div v-if="mobileMenuOpen" class="md:hidden mt-4 pb-4 flex flex-col gap-4">
                    <a href="#" class="text-neutral-300 hover:text-white transition-colors text-sm">Főoldal</a>
                    <a href="#projektek"
                        class="text-neutral-300 hover:text-white transition-colors text-sm">Projektek</a>
                    <a href="#rolunk" class="text-neutral-300 hover:text-white transition-colors text-sm">Rólunk</a>
                    <a href="#blog" class="text-neutral-300 hover:text-white transition-colors text-sm">Blog</a>
                    <a href="#kapcsolat"
                        class="text-neutral-300 hover:text-white transition-colors text-sm">Kapcsolat</a>
                </div>
            </nav>
        </header>

        <slot />

        <footer id="kapcsolat" class="bg-black text-white pt-24 pb-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div>
                    <h3 class="text-2xl font-bold mb-6">Név ide</h3>
                    <p class="text-neutral-400 mb-6 leading-relaxed text-pretty">
                        Kreatív filmstúdió, amely történeteket mesél mozgóképen keresztül.
                    </p>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-sm flex items-center justify-center transition-colors">
                            <Film :size="20" />
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-sm flex items-center justify-center transition-colors">
                            <Instagram :size="20" />
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-sm flex items-center justify-center transition-colors">
                            <Youtube :size="20" />
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-sm flex items-center justify-center transition-colors">
                            <Linkedin :size="20" />
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold mb-6 text-lg">Navigáció</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Főoldal</a></li>
                        <li><a href="#projektek"
                                class="text-neutral-400 hover:text-white transition-colors">Projektek</a></li>
                        <li><a href="#rolunk" class="text-neutral-400 hover:text-white transition-colors">Rólunk</a>
                        </li>
                        <li><a href="#blog" class="text-neutral-400 hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#kapcsolat"
                                class="text-neutral-400 hover:text-white transition-colors">Kapcsolat</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-6 text-lg">Szolgáltatások</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Játékfilm</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Dokumentumfilm</a>
                        </li>
                        <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Reklámfilm</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Utómunka</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Konzultáció</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-6 text-lg">Kapcsolat</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-neutral-400">
                            <Mail :size="20" class="mt-1 flex-shrink-0" />
                            <span>info@nevide.hu</span>
                        </li>
                        <li class="flex items-start gap-3 text-neutral-400">
                            <Phone :size="20" class="mt-1 flex-shrink-0" />
                            <span>+36 1 234 5678</span>
                        </li>
                        <li class="flex items-start gap-3 text-neutral-400">
                            <MapPin :size="20" class="mt-1 flex-shrink-0" />
                            <span>1011 Budapest<br />Fő utca 1.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-neutral-400 text-sm">
                        © 2025 Név ide. Minden jog fenntartva.
                    </p>
                    <div class="flex gap-6 text-sm">
                        <a href="#" class="text-neutral-400 hover:text-white transition-colors">Adatvédelem</a>
                        <a href="#" class="text-neutral-400 hover:text-white transition-colors">Felhasználási
                            feltételek</a>
                        <a href="#" class="text-neutral-400 hover:text-white transition-colors">Sütik</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
</template>
