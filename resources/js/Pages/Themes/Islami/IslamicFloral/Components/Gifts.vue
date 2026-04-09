<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const digitalGifts = computed(() => props.invitation.digital_gifts || []);
</script>

<template>
    <section v-if="digitalGifts.length" class="py-32 px-10 bg-white text-[#2D4A22]">
        <div class="max-w-4xl mx-auto text-center space-y-20">
            <div data-aos="fade-up">
                <h2 class="text-5xl font-['Great_Vibes'] mb-6 text-[#2D4A22] italic">Kado Digital</h2>
                <p class="text-sm opacity-60 max-w-lg mx-auto leading-relaxed italic">Doa restu Anda adalah hadiah terindah, namun jika ingin memberikan tanda kasih secara digital, tersedia saluran berikut:</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-slate-800">
                <div v-for="(gift, i) in digitalGifts" :key="i" class="p-10 rounded-[3rem] bg-[#FCF9F2] border border-[#86A36E]/10 flex flex-col items-center space-y-4 group transition-all hover:bg-[#86A36E] hover:text-white" data-aos="fade-up">
                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-60 group-hover:text-white transition-colors">{{ gift.bank }}</span>
                    <p class="text-3xl font-bold tracking-widest text-[#86A36E] group-hover:text-white transition-colors">{{ gift.no }}</p>
                    <p class="text-xs uppercase font-bold text-[#2D4A22] group-hover:text-white transition-colors uppercase italic">A.N. {{ gift.name }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
