<script setup>
defineProps({
    invitation: Object,
});
</script>

<template>
    <section id="rsvp" class="py-32 px-6 bg-[#B59C7D] text-white text-center">
        <h2 class="text-5xl md:text-6xl font-['Great_Vibes'] mb-12" data-aos="fade-up">RSVP & Doa</h2>
        <form class="max-w-xl mx-auto space-y-6 text-left" data-aos="zoom-in">
            <input type="text" class="w-full bg-white/10 border border-white/30 rounded-xl px-4 py-4 text-white placeholder-white/40" placeholder="Nama Anda">
            <select class="w-full bg-white/10 border border-white/30 rounded-xl px-4 py-4 text-slate-800">
                <option value="1">Hadir</option>
                <option value="0">Tidak Hadir</option>
            </select>
            <textarea rows="4" class="w-full bg-white/10 border border-white/30 rounded-xl px-4 py-4 text-white placeholder-white/40" placeholder="Ucapan & Doa"></textarea>
            <button type="button" class="w-full py-5 bg-white text-[#B59C7D] rounded-xl font-black uppercase text-xs tracking-widest shadow-lg">Kirim</button>
        </form>
    </section>
</template>
