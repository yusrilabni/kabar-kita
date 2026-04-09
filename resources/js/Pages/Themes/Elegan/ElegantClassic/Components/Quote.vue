<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const quoteText = computed(() => props.invitation.quote || "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya.");
</script>

<template>
    <section class="py-24 px-6 text-center relative">
        <div class="max-w-3xl mx-auto space-y-8" data-aos="fade-up">
            <i class="fas fa-quote-right text-4xl text-[#D4C3A3] opacity-50"></i>
            <p class="text-lg md:text-xl leading-loose font-serif italic text-[#6B6154]">{{ quoteText }}</p>
        </div>
    </section>
</template>
