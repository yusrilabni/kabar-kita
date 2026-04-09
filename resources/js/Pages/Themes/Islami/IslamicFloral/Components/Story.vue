<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const loveStory = computed(() => props.invitation.love_story || []);
</script>

<template>
    <section v-if="loveStory.length" class="py-32 px-10 bg-[#FCF9F2] text-[#2D4A22]">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-5xl font-['Great_Vibes'] text-[#86A36E] mb-20">Kisah Cinta</h2>
            <div class="space-y-12 relative before:absolute before:inset-0 before:ml-5 md:before:mx-auto before:h-full before:w-0.5 before:bg-[#86A36E]/20 text-left">
                <div v-for="(story, i) in loveStory" :key="i" class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group" data-aos="fade-up">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-[#FCF9F2] bg-[#86A36E] text-white shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow-lg z-10 text-[10px]">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-3rem)] bg-white p-8 rounded-3xl border border-[#86A36E]/10">
                        <span class="font-black text-[#86A36E] text-xl italic">{{ story.year }}</span>
                        <h4 class="font-bold text-[#2D4A22] text-lg uppercase tracking-tight mt-1 mb-3">{{ story.title }}</h4>
                        <p class="text-sm text-[#5C6B46] leading-relaxed italic">{{ story.text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
