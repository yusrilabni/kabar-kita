<script setup>
defineProps({ invitation: Object });
</script>
<template>
    <section class="py-24 px-6 text-center bg-[#1a0f0b]">
        <div class="max-w-2xl mx-auto space-y-8" data-aos="fade-up">
            <div class="text-[#d4a373] text-4xl">"</div>
            <p class="text-lg md:text-xl italic leading-relaxed text-[#d4a373]/80">{{ invitation.quote }}</p>
            <div class="text-[#d4a373] text-4xl">"</div>
        </div>
    </section>
</template>
