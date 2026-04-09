<script setup>
defineProps({
    invitation: Object,
    to: String,
});
defineEmits(['open']);
</script>

<template>
    <div class="absolute inset-0 z-[100] bg-[#450a0a] text-yellow-200 flex flex-col items-center justify-center p-8 text-center overflow-hidden">
        <!-- Ornamen Royal -->
        <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/royal-lineage.png')]"></div>
        
        <div class="relative z-10 space-y-8 md:space-y-12 max-w-2xl w-full border-y border-yellow-600/30 py-12 md:py-20">
            <div class="space-y-4">
                <div class="w-12 h-12 md:w-16 md:h-16 border-2 border-yellow-500 rounded-full flex items-center justify-center mx-auto text-lg md:text-xl mb-4 md:mb-6">⚜</div>
                <p class="uppercase tracking-[0.4em] md:tracking-[0.6em] text-[8px] md:text-[10px] text-yellow-500 font-black">The Royal Wedding of</p>
                <h1 class="text-4xl md:text-8xl font-serif font-black tracking-widest uppercase leading-none">{{ invitation.bride_nickname }} & {{ invitation.groom_nickname }}</h1>
            </div>

            <div class="space-y-4 md:space-y-6">
                <div class="space-y-1 md:space-y-2">
                    <p class="italic text-yellow-500/60 text-[10px] md:text-xs uppercase tracking-widest font-bold">Special Invitation For:</p>
                    <h2 class="text-2xl md:text-4xl font-serif tracking-tighter italic border-b border-yellow-600/20 pb-2 md:pb-4">{{ to || 'Our Distinguished Guest' }}</h2>
                </div>
                
                <button @click="$emit('open')" class="group relative px-12 md:px-20 py-4 md:py-5 bg-yellow-600 hover:bg-yellow-500 text-[#450a0a] font-black uppercase text-[10px] md:text-xs tracking-[0.3em] md:tracking-[0.5em] transition-all shadow-[0_0_30px_rgba(202,138,4,0.3)]">
                    BUKA UNDANGAN
                </button>
            </div>
        </div>

        <!-- Corner Ornaments -->
        <div class="absolute top-10 left-10 w-20 h-20 border-t-4 border-l-4 border-yellow-600/40"></div>
        <div class="absolute bottom-10 right-10 w-20 h-20 border-b-4 border-r-4 border-yellow-600/40"></div>
    </div>
</template>
