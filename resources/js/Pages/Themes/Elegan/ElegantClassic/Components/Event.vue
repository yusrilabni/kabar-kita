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
    <section id="event" class="py-32 px-6 bg-white text-slate-800">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-center text-5xl md:text-6xl font-['Great_Vibes'] text-[#B59C7D] mb-24" data-aos="fade-up">Rangkaian Acara</h2>
            <div class="flex justify-center gap-4 md:gap-8 mb-24" data-aos="zoom-in">
                <div v-for="(val, label) in { Hari: days, Jam: hours, Menit: minutes, Detik: seconds }" :key="label" class="w-20 h-20 md:w-28 md:h-28 rounded-full border border-[#D4C3A3] flex flex-col items-center justify-center bg-[#FDFBF7] shadow-inner">
                    <span class="text-2xl md:text-4xl font-serif text-[#5C5346]">{{ val }}</span>
                    <span class="text-[8px] md:text-xs uppercase tracking-widest text-[#A89070] font-black">{{ label }}</span>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="bg-[#FDFBF7] p-10 rounded-t-[10rem] rounded-b-3xl border border-[#E8DFD1] text-center shadow-lg" data-aos="fade-right">
                    <i class="fas fa-ring text-3xl text-[#B59C7D] mb-8"></i>
                    <h3 class="text-3xl font-serif italic text-[#5C5346] mb-6">Akad Nikah</h3>
                    <div class="space-y-4 mb-10 text-sm font-bold uppercase tracking-widest opacity-70">
                        <p>{{ new Date(invitation.akad_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                        <p>{{ invitation.akad_time }}</p>
                        <hr class="w-12 mx-auto border-[#D4C3A3]">
                        <p class="text-base text-[#5C5346]">{{ invitation.akad_location }}</p>
                        <p class="normal-case opacity-60">{{ invitation.akad_address }}</p>
                    </div>
                    <a :href="invitation.akad_maps_embed" target="_blank" class="inline-block px-8 py-3 bg-[#B59C7D] text-white rounded-full text-[10px] font-black uppercase tracking-widest">Buka Peta</a>
                </div>
                <div class="bg-white p-10 rounded-t-[10rem] rounded-b-3xl border border-[#E8DFD1] text-center shadow-2xl" data-aos="fade-left">
                    <i class="fas fa-glass-cheers text-3xl text-[#B59C7D] mb-8"></i>
                    <h3 class="text-3xl font-serif italic text-[#5C5346] mb-6">Resepsi</h3>
                    <div class="space-y-4 mb-10 text-sm font-bold uppercase tracking-widest opacity-70">
                        <p>{{ new Date(invitation.reception_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                        <p>{{ invitation.reception_time }}</p>
                        <hr class="w-12 mx-auto border-[#D4C3A3]">
                        <p class="text-base text-[#5C5346]">{{ invitation.reception_location }}</p>
                        <p class="normal-case opacity-60">{{ invitation.reception_address }}</p>
                    </div>
                    <a :href="invitation.reception_maps_embed" target="_blank" class="inline-block px-8 py-3 bg-[#B59C7D] text-white rounded-full text-[10px] font-black uppercase tracking-widest">Buka Peta</a>
                </div>
            </div>
            <div v-if="invitation.streaming_link" class="mt-16 text-center bg-[#FDFBF7] border border-[#D4C3A3] p-8 rounded-3xl" data-aos="fade-up">
                <i class="fas fa-video text-3xl text-[#B59C7D] mb-4"></i>
                <h3 class="text-xl font-black uppercase tracking-widest mb-4">Live Streaming</h3>
                <a :href="invitation.streaming_link" target="_blank" class="inline-block px-8 py-3 bg-red-600 text-white rounded-full text-[10px] font-black uppercase tracking-widest"><i class="fab fa-youtube mr-2"></i> Tonton Live</a>
            </div>
        </div>
    </section>
</template>
