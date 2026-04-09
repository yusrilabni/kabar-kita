<script setup>
import { computed } from 'vue';

const props = defineProps({
    invitation: Object,
});

const loveStory = computed(() => {
    try {
        return typeof props.invitation.love_story === 'string' 
            ? JSON.parse(props.invitation.love_story) 
            : props.invitation.love_story || [];
    } catch (e) {
        return [];
    }
});
</script>

<template>
    <section id="story" class="relative py-32 px-6 bg-[#450a0a] overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/royal-lineage.png')]"></div>
        
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-24" data-aos="fade-up">
                <div class="w-10 h-10 border border-yellow-600/30 rounded-full flex items-center justify-center mx-auto text-yellow-600/50 text-xs mb-6 uppercase tracking-widest">III</div>
                <h2 class="text-4xl md:text-6xl font-serif font-black text-yellow-500 uppercase tracking-[0.3em]">Our Royal Journey</h2>
            </div>

            <div class="relative before:absolute before:inset-0 before:left-1/2 before:-translate-x-px before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-yellow-600/30 before:to-transparent">
                <div v-for="(story, i) in loveStory" :key="i" class="relative mb-24 last:mb-0" data-aos="fade-up">
                    <div class="flex flex-col md:flex-row items-center gap-8 md:gap-20">
                        <div class="flex-1 md:text-right order-2 md:order-1" :class="i % 2 === 0 ? 'md:order-1' : 'md:order-3'">
                            <div class="space-y-4">
                                <span class="text-4xl font-serif text-yellow-500 opacity-50">{{ story.year }}</span>
                                <h3 class="text-2xl font-serif text-yellow-500 uppercase tracking-widest">{{ story.title }}</h3>
                                <p class="text-white/70 leading-relaxed font-serif italic text-lg">{{ story.text }}</p>
                            </div>
                        </div>
                        
                        <div class="relative z-10 w-12 h-12 bg-[#450a0a] border-2 border-yellow-600 rounded-full flex items-center justify-center text-yellow-600 order-1 md:order-2">
                            <span class="text-xs italic">⚜</span>
                        </div>

                        <div class="flex-1 order-3" :class="i % 2 === 0 ? 'md:order-3' : 'md:order-1'">
                            <!-- Spacer for desktop layout balance -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
