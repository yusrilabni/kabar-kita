<script setup>
defineProps({
    invitation: Object,
    to: String,
});
defineEmits(['open']);
</script>

<template>
    <div class="absolute inset-0 z-[100] bg-slate-950 text-white flex flex-col justify-between p-8 md:p-16 overflow-hidden h-full w-full">
        <!-- Ticker Background -->
        <div class="absolute top-0 left-0 w-full overflow-hidden whitespace-nowrap py-4 bg-brand-primary/10 border-b border-brand-primary/20 rotate-1 origin-top-left scale-110 pointer-events-none">
            <div class="animate-marquee inline-block text-[10px] font-black uppercase tracking-[1em] text-brand-primary">
                {{ invitation.bride_nickname }} & {{ invitation.groom_nickname }} • {{ invitation.bride_nickname }} & {{ invitation.groom_nickname }} • {{ invitation.bride_nickname }} & {{ invitation.groom_nickname }}
            </div>
        </div>

        <div class="relative z-10 pt-16 md:pt-20">
            <p class="text-[8px] md:text-[10px] font-black tracking-[0.5em] md:tracking-[1em] text-brand-primary mb-2 md:mb-4">CITY EDITION / 2026</p>
            <h1 class="text-5xl md:text-9xl lg:text-[12rem] font-black italic tracking-tighter leading-[0.8] uppercase flex flex-col">
                <span>{{ invitation.bride_nickname }}</span>
                <span class="text-brand-primary ml-8 md:ml-12 text-3xl md:text-6xl">X</span>
                <span class="self-end">{{ invitation.groom_nickname }}</span>
            </h1>
        </div>

        <div class="relative z-10 flex flex-col md:flex-row justify-between items-end gap-6 md:gap-12">
            <div class="space-y-2 md:space-y-4 max-w-sm w-full">
                <div class="w-8 md:w-12 h-1 bg-brand-primary"></div>
                <p class="text-[8px] md:text-[10px] font-black uppercase text-slate-500">To the Guest of Honor:</p>
                <h2 class="text-2xl md:text-5xl font-black italic uppercase tracking-tighter truncate">{{ to || 'VIP GUEST' }}</h2>
            </div>
            
            <button @click="$emit('open')" class="group relative w-full md:w-auto px-10 py-5 md:px-16 md:py-10 bg-brand-primary text-slate-950 font-black uppercase text-xs md:text-sm tracking-widest hover:bg-white transition-all shadow-[0_0_50px_rgba(37,99,235,0.4)] hover:scale-105 active:scale-95 italic shrink-0">
                BUKA UNDANGAN
            </button>
        </div>

        <!-- Geometric Accents -->
        <div class="absolute bottom-0 right-0 w-1/2 h-1/2 bg-brand-primary/5 rounded-full blur-[120px] pointer-events-none"></div>
    </div>
</template>

<style scoped>
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    display: inline-block;
    animation: marquee 20s linear infinite;
}
</style>
