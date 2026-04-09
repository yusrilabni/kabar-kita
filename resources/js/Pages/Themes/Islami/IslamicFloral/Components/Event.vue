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
    <section id="event" class="py-32 px-10 bg-[#86A36E] text-white rounded-t-[5rem] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/arabesque-glipple.png')]"></div>
        <div class="max-w-6xl mx-auto space-y-32 relative z-10">
            <div class="flex justify-center gap-6" data-aos="zoom-in">
                <div v-for="(val, label) in { HARI: days, JAM: hours, MENIT: minutes, DETIK: seconds }" :key="label" class="w-20 h-24 md:w-28 md:h-32 border border-white/30 rounded-t-full rounded-b-xl flex flex-col items-center justify-center bg-white/10 backdrop-blur-md">
                    <span class="text-3xl md:text-5xl font-bold">{{ val }}</span>
                    <span class="text-[9px] font-bold uppercase tracking-widest mt-2 opacity-60">{{ label }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="bg-white/10 backdrop-blur-xl p-12 rounded-[3rem] border border-white/20 text-center space-y-8 shadow-2xl text-white" data-aos="fade-right">
                    <h3 class="text-3xl font-serif italic border-b border-white/20 pb-6 uppercase tracking-widest">Akad Nikah</h3>
                    <div class="space-y-4">
                        <p class="text-sm font-bold uppercase tracking-[0.3em]">{{ new Date(invitation.akad_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                        <p class="text-lg font-bold">{{ invitation.akad_time }}</p>
                        <div class="space-y-1">
                            <p class="text-sm font-black">{{ invitation.akad_location }}</p>
                            <p class="text-xs opacity-80 leading-relaxed">{{ invitation.akad_address }}</p>
                        </div>
                    </div>
                    <a :href="invitation.akad_maps_embed" target="_blank" class="inline-block px-10 py-4 bg-white text-[#86A36E] rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg transition-all hover:bg-transparent hover:text-white hover:border border-white">Peta Lokasi</a>
                </div>
                <div class="bg-white/10 backdrop-blur-xl p-12 rounded-[3rem] border border-white/20 text-center space-y-8 shadow-2xl text-white" data-aos="fade-left">
                    <h3 class="text-3xl font-serif italic border-b border-white/20 pb-6 uppercase tracking-widest">Resepsi</h3>
                    <div class="space-y-4">
                        <p class="text-sm font-bold uppercase tracking-[0.3em]">{{ new Date(invitation.reception_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                        <p class="text-lg font-bold">{{ invitation.reception_time }}</p>
                        <div class="space-y-1">
                            <p class="text-sm font-black">{{ invitation.reception_location }}</p>
                            <p class="text-xs opacity-80 leading-relaxed">{{ invitation.reception_address }}</p>
                        </div>
                    </div>
                    <a :href="invitation.reception_maps_embed" target="_blank" class="inline-block px-10 py-4 bg-white text-[#86A36E] rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg transition-all hover:bg-transparent hover:text-white hover:border border-white">Peta Lokasi</a>
                </div>
            </div>
        </div>
    </section>
</template>
