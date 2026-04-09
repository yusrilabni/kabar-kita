<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
defineEmits(['select']);
const gallery = computed(() => props.invitation.gallery || []);
</script>

<template>
    <section v-if="gallery.length" id="gallery" class="py-32 bg-[#FDFBF7] px-6 relative overflow-hidden">
        <!-- Ornamen Latar -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-[#B59C7D]/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-5xl md:text-6xl font-['Great_Vibes'] text-[#B59C7D] mb-20" data-aos="fade-up">Galeri Kebahagiaan</h2>
            
            <!-- STAGGERED ARTISTIC GRID -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 auto-rows-[150px] md:auto-rows-[200px]">
                <div v-for="(img, idx) in gallery" :key="idx" 
                     data-aos="zoom-in" 
                     class="relative cursor-zoom-in overflow-hidden shadow-2xl transition-all duration-700 hover:scale-[1.03] group"
                     :class="[
                        idx % 7 === 0 ? 'row-span-3 col-span-2 rounded-t-full border-8 border-white' : '',
                        idx % 7 === 1 ? 'row-span-2 rounded-b-full border-t-8 border-white mt-10' : '',
                        idx % 7 === 2 ? 'row-span-2 rounded-tr-[10rem] border-l-4 border-white' : '',
                        idx % 7 === 3 ? 'row-span-3 rounded-bl-[10rem] border-r-8 border-white -mt-10' : '',
                        idx % 7 === 4 ? 'row-span-2 rounded-full p-2 bg-white' : '',
                        idx % 7 === 5 ? 'row-span-2 rounded-2xl border-4 border-white rotate-3' : '',
                        idx % 7 === 6 ? 'row-span-2 rounded-[3rem] border-b-8 border-white -rotate-3' : '',
                     ]"
                     @click="$emit('select', img.url)">
                    <img :src="img.url" class="w-full h-full object-cover" alt="Gallery">
                    <div class="absolute inset-0 bg-[#B59C7D]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-3xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
