<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const digitalGifts = computed(() => props.invitation.digital_gifts || []);
</script>

<template>
    <section v-if="digitalGifts.length" class="py-40 px-10 bg-gray-50 text-slate-800 border-y border-black/5">
        <div class="max-w-4xl mx-auto text-center space-y-20">
            <div data-aos="fade-up">
                <h2 class="text-6xl md:text-8xl font-black tracking-tighter uppercase leading-none mb-8 italic">Kado Digital</h2>
                <p class="text-xs font-bold uppercase tracking-[0.5em] opacity-40">Kehadiran Anda adalah hadiah terbesar, namun jika ingin memberi lebih, tersedia saluran digital.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div v-for="(gift, i) in digitalGifts" :key="i" class="bg-white p-12 border border-black/5 shadow-xl space-y-6 relative group overflow-hidden" data-aos="fade-up">
                    <div class="absolute top-0 left-0 w-1 h-full bg-brand-primary"></div>
                    <p class="text-[10px] font-black tracking-[0.5em] uppercase opacity-40">{{ gift.bank }}</p>
                    <p class="text-3xl font-black tracking-tighter uppercase text-slate-900">{{ gift.no }}</p>
                    <p class="text-xs font-bold uppercase tracking-widest opacity-60">A.N. {{ gift.name }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
