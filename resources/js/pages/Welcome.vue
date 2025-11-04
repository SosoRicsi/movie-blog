<script lang="ts" setup>
import { ref } from 'vue'
import { ArrowRight, Play, ChevronDown, Users } from 'lucide-vue-next'
import GuestLayout from '@/layouts/GuestLayout.vue'
import { Project } from '@/types'
import ProjectCard from '@/components/ProjectCard.vue'
import BlogCard from '@/components/BlogCard.vue'
import Button from '@/components/Button.vue'

const projects = [
    {
        id: 1,
        title: 'Éjszakai Fények',
        category: {
            title: 'Játékfilm',
            id: 1,
        },
        status: {
            title: 'Forgatás alatt',
            color: 'text-blue-400',
        },
        image: {
            url: 'https://placehold.co/800x600',
            placeholder: 'Placeholder image'
        },
        description: 'Egy magányos detektív története a nagyvárosi éjszakában.'
    },
    {
        id: 2,
        title: 'Horizont',
        category: {
            title: 'Dokumentumfilm',
            id: 2,
        },
        status: {
            title: 'Utómunka',
            color: 'text-green-400',
        },
        image: {
            url: 'https://placehold.co/800x600',
            placeholder: 'Placeholder image'
        },
        description: 'Utazás a Kárpátok legszebb tájain keresztül.'
    },
    {
        id: 3,
        title: 'Visszhang',
        category: {
            title: 'Rövidfilm',
            id: 3,
        },
        status: {
            title: 'Előkészítés',
            color: 'text-orange-400',
        },
        image: {
            url: 'https://placehold.co/800x600',
            placeholder: 'Placeholder image'
        },
        description: 'Kísérleti film a hang és a csend kapcsolatáról.'
    },
] as Project[];
const blogPosts = ref([
    {
        id: 1,
        title: 'A modern filmkészítés kihívásai 2025-ben',
        excerpt: 'Hogyan változtatja meg a mesterséges intelligencia és az új technológiák a filmipart?',
        date: '2025. március 15.',
        category: 'Technológia',
        image: 'https://placehold.co/600x400',
        readTime: '5 perc'
    },
    {
        id: 2,
        title: 'Kulisszák mögött: Éjszakai Fények forgatása',
        excerpt: 'Betekintés a legújabb játékfilmünk készítésének folyamatába és a kreatív döntések mögé.',
        date: '2025. március 10.',
        category: 'Kulisszák mögött',
        image: 'https://placehold.co/600x400',
        readTime: '8 perc'
    },
    {
        id: 3,
        title: 'Interjú a rendezővel: Vízió és valóság',
        excerpt: 'Beszélgetés a stúdió alapítójával a filmkészítés művészetéről és a jövő terveiről.',
        date: '2025. március 5.',
        category: 'Interjú',
        image: 'https://placehold.co/600x400',
        readTime: '10 perc'
    }
])
</script>

<template>
    <GuestLayout>
        <!-- hero -->
        <section class="relative h-screen flex items-center justify-center overflow-hidden bg-black">
            <div class="absolute inset-0">
                <img src="https://placehold.co/1920x1080" alt="Hero background"
                    class="w-full h-full object-cover opacity-40" />
                <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black"></div>
            </div>

            <div class="relative z-10 container mx-auto px-6 text-center">
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-white mb-6 tracking-tight text-balance"
                    data-aos="zoom-in">
                    Történeteket mesélünk,<br />mozgóképen keresztül
                </h1>
                <p class="text-lg md:text-xl text-neutral-300 mb-8 max-w-2xl mx-auto text-pretty">
                    Kreatív filmstúdió, amely a vizuális mesélés művészetét ötvözi a legmodernebb technológiával
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <Button :tilt="true" arrow="right">Projektek megtekintése</Button>
                    <Button :icon="Play" theme="outline">Bemutatkozó videónk</Button>
                </div>
            </div>

            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
                <ChevronDown :size="32" class="text-white/60" />
            </div>
        </section>

        <!-- Projects -->
        <section id="projektek" class="py-12 bg-white min-h-screen flex items-center" data-aos="zoom-in">
            <div class="container mx-auto px-6">
                <div class="mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-black mb-4 tracking-tight"> Készülő filmjeink </h2>
                    <p class="text-lg text-neutral-600 max-w-2xl text-pretty"> Jelenleg ezeken a projekteken dolgozunk.
                        Minden film egy egyedi történet, amely megérdemli a figyelmet. </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <ProjectCard v-for="project in projects" :key="project.id" :project="project" />
                </div>
                <div class="py-10 flex flex-col sm:flex-row gap-4 justify-center">
                    <!-- <button
                        class="bg-black text-white px-8 py-4 rounded-sm hover:bg-neutral-800 transition-colors font-medium flex items-center justify-center gap-2 animate-tilt">
                        Összes projektünk
                        <ArrowRight :size="20" />
                    </button> -->
                    <Button :tilt="true" arrow="right" theme="dark-outline">Összes projektünk</Button>
                </div>
            </div>
        </section>

        <!-- About us -->
        <section id="rolunk" class="py-24 bg-black text-white min-h-screen flex items-center">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold mb-6 tracking-tight">
                            Kreativitás és<br />technológia találkozása
                        </h2>
                        <p class="text-lg text-neutral-300 mb-6 leading-relaxed text-pretty">
                            A <strong>Név ide</strong> egy szenvedélyes csapat, amely hisz abban, hogy minden történet
                            megérdemli a legjobb vizuális megjelenítést. Filmjeinkben ötvözzük a hagyományos
                            filmkészítés
                            művészetét a legmodernebb technológiával.
                        </p>
                        <p class="text-lg text-neutral-300 mb-8 leading-relaxed text-pretty">
                            Célunk, hogy olyan filmeket készítsünk, amelyek nemcsak szórakoztatnak, hanem gondolkodásra
                            késztetnek és maradandó élményt nyújtanak a nézőknek.
                        </p>

                        <div class="grid grid-cols-3 gap-8 mb-8">
                            <div>
                                <div class="text-4xl font-bold text-emerald-400 mb-2">15+</div>
                                <div class="text-sm text-neutral-400">Elkészült film</div>
                            </div>
                            <div>
                                <div class="text-4xl font-bold text-emerald-400 mb-2">8</div>
                                <div class="text-sm text-neutral-400">Díj</div>
                            </div>
                            <div>
                                <div class="text-4xl font-bold text-emerald-400 mb-2">6</div>
                                <div class="text-sm text-neutral-400">Folyamatban</div>
                            </div>
                        </div>

                        <Button :icon="Users" :animate-icon="false">Csapatunk</Button>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <img src="https://placehold.co/300x400" alt="Stúdió"
                                class="w-full h-64 object-cover rounded-sm" />
                            <img src="https://placehold.co/300x400" alt="Forgatás"
                                class="w-full h-48 object-cover rounded-sm" />
                        </div>
                        <div class="space-y-4 pt-8">
                            <img src="https://placehold.co/300x400" alt="Eszközök"
                                class="w-full h-48 object-cover rounded-sm" />
                            <img src="https://placehold.co/300x400" alt="Utómunka"
                                class="w-full h-64 object-cover rounded-sm" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog -->
        <section id="blog" class="py-24 bg-neutral-50 min-h-screen flex items-center">
            <div class="container mx-auto px-6">
                <div class="flex items-end justify-between mb-16">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-black mb-4 tracking-tight">
                            Blog & Hírek
                        </h2>
                        <p class="text-lg text-neutral-600 max-w-2xl text-pretty">
                            Legfrissebb híreink, kulisszatitkok és szakmai gondolatok a filmkészítés világából.
                        </p>
                    </div>
                    <button class="hidden md:flex items-center gap-2 text-black hover:gap-3 transition-all">
                        Összes bejegyzés
                        <ArrowRight :size="20" />
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <BlogCard v-for="post in blogPosts" :key="post.id" :post="post" />
                </div>

                <div class="mt-12 text-center md:hidden">
                    <button class="inline-flex items-center gap-2 text-black hover:gap-3 transition-all">
                        Összes bejegyzés
                        <ArrowRight :size="20" />
                    </button>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped>
@keyframes tilt {

    0%,
    100% {
        transform: rotate(0deg);
    }

    10% {
        transform: rotate(2deg);
    }

    20% {
        transform: rotate(-2deg);
    }

    30% {
        transform: rotate(1.5deg);
    }

    40% {
        transform: rotate(-1.5deg);
    }

    50% {
        transform: rotate(0deg);
    }
}

.animate-tilt {
    animation: tilt 6s ease-in-out infinite;
}
</style>
