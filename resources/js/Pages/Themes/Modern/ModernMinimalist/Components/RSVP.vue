<script setup>
defineProps({
    invitation: Object,
});
</script>

<template>
    <section id="rsvp" class="py-40 px-10 bg-black text-white text-center overflow-hidden relative">
        <div class="max-w-3xl mx-auto space-y-16 relative z-10">
            <h2 class="text-7xl md:text-[10rem] font-black tracking-tighter uppercase leading-none" data-aos="zoom-out">Konfirmasi</h2>
            <form class="space-y-4">
                <input type="text" placeholder="NAMA LENGKAP" class="w-full p-8 bg-white/5 border-none focus:ring-1 focus:ring-brand-primary font-black uppercase text-xs tracking-[0.5em] text-white">
                <select class="w-full p-8 bg-white/5 border-none focus:ring-1 focus:ring-brand-primary font-black uppercase text-xs tracking-[0.5em] text-white">
                    <option class="bg-slate-900">AKAN HADIR</option>
                    <option class="bg-slate-900">TIDAK BISA HADIR</option>
                </select>
                <textarea rows="4" placeholder="UCAPAN & DOA" class="w-full p-8 bg-white/5 border-none focus:ring-1 focus:ring-brand-primary font-black uppercase text-xs tracking-[0.5em] text-white"></textarea>
                <button type="button" class="w-full py-8 bg-white text-black font-black uppercase tracking-[1em] text-xs hover:bg-brand-primary hover:text-white transition-all shadow-2xl active:scale-95">Kirim</button>
            </form>
        </div>
    </section>
</template>
