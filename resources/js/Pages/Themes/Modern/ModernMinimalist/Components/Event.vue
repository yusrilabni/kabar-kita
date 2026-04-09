<script setup>
defineProps({
    invitation: Object,
    days: String,
    hours: String,
    minutes: String,
    seconds: String,
});
</script>

<template>
    <section id="event" class="py-40 px-10 bg-black text-white overflow-hidden relative">
        <div class="max-w-7xl mx-auto space-y-32 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="zoom-in">
                <div v-for="(val, label) in { HARI: days, JAM: hours, MENIT: minutes, DETIK: seconds }" :key="label" class="border border-white/20 p-8 flex flex-col items-center justify-center bg-white/5 backdrop-blur-sm">
                    <span class="text-5xl md:text-7xl font-black tracking-tighter">{{ val }}</span>
                    <span class="text-[9px] font-black tracking-[0.5em] opacity-40 mt-4">{{ label }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-white/10 border border-white/10 shadow-2xl">
                <div class="bg-black py-24 px-10 md:pr-24 space-y-10" data-aos="fade-right">
                    <h3 class="text-5xl font-black uppercase tracking-tighter italic text-brand-primary">Akad Nikah</h3>
                    <div class="space-y-6">
                        <p class="text-lg font-black text-white uppercase">{{ new Date(invitation.akad_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                        <p class="uppercase tracking-[0.2em] font-bold text-slate-400">{{ invitation.akad_time }}</p>
                        <div class="space-y-2">
                            <p class="uppercase tracking-widest font-black text-white">{{ invitation.akad_location }}</p>
                            <p class="uppercase tracking-widest text-xs leading-relaxed text-slate-500">{{ invitation.akad_address }}</p>
                        </div>
                    </div>
                    <a :href="invitation.akad_maps_embed" target="_blank" class="inline-block px-10 py-4 border border-brand-primary text-brand-primary text-[10px] font-black uppercase tracking-[0.5em] hover:bg-brand-primary hover:text-white transition-all">Peta Lokasi</a>
                </div>
                <div class="bg-black py-24 px-10 md:pl-24 space-y-10 border-t md:border-t-0 md:border-l border-white/10" data-aos="fade-left">
                    <h3 class="text-5xl font-black uppercase tracking-tighter italic text-brand-primary">Resepsi</h3>
                    <div class="space-y-6">
                        <p class="text-lg font-black text-white uppercase">{{ new Date(invitation.reception_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                        <p class="uppercase tracking-[0.2em] font-bold text-slate-400">{{ invitation.reception_time }}</p>
                        <div class="space-y-2">
                            <p class="uppercase tracking-widest font-black text-white">{{ invitation.reception_location }}</p>
                            <p class="uppercase tracking-widest text-xs leading-relaxed text-slate-500">{{ invitation.reception_address }}</p>
                        </div>
                    </div>
                    <a :href="invitation.reception_maps_embed" target="_blank" class="inline-block px-10 py-4 border border-brand-primary text-brand-primary text-[10px] font-black uppercase tracking-[0.5em] hover:bg-brand-primary hover:text-white transition-all">Peta Lokasi</a>
                </div>
            </div>
        </div>
    </section>
</template>
