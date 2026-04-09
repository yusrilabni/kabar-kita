<script setup>
defineProps({
    invitation: Object,
    to: String,
});
defineEmits(['open']);
</script>

<template>
    <div class="absolute inset-0 z-[100] bg-black text-white flex flex-col justify-between p-8 md:p-16 lg:p-24 overflow-hidden italic font-black h-full w-full">
        <!-- TOP BAR -->
        <div class="relative z-10 flex justify-between items-start w-full">
            <p class="text-[10px] font-black tracking-[1em] uppercase opacity-40">PENGUMUMAN</p>
            <p class="text-[10px] font-black tracking-[0.5em] uppercase">{{ new Date(invitation.wedding_date).getFullYear() || '2026' }}</p>
        </div>

        <!-- MIDDLE TITLE -->
        <div class="relative z-10 space-y-4 flex-1 flex flex-col justify-center">
            <h1 class="text-4xl md:text-8xl lg:text-[12rem] font-black tracking-tighter leading-[0.8] uppercase italic">
                {{ invitation.bride_nickname }}<br>
                <span class="text-transparent" style="-webkit-text-stroke: 1px white;">&</span> {{ invitation.groom_nickname }}
            </h1>
        </div>

        <!-- BOTTOM AREA -->
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-end gap-6 md:gap-12 w-full">
            <div class="max-w-xs space-y-2 md:space-y-4 text-left w-full">
                <p class="text-[8px] md:text-[9px] font-black tracking-[0.5em] uppercase opacity-40">Tamu Terhormat:</p>
                <h2 class="text-xl md:text-4xl font-light uppercase tracking-tighter italic border-b border-white/20 pb-2 w-full truncate">{{ to || 'Tamu Undangan' }}</h2>
            </div>
            
            <button @click="$emit('open')" class="group relative w-full md:w-auto px-8 py-4 md:px-12 md:py-6 bg-white text-black font-black uppercase text-[10px] md:text-xs tracking-[0.4em] md:tracking-[0.5em] overflow-hidden transition-all hover:bg-blue-600 hover:text-white shrink-0">
                <span class="relative z-10 italic">BUKA UNDANGAN</span>
            </button>
        </div>

        <!-- DECORATIVE LINE -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[150%] h-[1px] bg-white/10 -rotate-45 pointer-events-none"></div>
    </div>
</template>
