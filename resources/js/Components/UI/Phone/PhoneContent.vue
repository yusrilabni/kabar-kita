<script setup>
defineProps({
    invitationTitle: String,
    coupleName: String,
    date: String,
    location: String,
    image: String
});
</script>

<template>
    <div class="absolute inset-0 flex flex-col items-center justify-between py-12 sm:py-16 px-6 sm:px-8 bg-[#fdfaf7] text-center rounded-[2.8rem] overflow-hidden shadow-inner">
        <div class="space-y-3 sm:space-y-4">
            <p class="text-[8px] sm:text-[10px] uppercase tracking-[0.6em] font-black text-blue-600">{{ invitationTitle }}</p>
            <h3 class="text-4xl sm:text-5xl font-['Great_Vibes'] text-slate-800 italic">{{ coupleName }}</h3>
        </div>
        <div class="w-44 h-60 sm:w-52 sm:h-72 rounded-t-full border-[8px] sm:border-[10px] border-white shadow-2xl overflow-hidden relative">
            <img :src="image" class="w-full h-full object-cover animate-parallax-zoom">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        </div>
        <div class="space-y-2 sm:space-y-3">
            <p class="text-[8px] sm:text-[10px] font-black uppercase tracking-[0.4em] text-slate-800">{{ date }}</p>
            <div class="h-[1px] w-10 sm:w-12 bg-blue-600/30 mx-auto"></div>
            <p class="text-[7px] sm:text-[8px] font-bold uppercase tracking-widest text-slate-400 italic">{{ location }}</p>
        </div>
    </div>
</template>

<style scoped>
@keyframes parallax-zoom { 0%, 100% { transform: scale(1.2); } 50% { transform: scale(1); } }
.animate-parallax-zoom { animation: parallax-zoom 10s infinite ease-in-out; }
</style>
