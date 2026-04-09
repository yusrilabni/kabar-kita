<script setup>
import { computed } from 'vue';

const props = defineProps({
    invitation: Object,
});

const quoteText = computed(() => props.invitation.quote || "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.");
const quoteAuthor = computed(() => props.invitation.quote_author || "QS. Ar-Rum: 21");
</script>

<template>
    <section class="relative py-32 px-6 overflow-hidden bg-[#450a0a]">
        <!-- Ornamen Background -->
        <div class="absolute inset-0 opacity-5 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/royal-lineage.png')]"></div>
        
        <div class="max-w-4xl mx-auto text-center space-y-12 relative z-10" data-aos="fade-up">
            <div class="w-12 h-12 border border-yellow-600/50 rounded-full flex items-center justify-center mx-auto text-yellow-600 text-sm mb-8">⚜</div>
            
            <div class="space-y-8">
                <p class="text-2xl md:text-3xl font-serif text-yellow-500 leading-relaxed italic px-4 md:px-12">
                    "{{ quoteText }}"
                </p>
                <div class="h-[1px] w-24 bg-gradient-to-r from-transparent via-yellow-600 to-transparent mx-auto"></div>
                <p class="text-yellow-600/80 uppercase tracking-[0.4em] text-[10px] font-black">
                    — {{ quoteAuthor }}
                </p>
            </div>
            
            <div class="absolute -top-10 -left-10 w-40 h-40 border-t-2 border-l-2 border-yellow-600/10 pointer-events-none"></div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 border-b-2 border-r-2 border-yellow-600/10 pointer-events-none"></div>
        </div>
    </section>
</template>
