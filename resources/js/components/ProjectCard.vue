<script lang="ts" setup>
import { Project } from '@/types';
import { ArrowRight, Circle } from 'lucide-vue-next'

defineProps<{
    project: Project
}>()
</script>

<template>
    <div class="group relative overflow-hidden bg-black rounded-sm cursor-pointer">
        <div class="aspect-[4/5] overflow-hidden">
            <img :src="project.image.url" :alt="project.title"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
        </div>

        <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div
                class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                <div class="flex items-center gap-2 mb-3">
                    <span class="text-xs text-neutral-400 uppercase tracking-wider">{{ project.category.title }}</span>
                    <span class="text-neutral-600">•</span>
                    <span :class="[
                        'text-xs flex items-center gap-1',
                        project.status.color,
                        ]">
                        <Circle :size="8" class="fill-current" />
                        {{ project.status.title }}
                    </span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">{{ project.title }}</h3>
                <p class="text-neutral-300 text-sm mb-4 text-pretty">{{ project.description }}</p>
                <button class="text-white text-sm flex items-center gap-2 hover:gap-3 transition-all">
                    Részletek
                    <ArrowRight :size="16" />
                </button>
            </div>
        </div>

        <div class="absolute top-4 left-4 bg-black/80 backdrop-blur-sm px-3 py-1 rounded-sm">
            <span class="text-xs text-white uppercase tracking-wider">{{ project.category.title }}</span>
        </div>
        <div v-if="project.status.deleted" class="absolute top-4 right-4 bg-red-700/80 backdrop-blur-sm px-3 py-1 rounded-sm">
            <span class="text-xs text-white uppercase tracking-wider">Törölve</span>
        </div>
    </div>
</template>
