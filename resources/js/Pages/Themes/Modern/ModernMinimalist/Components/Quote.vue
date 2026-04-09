<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const quoteText = computed(() => props.invitation.quote || "Dua jiwa, satu tujuan. Sebuah kisah cinta modern yang menemukan rumahnya dalam keheningan pemahaman.");
</script>

<template>
    <section class="py-40 px-10 bg-white border-b border-black/5 text-slate-800">
        <div class="max-w-4xl mx-auto space-y-12" data-aos="fade-up">
            <p class="text-3xl md:text-5xl font-light leading-tight tracking-tighter uppercase italic">
                "{{ quoteText }}"
            </p>
        </div>
    </section>
</template>
