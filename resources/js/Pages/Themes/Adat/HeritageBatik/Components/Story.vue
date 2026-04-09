<script setup>
defineProps({ invitation: Object });
</script>
<template>
    <section class="py-24 bg-[#1a0f0b] text-[#d4a373]">
        <div class="max-w-4xl mx-auto px-6 space-y-16">
            <h2 class="text-4xl text-center font-serif italic" data-aos="fade-up">Cerita Kita</h2>
            <div class="space-y-12">
                <div v-for="(story, i) in invitation.love_story" :key="i" class="flex gap-8" data-aos="fade-up">
                    <div class="text-2xl font-bold border-r border-[#d4a373]/30 pr-8">{{ story.year }}</div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold uppercase">{{ story.title }}</h3>
                        <p class="text-sm opacity-70">{{ story.text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
