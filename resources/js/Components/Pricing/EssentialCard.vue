<script setup>
defineProps({ onSelect: Function });
const features = [
    '15 Pilihan Tema Standar',
    'Maksimal 500 Tamu',
    'Aktif Selamanya',
    'Fitur RSVP Standar',
    'Navigasi Google Maps',
    'Protokol Kesehatan',
    'Teks Undangan Custom',
    'Watermark Kabar Kita',
    'Update Data 24/7'
];
</script>

<template>
    <div class="group relative p-[1px] rounded-[2.5rem] md:rounded-[4rem] bg-gradient-to-br from-slate-200 via-white to-blue-200 shadow-xl transition-all duration-700 hover:-translate-y-4 md:hover:-translate-y-8 hover:shadow-2xl">
        <!-- Inner Card -->
        <div class="relative h-full p-8 md:p-12 rounded-[2.4rem] md:rounded-[3.9rem] bg-white overflow-hidden flex flex-col justify-between">
            
            <!-- Background Decoration -->
            <div class="absolute top-[-10%] right-[-10%] w-[200px] md:w-[300px] h-[200px] md:h-[300px] bg-blue-50 rounded-full blur-[80px] md:blur-[100px] group-hover:bg-blue-100 transition-all duration-700"></div>
            <span class="absolute top-4 md:top-8 right-8 md:right-12 text-7xl md:text-9xl font-black text-slate-50 italic group-hover:text-blue-50 transition-colors duration-500 select-none leading-none">01</span>

            <div class="relative z-10 flex-grow">
                <div class="mb-8 md:mb-10 text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-xl bg-slate-50 border border-slate-100 text-slate-400 group-hover:text-blue-500 group-hover:border-blue-200 transition-all duration-500 mb-6 md:mb-8">
                        <i class="fas fa-paper-plane text-[9px]"></i>
                        <span class="text-[9px] font-black uppercase tracking-[0.3em]">Starter Kit</span>
                    </div>
                    <h3 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tighter uppercase italic leading-none">Essential</h3>
                    <p class="text-[10px] md:text-[11px] font-bold text-slate-400 uppercase tracking-[0.4em] mt-2">Momen Berharga Anda</p>
                </div>

                <!-- Price Section -->
                <div class="mb-12 md:mb-16 text-left">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-sm md:text-lg font-bold text-slate-300 line-through italic">Rp 100rb</span>
                        <span class="px-2 py-0.5 rounded-md bg-red-50 text-red-500 text-[9px] font-black uppercase tracking-tighter">-50%</span>
                    </div>
                    <div class="flex items-baseline gap-1 md:gap-2">
                        <span class="text-lg md:text-xl font-black text-slate-200 italic">Rp</span>
                        <span class="text-7xl md:text-9xl font-black tracking-tighter text-slate-900 leading-none group-hover:text-blue-600 transition-colors duration-500">50<span class="text-2xl md:text-3xl ml-1 text-slate-300 italic font-black">RB</span></span>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 gap-4 md:gap-6 mb-12 md:mb-16 text-left">
                    <div v-for="(item, index) in features" :key="index" class="flex items-center gap-4 md:gap-5 cursor-default">
                        <div class="flex-shrink-0 w-7 h-7 md:w-8 md:h-8 rounded-xl md:rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center group-hover:bg-blue-600 group-hover:border-blue-600 group-hover:rotate-12 transition-all duration-500">
                            <i class="fas fa-check text-[9px] md:text-[10px] text-slate-300 group-hover:text-white"></i>
                        </div>
                        <span class="text-[11px] md:text-[12px] font-black uppercase text-slate-500 tracking-widest group-hover:text-slate-900 transition-colors duration-500">{{ item }}</span>
                    </div>
                </div>
            </div>

            <button @click="onSelect" class="relative z-10 w-full py-6 md:py-8 rounded-[1.5rem] md:rounded-[2rem] bg-slate-900 text-white font-black text-[11px] md:text-[13px] uppercase tracking-[0.4em] md:tracking-[0.5em] hover:bg-blue-600 shadow-2xl hover:scale-105 transition-all duration-500 italic active:scale-95">
                Mulai Sekarang →
            </button>
        </div>
    </div>
</template>
