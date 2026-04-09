<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const quoteText = computed(() => props.invitation.quote || "Dua jiwa, satu tujuan. Sebuah kisah cinta modern yang menemukan rumahnya dalam keheningan pemahaman.");
</script>

<template>
    <section class="py-40 px-10 relative overflow-hidden">
        <!-- Accent -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-primary/5 blur-[150px] -z-10"></div>
        
        <div class="max-w-5xl mx-auto relative" data-aos="fade-up">
            <div class="flex items-start gap-8">
                <div class="w-1 md:w-2 h-40 bg-brand-primary shadow-[0_0_20px_rgba(37,99,235,0.5)]"></div>
                <div class="space-y-8">
                    <p class="text-[10px] font-black uppercase tracking-[1em] text-brand-primary">THE STATEMENT / 01</p>
                    <p class="text-4xl md:text-7xl font-black italic uppercase leading-[0.9] tracking-tighter">
                        "{{ quoteText }}"
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
