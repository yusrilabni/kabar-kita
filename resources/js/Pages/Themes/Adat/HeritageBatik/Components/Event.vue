<script setup>
defineProps({ invitation: Object });
</script>
<template>
    <section id="event" class="py-32 bg-[#2d1a12] text-[#d4a373]">
        <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="p-12 border border-[#d4a373]/20 text-center space-y-6" data-aos="zoom-in">
                <h3 class="text-3xl font-serif italic">Akad Nikah</h3>
                <p class="text-sm uppercase tracking-widest">{{ invitation.akad_date }}</p>
                <p class="text-sm">{{ invitation.akad_time }}</p>
                <p class="font-bold">{{ invitation.akad_location }}</p>
                <p class="text-xs opacity-60">{{ invitation.akad_address }}</p>
            </div>
            <div class="p-12 border border-[#d4a373]/20 text-center space-y-6" data-aos="zoom-in">
                <h3 class="text-3xl font-serif italic">Resepsi</h3>
                <p class="text-sm uppercase tracking-widest">{{ invitation.reception_date }}</p>
                <p class="text-sm">{{ invitation.reception_time }}</p>
                <p class="font-bold">{{ invitation.reception_location }}</p>
                <p class="text-xs opacity-60">{{ invitation.reception_address }}</p>
            </div>
        </div>
    </section>
</template>
