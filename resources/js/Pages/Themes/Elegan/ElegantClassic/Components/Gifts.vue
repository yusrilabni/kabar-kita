<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const digitalGifts = computed(() => props.invitation.digital_gifts || []);
</script>

<template>
    <section class="py-32 px-6 bg-white border-t border-[#E8DFD1]">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-['Great_Vibes'] text-[#5C5346] mb-16" data-aos="fade-up">Kado Digital</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-slate-800">
                <div v-for="(gift, i) in digitalGifts" :key="i" class="bg-[#FDFBF7] p-8 rounded-3xl border border-[#E8DFD1] shadow-sm relative overflow-hidden" data-aos="fade-up">
                    <h4 class="text-xl font-black uppercase tracking-widest text-[#5C5346] mb-4">{{ gift.bank }}</h4>
                    <p class="text-2xl font-serif text-[#B59C7D] mb-2 tracking-widest">{{ gift.no }}</p>
                    <p class="text-[10px] uppercase font-black opacity-60">A.N. {{ gift.name }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
