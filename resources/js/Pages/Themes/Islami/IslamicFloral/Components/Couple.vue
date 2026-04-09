<script setup>
defineProps({
    invitation: Object,
});
</script>

<template>
    <section id="couple" class="py-32 px-10 text-[#2D4A22] bg-[#FCF9F2]">
        <div class="max-w-5xl mx-auto text-center space-y-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
                <div class="space-y-8" data-aos="fade-right">
                    <div class="w-56 h-56 mx-auto rounded-t-[10rem] rounded-b-xl border-8 border-white shadow-xl overflow-hidden relative group">
                        <img :src="invitation.gallery?.[2]?.url" class="w-full h-full object-cover" alt="Mempelai Pria">
                    </div>
                    <div>
                        <h3 class="text-4xl font-['Great_Vibes'] mb-2">{{ invitation.groom_name }}</h3>
                        <p class="text-[10px] font-bold uppercase tracking-widest opacity-40 mb-4 text-[#86A36E]">Putra dari</p>
                        <p class="text-sm font-medium text-[#2D4A22]">{{ invitation.groom_parent_name }}</p>
                    </div>
                </div>
                <div class="space-y-8" data-aos="fade-left">
                    <div class="w-56 h-56 mx-auto rounded-t-[10rem] rounded-b-xl border-8 border-white shadow-xl overflow-hidden relative group">
                        <img :src="invitation.gallery?.[3]?.url" class="w-full h-full object-cover" alt="Mempelai Wanita">
                    </div>
                    <div>
                        <h3 class="text-4xl font-['Great_Vibes'] mb-2">{{ invitation.bride_name }}</h3>
                        <p class="text-[10px] font-bold uppercase tracking-widest opacity-40 mb-4 text-[#86A36E]">Putri dari</p>
                        <p class="text-sm font-medium text-[#2D4A22]">{{ invitation.bride_parent_name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
