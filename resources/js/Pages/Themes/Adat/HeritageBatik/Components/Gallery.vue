<script setup>
defineProps({ invitation: Object });
defineEmits(['select']);
</script>
<template>
    <section class="py-32 bg-[#1a0f0b]">
        <div class="max-w-6xl mx-auto px-6 space-y-16">
            <h2 class="text-4xl text-center font-serif italic text-[#d4a373]" data-aos="fade-up">Galeri Foto</h2>
            <div class="columns-2 md:columns-3 gap-4 space-y-4">
                <img v-for="(img, i) in invitation.gallery" :key="i" :src="img.url" 
                     class="w-full cursor-pointer hover:scale-105 transition-transform border-4 border-[#2d1a12]"
                     @click="$emit('select', img.url)" data-aos="zoom-in">
            </div>
        </div>
    </section>
</template>
