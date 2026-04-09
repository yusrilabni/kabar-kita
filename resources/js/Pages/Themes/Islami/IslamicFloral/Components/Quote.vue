<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const quoteText = computed(() => props.invitation.quote || "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya.");
</script>

<template>
    <section class="py-32 px-10 text-center bg-white border-y border-[#86A36E]/10 text-[#2D4A22]">
        <div class="max-w-3xl mx-auto space-y-10" data-aos="fade-up">
            <p class="text-2xl font-serif italic text-[#86A36E]">"{{ quoteText }}"</p>
            <p class="font-bold uppercase tracking-widest text-xs">( QS. Ar-Rum: 21 )</p>
        </div>
    </section>
</template>
