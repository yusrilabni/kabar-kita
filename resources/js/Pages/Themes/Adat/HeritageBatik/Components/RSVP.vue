<script setup>
defineProps({ invitation: Object });
</script>
<template>
    <section class="py-32 bg-[#1a0f0b] text-[#d4a373]">
        <div class="max-w-xl mx-auto px-6 text-center space-y-12">
            <h2 class="text-4xl font-serif italic" data-aos="fade-up">Konfirmasi Kehadiran</h2>
            <form class="space-y-6 text-left">
                <input type="text" placeholder="Nama Anda" class="w-full bg-[#2d1a12] border-none p-4 text-[#d4a373]">
                <select class="w-full bg-[#2d1a12] border-none p-4 text-[#d4a373]">
                    <option>Hadir</option>
                    <option>Tidak Hadir</option>
                </select>
                <textarea placeholder="Ucapan & Doa" class="w-full bg-[#2d1a12] border-none p-4 text-[#d4a373] h-32"></textarea>
                <button class="w-full py-4 bg-[#d4a373] text-[#1a0f0b] font-black uppercase tracking-widest italic">Kirim RSVP</button>
            </form>
        </div>
    </section>
</template>
