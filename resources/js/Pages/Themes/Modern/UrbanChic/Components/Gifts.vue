<script setup>
import { computed } from 'vue';
const props = defineProps({
    invitation: Object,
});
const digitalGifts = computed(() => props.invitation.digital_gifts || []);
</script>

<template>
    <section v-if="digitalGifts.length" class="py-40 px-10 relative overflow-hidden bg-white text-slate-950">
        <div class="max-w-4xl mx-auto space-y-24 text-center">
            <div class="space-y-4" data-aos="fade-up">
                <p class="text-[10px] font-black uppercase tracking-[1em] text-brand-primary">THE REGISTRY / 05</p>
                <h2 class="text-6xl md:text-8xl font-black italic uppercase tracking-tighter leading-none">DIGITAL GIFTS</h2>
                <p class="text-sm font-medium uppercase tracking-widest text-slate-500 max-w-lg mx-auto leading-relaxed">Kehadiran Anda adalah hadiah terbesar, namun jika ingin memberi lebih, tersedia saluran digital.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div v-for="(gift, i) in digitalGifts" :key="i" 
                    class="bg-slate-50 p-12 border-2 border-slate-950 relative group overflow-hidden text-left"
                    data-aos="fade-up">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-brand-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <div class="space-y-6 relative z-10">
                        <div class="w-12 h-1 bg-brand-primary"></div>
                        <p class="text-[10px] font-black tracking-[0.5em] uppercase text-slate-400">{{ gift.bank }}</p>
                        <h3 class="text-3xl md:text-4xl font-black italic tracking-tighter uppercase text-slate-950">{{ gift.no }}</h3>
                        <p class="text-xs font-black uppercase tracking-widest text-slate-500 italic">A.N. {{ gift.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
