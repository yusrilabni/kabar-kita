<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const loveStory = computed(() => props.invitation.love_story || []);
</script>

<template>
    <section class="py-32 px-6 bg-[#FDFBF7]">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-5xl md:text-6xl font-['Great_Vibes'] text-[#B59C7D] mb-20" data-aos="fade-up">Kisah Cinta</h2>
            <div class="space-y-12 relative before:absolute before:inset-0 before:ml-5 md:before:mx-auto before:h-full before:w-0.5 before:bg-[#D4C3A3]/30">
                <div v-for="(story, i) in loveStory" :key="i" class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group" data-aos="fade-up">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-[#FDFBF7] bg-[#B59C7D] text-white shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow-lg z-10 text-[10px]">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-3rem)] bg-white p-6 rounded-2xl shadow-sm border border-[#E8DFD1] text-left">
                        <span class="font-black text-[#B59C7D] text-xl italic">{{ story.year }}</span>
                        <h4 class="font-black text-[#5C5346] text-lg uppercase tracking-tight mt-1 mb-3">{{ story.title }}</h4>
                        <p class="text-sm text-[#7A7165] leading-relaxed">{{ story.text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
