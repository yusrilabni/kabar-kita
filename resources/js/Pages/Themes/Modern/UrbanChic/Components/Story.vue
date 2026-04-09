<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const loveStory = computed(() => props.invitation.love_story || []);
</script>

<template>
    <section v-if="loveStory.length" class="py-40 px-10 relative overflow-hidden">
        <div class="max-w-5xl mx-auto space-y-32">
            <!-- Header -->
            <div class="flex flex-col items-start space-y-4" data-aos="fade-right">
                <p class="text-[10px] font-black uppercase tracking-[1em] text-brand-primary">THE TIMELINE / 03</p>
                <h2 class="text-6xl md:text-9xl font-black italic uppercase tracking-tighter leading-none">THE STORY</h2>
            </div>

            <div class="space-y-40 relative">
                <!-- Timeline Line -->
                <div class="absolute left-0 top-0 bottom-0 w-px bg-white/10 hidden md:block"></div>
                
                <div v-for="(story, i) in loveStory" :key="i" class="relative pl-0 md:pl-20" data-aos="fade-up">
                    <!-- Year Marker -->
                    <div class="absolute left-0 top-0 -translate-x-1/2 w-4 h-4 bg-brand-primary shadow-[0_0_15px_rgba(37,99,235,1)] rounded-full hidden md:block"></div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
                        <div class="col-span-1">
                            <span class="text-5xl md:text-8xl font-black italic text-white/5 tracking-tighter leading-none block">{{ story.year }}</span>
                            <h4 class="text-2xl md:text-3xl font-black italic uppercase tracking-tighter text-brand-primary mt-2">{{ story.title }}</h4>
                        </div>
                        <div class="col-span-1 md:col-span-2">
                            <p class="text-lg md:text-xl font-medium text-slate-400 leading-relaxed max-w-2xl italic">
                                {{ story.text }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
