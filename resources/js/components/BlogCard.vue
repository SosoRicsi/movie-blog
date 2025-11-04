<template>
  <article class="group bg-white rounded-sm overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="aspect-video overflow-hidden">
      <img
        :src="post.image"
        :alt="post.title"
        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
      />
    </div>

    <div class="p-6">
      <div class="flex items-center gap-3 mb-4 text-sm">
        <span class="text-emerald-600 font-medium">{{ post.category }}</span>
        <span class="text-neutral-400">•</span>
        <span class="text-neutral-500 flex items-center gap-1">
          <Calendar :size="14" />
          {{ post.date }}
        </span>
        <span class="text-neutral-400">•</span>
        <span class="text-neutral-500 flex items-center gap-1">
          <Clock :size="14" />
          {{ post.readTime }}
        </span>
      </div>

      <h3 class="text-xl font-bold text-black mb-3 group-hover:text-emerald-600 transition-colors text-balance">
        {{ post.title }}
      </h3>

      <p class="text-neutral-600 mb-4 leading-relaxed text-pretty">
        {{ post.excerpt }}
      </p>

      <button class="text-black font-medium text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
        Tovább olvasom
        <ArrowRight :size="16" />
      </button>
    </div>
  </article>
</template>

<script setup>
import { Calendar, Clock, ArrowRight } from 'lucide-vue-next'

defineProps({
  post: {
    type: Object,
    required: true
  }
})
</script>
