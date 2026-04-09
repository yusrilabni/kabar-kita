<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const loveStory = computed(() => props.invitation.love_story || []);
</script>

<template>
    <!-- Pastikan ada pengecekan data -->
    <section v-if="loveStory.length" class="py-40 px-10 bg-white border-t border-black/5 text-slate-800">
        <div class="max-w-4xl mx-auto text-center space-y-24">
            <h2 class="text-6xl font-black uppercase tracking-tighter italic">Alur Cerita</h2>
            <div class="space-y-24">
                <div v-for="(story, i) in loveStory" :key="i" class="flex flex-col items-center gap-8" data-aos="fade-up">
                    <span class="text-5xl font-black text-slate-200 tracking-tighter">{{ story.year }}</span>
                    <h4 class="text-3xl font-black uppercase tracking-tight text-brand-primary">{{ story.title }}</h4>
                    <p class="text-sm font-medium uppercase tracking-widest max-w-lg leading-loose opacity-60">{{ story.text }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
