<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div class="absolute inset-0 bg-[#fdfaf7] flex flex-col items-center justify-between py-16 sm:py-20 px-6 sm:px-8 text-center rounded-[2.8rem] overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-24 sm:h-32 opacity-10 rotate-180">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full"><path fill="#3B82F6" d="M44.7,-76.4C58.1,-69.2,69.2,-58.1,76.4,-44.7C83.6,-31.3,86.9,-15.7,85.4,-0.9C83.8,13.9,77.5,27.8,68.8,39.1C60.1,50.4,49,59.1,36.6,66.4C24.2,73.7,10.5,79.6,-3.1,84.9C-16.7,90.2,-30.3,94.9,-43.1,91.1C-55.9,87.3,-67.9,75.1,-76.2,61.1C-84.5,47.1,-89.1,31.3,-91.2,15.2C-93.3,-0.9,-93,-17.2,-87.3,-31.8C-81.6,-46.4,-70.5,-59.3,-57.1,-66.5C-43.7,-73.7,-28.1,-75.2,-12.5,-73.1C3.1,-71,18.7,-65.3,31.3,-63.6C43.9,-61.9,53.5,-64.2,44.7,-76.4Z" transform="translate(100,100)" /></svg>
        </div>
        <div class="space-y-4 sm:space-y-6 flex flex-col items-center relative z-10">
            <ApplicationLogo class="h-10 sm:h-14 w-auto mx-auto" />
            <div class="h-[1px] w-12 sm:w-16 bg-blue-600/40 mx-auto mt-2"></div>
        </div>
        <div class="space-y-6 sm:space-y-8 flex flex-col items-center relative z-10">
            <div class="space-y-2">
                <p class="text-[7px] sm:text-[9px] uppercase tracking-[0.5em] font-black text-slate-400">Exclusive Invite For</p>
                <p class="text-xl sm:text-2xl font-black uppercase text-slate-900 tracking-tighter italic">Tamu Undangan</p>
            </div>
            <div class="relative group cursor-pointer animate-bounce-slow">
                <div class="absolute -inset-4 bg-blue-600/20 rounded-full blur-xl animate-pulse"></div>
                <div class="relative px-8 py-4 sm:px-10 sm:py-5 bg-slate-950 text-white rounded-full text-[9px] sm:text-[11px] font-black tracking-[0.2em] uppercase shadow-2xl flex items-center gap-2 sm:gap-3 italic border border-white/10">
                    Buka Undangan
                    <i class="fas fa-envelope-open-text text-blue-400"></i>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 right-0 w-full h-24 sm:h-32 opacity-10">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full"><path fill="#3B82F6" d="M44.7,-76.4C58.1,-69.2,69.2,-58.1,76.4,-44.7C83.6,-31.3,86.9,-15.7,85.4,-0.9C83.8,13.9,77.5,27.8,68.8,39.1C60.1,50.4,49,59.1,36.6,66.4C24.2,73.7,10.5,79.6,-3.1,84.9C-16.7,90.2,-30.3,94.9,-43.1,91.1C-55.9,87.3,-67.9,75.1,-76.2,61.1C-84.5,47.1,-89.1,31.3,-91.2,15.2C-93.3,-0.9,-93,-17.2,-87.3,-31.8C-81.6,-46.4,-70.5,-59.3,-57.1,-66.5C-43.7,-73.7,-28.1,-75.2,-12.5,-73.1C3.1,-71,18.7,-65.3,31.3,-63.6C43.9,-61.9,53.5,-64.2,44.7,-76.4Z" transform="translate(100,100)" /></svg>
        </div>
    </div>
</template>

<style scoped>
@keyframes bounce-slow { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
.animate-bounce-slow { animation: bounce-slow 3s infinite ease-in-out; }
</style>
