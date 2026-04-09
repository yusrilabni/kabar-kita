<script setup>
defineProps({
    invitation: Object,
});
</script>

<template>
    <section id="rsvp" class="py-32 px-10 bg-[#2D4A22] text-white text-center rounded-t-[5rem] relative overflow-hidden">
        <div class="max-w-2xl mx-auto space-y-12 relative z-10" data-aos="zoom-in">
            <h2 class="text-5xl md:text-7xl font-['Great_Vibes'] leading-none italic">Konfirmasi Kehadiran</h2>
            <form class="space-y-4">
                <input type="text" placeholder="NAMA LENGKAP" class="w-full p-6 bg-white/10 border border-white/20 rounded-2xl focus:ring-1 focus:ring-white font-bold uppercase text-[10px] tracking-widest text-white placeholder-white/40">
                <select class="w-full p-6 bg-white/10 border border-white/20 rounded-2xl focus:ring-1 focus:ring-white font-bold uppercase text-[10px] tracking-widest text-white">
                    <option class="text-slate-900" value="1">SAYA AKAN HADIR</option>
                    <option class="text-slate-900" value="0">MAAF TIDAK BISA HADIR</option>
                </select>
                <textarea rows="4" placeholder="UCAPAN & DOA" class="w-full p-6 bg-white/10 border border-white/20 rounded-2xl focus:ring-1 focus:ring-white font-bold uppercase text-[10px] tracking-widest text-white placeholder-white/40"></textarea>
                <button type="button" class="w-full py-6 bg-white text-[#2D4A22] rounded-2xl font-black uppercase tracking-[0.3em] text-[10px] shadow-2xl transition-all hover:bg-[#86A36E] hover:text-white active:scale-95">Kirim</button>
            </form>
        </div>
    </section>
</template>
