<script setup>
defineProps({ invitation: Object });
</script>
<template>
    <section class="py-32 bg-[#2d1a12] text-[#d4a373]">
        <div class="max-w-xl mx-auto px-6 text-center space-y-12">
            <h2 class="text-4xl font-serif italic" data-aos="fade-up">Kado Digital</h2>
            <div v-for="(gift, i) in invitation.digital_gifts" :key="i" class="p-8 border border-[#d4a373]/20 space-y-4" data-aos="fade-up">
                <p class="text-sm uppercase tracking-widest">{{ gift.bank }}</p>
                <p class="text-2xl font-bold">{{ gift.no }}</p>
                <p class="text-xs opacity-60">a.n {{ gift.name }}</p>
            </div>
        </div>
    </section>
</template>
