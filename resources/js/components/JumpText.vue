<script setup lang="ts">
import { computed } from 'vue'

const props = withDefaults(defineProps<{
    text: string;
    delayStepMs?: number;
    durationMs?: number;
    amplitudeEm?: number;
    hoverOnly?: boolean;
    as?: string;
}>(), {
    delayStepMs: 80,
    durationMs: 1200,
    amplitudeEm: 0.35,
    hoverOnly: false,
    as: 'span'
})

function splitGraphemes(input: string): string[] {
    // @ts-ignore
    if (typeof Intl !== 'undefined' && (Intl as any).Segmenter) {
        // @ts-ignore
        const seg = new (Intl as any).Segmenter(undefined, { granularity: 'grapheme' })
        return Array.from(seg.segment(input), (s: any) => s.segment)
    }

    return Array.from(input)
}

const chars = computed(() => splitGraphemes(props.text))
const Root = computed(() => props.as as any)
</script>

<template>
    <component :is="Root" class="jt-root" :style="{
        '--jt-duration': props.durationMs + 'ms',
        '--jt-step': props.delayStepMs + 'ms',
        '--jt-amp': props.amplitudeEm + 'em'
    }" :data-hover="props.hoverOnly ? '1' : '0'" role="text" :aria-label="text">
        <span v-for="(ch, i) in chars" :key="i" class="jt-char" :style="{ '--i': String(i) }" aria-hidden="true">
            {{ ch === ' ' ? '\u00A0' : ch }}
        </span>
    </component>
</template>

<style scoped>
@keyframes jt-hop {

    0%,
    100% {
        transform: translateY(0);
    }

    30% {
        transform: translateY(calc(var(--jt-amp, .35em) * -1));
    }
}

.jt-root {
    display: inline;
}

.jt-char {
    display: inline-block;
    animation: jt-hop var(--jt-duration, 1200ms) ease-in-out infinite;
    animation-delay: calc(var(--i, 0) * var(--jt-step, 80ms));
    will-change: transform;
}

/* csak hoverre (ha hoverOnly=true) */
.jt-root[data-hover="1"] .jt-char {
    animation-play-state: paused;
}

.jt-root[data-hover="1"]:hover .jt-char {
    animation-play-state: running;
}

/* akadálymentesség */
@media (prefers-reduced-motion: reduce) {
    .jt-char {
        animation: none !important;
        transform: none !important;
    }
}
</style>
