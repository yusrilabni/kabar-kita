<script setup>
defineProps({
    invitation: Object,
});
</script>

<template>
    <section id="couple" class="py-24 px-6 bg-white">
        <div class="max-w-5xl mx-auto text-center">
            <div class="mb-20" data-aos="fade-up">
                <h2 class="text-5xl md:text-6xl font-['Great_Vibes'] text-[#B59C7D]">Mempelai</h2>
                <div class="w-16 h-[1px] bg-[#B59C7D] mx-auto mt-6"></div>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-center gap-16 md:gap-24 text-slate-800">
                <div class="text-center space-y-6" data-aos="fade-right">
                    <div class="w-56 h-56 mx-auto rounded-full p-2 border border-[#E8DFD1]">
                        <img :src="invitation.gallery?.[2]?.url" class="w-full h-full object-cover rounded-full" alt="Groom">
                    </div>
                    <div>
                        <h3 class="text-3xl font-['Great_Vibes'] mb-2">{{ invitation.groom_name }}</h3>
                        <p class="text-xs uppercase tracking-widest text-[#A89070] font-black mb-4">Putra dari</p>
                        <p class="text-sm font-bold opacity-70">{{ invitation.groom_parent_name }}</p>
                        <a v-if="invitation.groom_ig" :href="`https://instagram.com/${invitation.groom_ig}`" target="_blank" class="inline-block mt-4 text-[#B59C7D]"><i class="fab fa-instagram text-xl"></i></a>
                    </div>
                </div>
                <div class="text-5xl font-['Great_Vibes'] text-[#D4C3A3]">&</div>
                <div class="text-center space-y-6" data-aos="fade-left">
                    <div class="w-56 h-56 mx-auto rounded-full p-2 border border-[#E8DFD1]">
                        <img :src="invitation.gallery?.[3]?.url" class="w-full h-full object-cover rounded-full" alt="Bride">
                    </div>
                    <div>
                        <h3 class="text-3xl font-['Great_Vibes'] mb-2">{{ invitation.bride_name }}</h3>
                        <p class="text-xs uppercase tracking-widest text-[#A89070] font-black mb-4">Putri dari</p>
                        <p class="text-sm font-bold opacity-70">{{ invitation.bride_parent_name }}</p>
                        <a v-if="invitation.bride_ig" :href="`https://instagram.com/${invitation.bride_ig}`" target="_blank" class="inline-block mt-4 text-[#B59C7D]"><i class="fab fa-instagram text-xl"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
