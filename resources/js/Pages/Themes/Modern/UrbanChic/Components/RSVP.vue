<script setup>
defineProps({
    invitation: Object,
});
</script>

<template>
    <section id="rsvp" class="py-40 px-10 relative overflow-hidden bg-slate-950 text-white">
        <!-- Accent -->
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-brand-primary/5 blur-[200px] -z-10"></div>
        
        <div class="max-w-4xl mx-auto space-y-24 relative">
            <!-- Header -->
            <div class="flex flex-col items-center text-center space-y-4" data-aos="fade-down">
                <p class="text-[10px] font-black uppercase tracking-[1em] text-brand-primary">THE ATTENDANCE / 06</p>
                <h2 class="text-7xl md:text-[10rem] font-black italic uppercase tracking-tighter leading-[0.8]">RSVP</h2>
                <p class="text-sm font-medium uppercase tracking-widest text-slate-500 max-w-lg leading-relaxed mt-8">Konfirmasikan kehadiran Anda untuk melengkapi kebahagiaan kami.</p>
            </div>

            <form class="space-y-6" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-primary ml-1">Nama Lengkap</label>
                        <input type="text" placeholder="YOUR NAME" class="w-full p-6 bg-white/5 border border-white/10 focus:border-brand-primary focus:ring-0 font-black uppercase text-sm tracking-widest text-white transition-colors">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-primary ml-1">Konfirmasi Kehadiran</label>
                        <select class="w-full p-6 bg-white/5 border border-white/10 focus:border-brand-primary focus:ring-0 font-black uppercase text-sm tracking-widest text-white transition-colors appearance-none">
                            <option class="bg-slate-900">AKAN HADIR</option>
                            <option class="bg-slate-900">TIDAK BISA HADIR</option>
                        </select>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-brand-primary ml-1">Ucapan & Doa</label>
                    <textarea rows="4" placeholder="SEND YOUR BEST WISHES..." class="w-full p-6 bg-white/5 border border-white/10 focus:border-brand-primary focus:ring-0 font-black uppercase text-sm tracking-widest text-white transition-colors"></textarea>
                </div>
                
                <button type="button" class="group relative w-full py-8 bg-brand-primary text-slate-950 font-black uppercase tracking-[1em] text-xs hover:bg-white transition-all shadow-[0_0_50px_rgba(37,99,235,0.3)] hover:scale-[1.02] active:scale-95 italic">
                    CONFIRM ATTENDANCE
                </button>
            </form>
        </div>
    </section>
</template>
