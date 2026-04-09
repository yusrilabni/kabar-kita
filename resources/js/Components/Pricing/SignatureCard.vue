<script setup>
defineProps({ onSelect: Function });
const features = [
    'Semua Tema Premium (120+)',
    'Tamu Tanpa Batas',
    'Aktif Selamanya (Lifetime)',
    'Background Music (Pilih Lagu)',
    'Galeri Foto (Hingga 20 Foto)',
    'Video Undangan YouTube',
    'RSVP via WhatsApp Chat',
    'Kado Digital & Bank Transfer',
    'Tanpa Watermark Branding'
];
</script>

<template>
    <div class="group relative h-full p-[1px] rounded-[2.5rem] md:rounded-[4rem] bg-gradient-to-br from-blue-400 via-sky-300 to-indigo-500 shadow-[0_40px_80px_-20px_rgba(59,130,246,0.5)] md:scale-110 z-20 transition-all duration-700 hover:-translate-y-4 md:hover:-translate-y-8">
        <div class="relative h-full p-8 md:p-12 rounded-[2.4rem] md:rounded-[3.9rem] bg-gradient-to-br from-blue-600 to-indigo-700 overflow-hidden flex flex-col justify-between">
            <!-- Background Decoration -->
            <div class="absolute top-[-30%] right-[-30%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-white/10 rounded-full blur-[80px] md:blur-[100px] group-hover:bg-white/20 transition-all duration-1000"></div>
            <div class="absolute bottom-0 right-0 p-6 md:p-10 opacity-10 group-hover:opacity-20 transition-all duration-1000">
                <i class="fas fa-crown text-[5rem] md:text-[8rem] text-white"></i>
            </div>

            <!-- HOT Badge -->
            <div class="absolute top-0 right-6 md:right-10">
                <div class="px-4 py-6 md:px-6 md:py-10 bg-yellow-400 text-slate-900 text-[10px] md:text-[11px] font-black uppercase tracking-[0.4em] rounded-b-full shadow-2xl flex flex-col items-center gap-2 italic z-30">
                    <i class="fas fa-bolt animate-bounce text-[10px] md:text-sm"></i>
                    <span style="writing-mode: vertical-rl;">HOT</span>
                </div>
            </div>

            <div class="relative z-10 flex-grow">
                <div class="mb-8 md:mb-12 text-left">
                    <div class="inline-flex items-center gap-3 px-4 py-1.5 md:px-5 md:py-2 rounded-xl md:rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md shadow-xl mb-6 md:mb-8">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        <span class="text-[9px] md:text-[10px] font-black uppercase tracking-[0.4em]">Premium Edition</span>
                    </div>
                    <h3 class="text-4xl md:text-6xl font-black text-white tracking-tighter uppercase italic leading-none mb-2">Signature</h3>
                    <p class="text-[10px] md:text-[11px] font-bold text-sky-200/40 uppercase tracking-[0.5em]">Pilihan Utama Mempelai</p>
                </div>

                <div class="mb-12 md:mb-16 text-left">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-sm md:text-lg font-bold text-white/30 line-through italic">Rp 150rb</span>
                        <span class="px-2 py-0.5 rounded-md bg-yellow-400 text-slate-900 text-[9px] md:text-[10px] font-black uppercase tracking-tighter">SAVE 50%</span>
                    </div>
                    <div class="flex items-baseline gap-1 md:gap-2">
                        <span class="text-lg md:text-xl font-black text-white opacity-20 italic">Rp</span>
                        <span class="text-7xl md:text-9xl font-black tracking-tighter text-white leading-none drop-shadow-2xl">75<span class="text-2xl md:text-3xl ml-1 text-yellow-300 italic font-black">RB</span></span>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 gap-4 md:gap-6 mb-12 md:mb-16 text-left">
                    <div v-for="(item, index) in features" :key="index" class="flex items-center gap-4 md:gap-5 cursor-default text-left">
                        <div class="flex-shrink-0 w-7 h-7 md:w-8 md:h-8 rounded-xl md:rounded-2xl bg-white/10 border border-white/20 flex items-center justify-center backdrop-blur-md group-hover:bg-yellow-400 group-hover:border-yellow-400 transition-all duration-300">
                            <i class="fas fa-check text-[9px] md:text-[10px] text-white group-hover:text-slate-900"></i>
                        </div>
                        <span class="text-[11px] md:text-[12px] font-black uppercase text-white tracking-widest group-hover:text-white transition-colors duration-300">{{ item }}</span>
                    </div>
                </div>
            </div>

            <button @click="onSelect" class="relative z-10 w-full py-6 md:py-8 rounded-[1.5rem] md:rounded-[2rem] bg-white text-blue-600 font-black text-[11px] md:text-[13px] uppercase tracking-[0.4em] md:tracking-[0.5em] hover:bg-yellow-400 hover:text-slate-900 shadow-2xl hover:scale-105 transition-all duration-500 italic active:scale-95">
                Ambil Paket Ini →
            </button>
        </div>
    </div>
</template>
