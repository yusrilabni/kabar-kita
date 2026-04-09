<script setup>
import { computed } from 'vue';

const props = defineProps({
    invitation: Object,
});

defineEmits(['select']);

const gallery = computed(() => props.invitation.gallery || []);
</script>

<template>
    <section v-if="gallery.length" id="gallery" class="relative py-32 px-6 bg-[#450a0a] overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/royal-lineage.png')]"></div>
        
        <div class="max-w-6xl mx-auto space-y-24 relative z-10">
            <div class="text-center" data-aos="fade-up">
                <div class="w-10 h-10 border border-yellow-600/30 rounded-full flex items-center justify-center mx-auto text-yellow-600/50 text-xs mb-6 uppercase tracking-widest">V</div>
                <h2 class="text-4xl md:text-6xl font-serif font-black text-yellow-500 uppercase tracking-[0.3em]">Gallery of Moments</h2>
            </div>

            <!-- Luxury Masonry-like Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 auto-rows-[200px] md:auto-rows-[250px]">
                <div v-for="(img, idx) in gallery" :key="idx" 
                     data-aos="zoom-in" 
                     class="relative cursor-zoom-in overflow-hidden border border-yellow-600/20 transition-all duration-1000 group shadow-2xl"
                     :class="[
                        idx % 6 === 0 ? 'md:col-span-2 md:row-span-2' : '',
                        idx % 6 === 3 ? 'md:row-span-2' : '',
                        idx % 6 === 5 ? 'md:col-span-2' : '',
                     ]"
                     @click="$emit('select', img.url)">
                    
                    <img :src="img.url" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110" alt="Gallery">
                    
                    <div class="absolute inset-0 bg-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                        <div class="w-12 h-12 border border-white rounded-full flex items-center justify-center text-white">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>

                    <!-- Inner Frame -->
                    <div class="absolute inset-4 border border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                </div>
            </div>
        </div>
    </section>
</template>
