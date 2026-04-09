<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
defineEmits(['select']);
const gallery = computed(() => props.invitation.gallery || []);
</script>

<template>
    <section v-if="gallery.length" id="gallery" class="py-40 px-10 relative overflow-hidden bg-slate-950">
        <div class="max-w-7xl mx-auto space-y-32 relative">
            <!-- Header -->
            <div class="flex flex-col items-center text-center space-y-4" data-aos="fade-down">
                <p class="text-[10px] font-black uppercase tracking-[1em] text-brand-primary">THE VISUALS / 04</p>
                <h2 class="text-6xl md:text-[10rem] font-black italic uppercase tracking-tighter leading-none">GALLERY</h2>
            </div>

            <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">
                <div v-for="(img, i) in gallery" :key="i" 
                    @click="$emit('select', img.url)"
                    class="break-inside-avoid relative group cursor-zoom-in overflow-hidden border border-white/5 transition-all duration-700 hover:border-brand-primary/50"
                    data-aos="fade-up">
                    
                    <img :src="img.url" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-1000 group-hover:scale-110" alt="Gallery">
                    
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-brand-primary/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center scale-0 group-hover:scale-100 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-950" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
