<script setup>
defineProps({ invitation: Object });
</script>
<template>
    <section id="couple" class="py-32 px-6 bg-[#2d1a12] relative overflow-hidden">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-20 items-center text-[#d4a373]">
            <div class="text-center space-y-6" data-aos="fade-right">
                <h2 class="text-5xl font-serif italic">{{ invitation.bride_nickname }}</h2>
                <p class="text-sm uppercase tracking-widest">{{ invitation.bride_name }}</p>
                <p class="text-xs opacity-60">Putri dari {{ invitation.bride_parent_name }}</p>
            </div>
            <div class="text-center space-y-6" data-aos="fade-left">
                <h2 class="text-5xl font-serif italic">{{ invitation.groom_nickname }}</h2>
                <p class="text-sm uppercase tracking-widest">{{ invitation.groom_name }}</p>
                <p class="text-xs opacity-60">Putra dari {{ invitation.groom_parent_name }}</p>
            </div>
        </div>
    </section>
</template>
