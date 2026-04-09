<script setup>
defineProps({
    invitation: Object,
    to: String,
});
defineEmits(['open']);
</script>

<template>
    <div class="absolute inset-0 z-[100] bg-[#2d1a12] text-[#d4a373] flex flex-col items-center justify-center p-8 text-center overflow-hidden">
        <!-- Batik Pattern Overlay -->
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/batik-fractal.png')]"></div>
        
        <div class="relative z-10 space-y-6 md:space-y-12 max-w-lg w-full">
            <div class="space-y-2 md:space-y-4">
                <p class="uppercase tracking-[0.4em] md:tracking-[0.5em] text-[8px] md:text-[10px] font-bold text-[#d4a373]/60">The Wedding Celebration Of</p>
                <h1 class="text-4xl md:text-7xl font-serif italic tracking-tighter leading-tight">{{ invitation.bride_nickname }} & {{ invitation.groom_nickname }}</h1>
            </div>

            <!-- Frame Foto Tradisional (Diamond Shape) -->
            <div class="w-40 h-40 md:w-56 md:h-56 mx-auto relative shrink-0">
                <div class="absolute inset-0 border border-md:border-2 border-[#d4a373] rotate-45"></div>
                <div class="absolute inset-1.5 md:inset-2 overflow-hidden rotate-45 border border-md:border-2 border-[#d4a373]/30">
                    <img :src="invitation.gallery?.[0]?.url" class="w-full h-full object-cover -rotate-45 scale-150" alt="Sampul">
                </div>
            </div>

            <div class="space-y-6 md:space-y-8">
                <div class="space-y-1 md:space-y-2">
                    <p class="italic text-[#d4a373]/60 text-[10px] md:text-xs font-serif tracking-widest">Katur dumateng Bpk/Ibu/Sdr/i:</p>
                    <h2 class="text-2xl md:text-3xl font-serif uppercase tracking-widest border-b border-[#d4a373]/20 pb-2 md:pb-4 truncate">{{ to || 'Tamu Kehormatan' }}</h2>
                </div>
                
                <button @click="$emit('open')" class="px-10 py-3.5 md:px-12 md:py-4 border-2 border-[#d4a373] hover:bg-[#d4a373] hover:text-[#2d1a12] font-black uppercase text-[10px] md:text-xs tracking-[0.3em] md:tracking-[0.4em] transition-all italic">
                    BUKA UNDANGAN
                </button>
            </div>
        </div>

        <!-- Ornamen Pojok Wayang/Batik -->
        <div class="absolute -top-10 -left-10 w-40 h-40 border-4 border-[#d4a373]/20 rounded-full"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 border-4 border-[#d4a373]/20 rounded-full"></div>
    </div>
</template>
