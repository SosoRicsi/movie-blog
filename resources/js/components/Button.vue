<script setup lang="ts">
import { ArrowRight, ArrowLeft } from 'lucide-vue-next'
import { type Component } from 'vue';

const props = withDefaults(defineProps<{
    arrow?: 'none' | 'right' | 'left'
    tilt?: boolean,
    theme?: 'dark' | 'dark-outline' | 'light' | 'outline',
    icon?: Component | null,
    animateIcon?: boolean
}>(), { arrow: 'none', tilt: false, theme: 'light', icon: null, animateIcon: true })

</script>

<template>
    <button type="button" v-bind="$attrs" :class="[
        'px-8 py-4 rounded-sm transition-colors font-medium flex items-center justify-center gap-2 cursor-pointer group',
        theme === 'dark' ? 'bg-black text-white hover:bg-neutral-800' : null,
        theme === 'dark-outline' ? ' border border-black bg-transparent text-black hover:text-white hover:bg-neutral-800' : null,
        theme === 'outline' ? 'border border-white text-white hover:bg-white/10' : null,
        theme === 'light' ? 'bg-white text-black hover:bg-neutral-200' : null,
        tilt ? 'animate-tilt' : null
    ]">
        <span v-if="arrow === 'left' && icon === null" class="inline-flex w-5 justify-center">
            <ArrowLeft :size="20" class="transition-transform duration-300 group-hover:-translate-x-1" />
        </span>

        <span v-if="icon != null" class="inline-flex w-5 justify-center">
            <component :is="icon" :size="20" :class="[
                animateIcon ? 'transition-transform duration-300 group-hover:-translate-x-1' : null
            ]" />
        </span>

        <slot />

        <span v-if="arrow === 'right' && icon === null" class="inline-flex w-5 justify-center">
            <ArrowRight :size="20" class="transition-transform duration-300 group-hover:translate-x-1" />
        </span>
    </button>
</template>
