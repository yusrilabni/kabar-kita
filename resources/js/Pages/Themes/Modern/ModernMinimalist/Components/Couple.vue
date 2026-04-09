<script setup>
defineProps({
    invitation: Object,
});
</script>

<template>
    <section id="couple" class="py-40 px-10 bg-white text-slate-800">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-20">
            <div class="space-y-16" data-aos="fade-right">
                <div class="aspect-[3/4] bg-gray-100 grayscale hover:grayscale-0 transition-all duration-1000 overflow-hidden border border-black/5 shadow-xl">
                    <img :src="invitation.gallery?.[2]?.url" class="w-full h-full object-cover" alt="Mempelai Pria">
                </div>
                <div class="space-y-4">
                    <h3 class="text-6xl font-black uppercase tracking-tighter leading-none text-slate-900">{{ invitation.groom_name }}</h3>
                    <p class="text-xs font-bold uppercase tracking-[0.5em] opacity-40">Putra dari {{ invitation.groom_parent_name }}</p>
                </div>
            </div>
            <div class="space-y-16 md:mt-40" data-aos="fade-left">
                <div class="aspect-[3/4] bg-gray-100 grayscale hover:grayscale-0 transition-all duration-1000 overflow-hidden border border-black/5 shadow-xl">
                    <img :src="invitation.gallery?.[3]?.url" class="w-full h-full object-cover" alt="Mempelai Wanita">
                </div>
                <div class="space-y-4">
                    <h3 class="text-6xl font-black uppercase tracking-tighter leading-none text-slate-900">{{ invitation.bride_name }}</h3>
                    <p class="text-xs font-bold uppercase tracking-[0.5em] opacity-40">Putri dari {{ invitation.bride_parent_name }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
