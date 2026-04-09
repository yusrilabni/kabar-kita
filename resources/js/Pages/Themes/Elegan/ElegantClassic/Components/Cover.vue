<script setup>
defineProps({
    invitation: Object,
    to: String,
});
defineEmits(['open']);
</script>

<template>
    <div class="absolute inset-0 z-[100] bg-[#FDFBF7] flex flex-col items-center justify-between py-16 px-8 md:p-12 text-center overflow-hidden text-slate-800">
        <!-- Ornamen Bingkai Mewah -->
        <div class="absolute top-0 left-0 w-64 h-64 border-t-[12px] border-l-[12px] border-[#D4C3A3]/20 rounded-tl-[5rem] -translate-x-10 -translate-y-10"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 border-b-[12px] border-r-[12px] border-[#D4C3A3]/20 rounded-br-[5rem] translate-x-10 translate-y-10"></div>
        
        <div class="relative z-10 flex-1 flex flex-col justify-center items-center space-y-6 md:space-y-10 w-full max-w-lg">
            <div class="space-y-1 md:space-y-2">
                <p class="uppercase tracking-[0.4em] text-[8px] md:text-[10px] font-black text-[#A89070]">Undangan Pernikahan</p>
                <h1 class="text-4xl md:text-7xl font-['Great_Vibes'] text-[#5C5346] py-1 md:py-2">{{ invitation.bride_nickname }} & {{ invitation.groom_nickname }}</h1>
            </div>

            <!-- Bingkai Foto Arch -->
            <div class="w-48 h-64 md:w-64 md:h-80 rounded-t-full rounded-b-xl overflow-hidden border-4 md:border-8 border-white shadow-2xl relative shrink-0">
                <img :src="invitation.gallery?.[0]?.url" class="w-full h-full object-cover filter brightness-110 sepia-[0.1]" alt="Sampul">
            </div>

            <div class="w-full space-y-6">
                <div class="space-y-1">
                    <p class="text-[10px] uppercase tracking-widest text-[#A89070] font-black">Kepada Yth.</p>
                    <h2 class="text-2xl font-black uppercase tracking-widest text-[#5C5346]">{{ to || 'Tamu Undangan' }}</h2>
                </div>
                
                <!-- Tombol Sesuai Mockup -->
                <button @click="$emit('open')" class="px-10 py-4 bg-white/50 backdrop-blur-sm border border-[#D4C3A3] text-[#A89070] rounded-full font-black uppercase text-[10px] tracking-[0.3em] shadow-md transition-all hover:bg-[#B59C7D] hover:text-white">
                    Buka Undangan
                </button>
            </div>
        </div>
    </div>
</template>
