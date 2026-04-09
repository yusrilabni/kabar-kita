<script setup>
defineProps({
    invitation: Object,
    to: String,
});
defineEmits(['open']);
</script>

<template>
    <div class="absolute inset-0 z-[100] bg-[#FCF9F2] flex flex-col items-center justify-center p-8 text-center overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/pazyryk.png')]"></div>
        
        <div class="relative z-10 space-y-6 md:space-y-12 max-w-lg">
            <div class="space-y-2 md:space-y-4">
                <div class="w-16 md:w-20 h-[1px] bg-[#86A36E] mx-auto opacity-40"></div>
                <p class="text-[#86A36E] font-bold tracking-[0.2em] md:tracking-[0.3em] uppercase text-[8px] md:text-[10px]">Walimatul Ursy</p>
                <h1 class="text-4xl md:text-8xl font-['Great_Vibes'] text-[#2D4A22] py-1 md:py-2">{{ invitation.bride_nickname }} & {{ invitation.groom_nickname }}</h1>
            </div>

            <div class="w-48 h-48 md:w-64 md:h-64 mx-auto rounded-full border-8 md:border-[12px] border-white shadow-2xl overflow-hidden relative shrink-0">
                <img :src="invitation.gallery?.[0]?.url" class="w-full h-full object-cover" alt="Cover">
            </div>

            <div class="space-y-4 md:space-y-6">
                <div class="space-y-1">
                    <p class="italic text-xs opacity-60">Kepada Yth:</p>
                    <h2 class="text-xl md:text-2xl font-bold uppercase tracking-widest">{{ to || 'Saudara/i' }}</h2>
                </div>
                <button @click="$emit('open')" class="px-10 py-3.5 md:px-12 md:py-4 bg-[#86A36E] text-white rounded-full font-bold uppercase text-[9px] md:text-[10px] tracking-[0.3em] shadow-xl shadow-[#86A36E]/20 transition-all hover:scale-105">BUKA UNDANGAN</button>
            </div>
        </div>
    </div>
</template>
