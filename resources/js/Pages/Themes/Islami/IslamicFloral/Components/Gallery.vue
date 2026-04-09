<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
defineEmits(['select']);
const gallery = computed(() => props.invitation.gallery || []);
</script>

<template>
    <section v-if="gallery.length" id="gallery" class="py-32 px-10 bg-white text-[#2D4A22] overflow-hidden">
        <div class="max-w-6xl mx-auto text-center relative">
            <h2 class="text-5xl md:text-6xl font-['Great_Vibes'] text-[#86A36E] mb-32 italic" data-aos="fade-up">Galeri Momen Indah</h2>
            
            <!-- SOFT ORGANIC OVERLAPPING GRID -->
            <div class="relative flex flex-wrap justify-center gap-10 md:gap-16">
                <div v-for="(img, idx) in gallery" :key="idx" 
                     data-aos="zoom-in"
                     class="relative cursor-zoom-in transition-all duration-700 hover:z-20 hover:scale-110"
                     :class="[
                        idx % 5 === 0 ? 'w-72 h-72 rounded-full border-[12px] border-white shadow-2xl rotate-3' : '',
                        idx % 5 === 1 ? 'w-56 h-80 rounded-[10rem] border-[12px] border-white shadow-xl -mt-16 -rotate-6' : '',
                        idx % 5 === 2 ? 'w-80 h-56 rounded-full border-[12px] border-white shadow-2xl mt-12' : '',
                        idx % 5 === 3 ? 'w-64 h-64 rounded-[4rem] border-[12px] border-[#FCF9F2] shadow-2xl rotate-12 -ml-10' : '',
                        idx % 5 === 4 ? 'w-48 h-48 rounded-full border-[12px] border-white shadow-2xl -mt-20' : '',
                     ]"
                     @click="$emit('select', img.url)">
                    <img :src="img.url" class="w-full h-full object-cover transition-all duration-1000 shadow-inner" 
                         :class="idx % 5 === 0 || idx % 5 === 2 || idx % 5 === 4 ? 'rounded-full' : 'rounded-[inherit]'"
                         alt="Gallery">
                    <div class="absolute inset-0 bg-[#86A36E]/10 opacity-0 hover:opacity-100 transition-opacity rounded-[inherit] flex items-center justify-center">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
