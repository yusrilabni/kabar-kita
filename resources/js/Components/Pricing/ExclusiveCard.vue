<script setup>
defineProps({ onSelect: Function });
const features = [
    'Custom Domain (.com / .id)',
    'Fitur Premium Signature+',
    'Background Video Full HD',
    'RSVP & Check-in QR Code',
    'Manajemen Buku Tamu Digital',
    'Integrasi Payment Gateway',
    'Domain Aktif Selamanya',
    'Prioritas Antrian Support',
    'Background Musik Eksklusif'
];
</script>

<template>
    <div class="group relative h-full p-[1px] rounded-[2.5rem] md:rounded-[4.5rem] bg-slate-800 overflow-hidden transition-all duration-700 hover:-translate-y-4 md:hover:-translate-y-8">
        <!-- Animated Border Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-yellow-600 via-yellow-200 to-yellow-600 group-hover:animate-spin-slow opacity-30 group-hover:opacity-100 transition-opacity"></div>
        
        <div class="relative h-full p-8 md:p-12 rounded-[2.4rem] md:rounded-[4.4rem] bg-[#020617] overflow-hidden flex flex-col justify-between">
            <!-- Animated Spotlight -->
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_50%_0%,rgba(234,179,8,0.15)_0%,transparent_50%)] opacity-0 group-hover:opacity-100 transition-opacity duration-1000"></div>
            
            <span class="absolute top-4 md:top-8 right-8 md:right-12 text-7xl md:text-9xl font-black text-white/[0.02] italic group-hover:text-yellow-500/5 transition-colors duration-1000 select-none leading-none">03</span>

            <div class="relative z-10 flex-grow">
                <div class="mb-8 md:mb-12 text-left">
                    <div class="inline-flex items-center gap-3 px-4 py-1.5 md:px-6 md:py-2 rounded-xl md:rounded-2xl bg-yellow-500/10 border border-yellow-500/20 text-yellow-500 shadow-[0_0_20px_rgba(234,179,8,0.2)] mb-6 md:mb-8">
                        <i class="fas fa-gem animate-pulse text-[10px]"></i>
                        <span class="text-[9px] md:text-[11px] font-black uppercase tracking-[0.4em] md:tracking-[0.5em]">God Tier Edition</span>
                    </div>
                    <h3 class="text-4xl md:text-6xl font-black bg-gradient-to-r from-yellow-200 via-yellow-500 to-yellow-700 bg-clip-text text-transparent tracking-tighter uppercase italic leading-none mb-2">Infinite</h3>
                    <p class="text-[10px] md:text-[12px] font-bold text-slate-500 uppercase tracking-[0.5em] md:tracking-[0.6em]">The Ultimate Masterpiece</p>
                </div>

                <div class="mb-12 md:mb-16 text-left">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-sm md:text-lg font-bold text-white/20 line-through italic">Rp 200rb</span>
                        <span class="px-2 py-0.5 rounded-md bg-blue-600 text-white text-[9px] md:text-[10px] font-black uppercase tracking-tighter">BEST VALUE</span>
                    </div>
                    <div class="flex items-baseline gap-1 md:gap-2">
                        <span class="text-lg md:text-2xl font-black text-yellow-600/40 italic">Rp</span>
                        <span class="text-7xl md:text-9xl font-black tracking-tighter text-white drop-shadow-[0_0_40px_rgba(234,179,8,0.4)] leading-none">100<span class="text-2xl md:text-3xl ml-1 text-yellow-500 italic font-black">RB</span></span>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 gap-4 md:gap-6 mb-12 md:mb-16 text-left text-slate-400">
                    <div v-for="(item, index) in features" :key="index" class="flex items-center gap-4 md:gap-5 cursor-default">
                        <div class="flex-shrink-0 w-7 h-7 md:w-9 md:h-9 rounded-xl md:rounded-2xl bg-yellow-500/5 border border-yellow-500/10 flex items-center justify-center group-hover:bg-yellow-500 group-hover:border-yellow-400 group-hover:rotate-[15deg] transition-all duration-500">
                            <i class="fas fa-check text-[10px] md:text-[11px] text-yellow-500 group-hover:text-slate-900"></i>
                        </div>
                        <span class="text-[11px] md:text-[13px] font-black uppercase tracking-widest group-hover:text-white transition-colors duration-500">{{ item }}</span>
                    </div>
                </div>
            </div>

            <button @click="onSelect" class="relative z-10 w-full py-6 md:py-8 rounded-[1.5rem] md:rounded-[2.5rem] bg-gradient-to-r from-yellow-600 via-yellow-400 to-yellow-600 text-slate-900 font-black text-[11px] md:text-[14px] uppercase tracking-[0.4em] md:tracking-[0.5em] hover:shadow-[0_20px_60px_rgba(234,179,8,0.5)] hover:scale-105 transition-all duration-500 italic active:scale-95 shadow-2xl">
                Buka Semua Akses →
            </button>
        </div>
    </div>
</template>

<style scoped>
.animate-spin-slow {
    animation: spin 8s linear infinite;
}
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
</style>
