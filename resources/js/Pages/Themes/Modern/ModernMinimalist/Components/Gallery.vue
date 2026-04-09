<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
defineEmits(['select']);
const gallery = computed(() => props.invitation.gallery || []);
</script>

<template>
    <section v-if="gallery.length" id="gallery" class="py-40 px-10 bg-white">
        <div class="max-w-7xl mx-auto space-y-32">
            <h2 class="text-6xl md:text-[10rem] font-black tracking-tighter uppercase text-center italic leading-none" data-aos="fade-down">Album Foto</h2>
            
            <!-- ASYMMETRIC MODERN MASONRY -->
            <div class="columns-1 sm:columns-2 lg:columns-3 gap-10 space-y-10">
                <div v-for="(img, idx) in gallery" :key="idx" 
                     data-aos="fade-up"
                     class="break-inside-avoid relative group cursor-zoom-in overflow-hidden transition-all duration-1000 shadow-xl"
                     :class="[
                        idx % 4 === 0 ? 'border-[15px] border-black p-2 bg-black scale-95' : '',
                        idx % 4 === 1 ? 'border-l-[25px] border-black mt-20' : '',
                        idx % 4 === 2 ? 'grayscale hover:grayscale-0 scale-105' : 'border border-black/5',
                        idx % 4 === 3 ? 'rotate-2' : '-rotate-1',
                     ]"
                     @click="$emit('select', img.url)">
                    <img :src="img.url" class="w-full h-full object-cover transform transition-transform duration-[2s] group-hover:scale-125" alt="Gallery">
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white">
                        <span class="text-[10px] font-black uppercase tracking-[1em] border border-white px-6 py-2">Lihat</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
