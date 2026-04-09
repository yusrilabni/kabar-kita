<script setup>
defineProps({
    invitation: Object,
});
</script>

<template>
    <section id="couple" class="relative py-32 px-6 bg-[#450a0a] overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-px h-32 bg-gradient-to-b from-yellow-600/0 via-yellow-600/50 to-yellow-600/0"></div>
        
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-24" data-aos="fade-up">
                <div class="w-10 h-10 border border-yellow-600/30 rounded-full flex items-center justify-center mx-auto text-yellow-600/50 text-xs mb-6 uppercase tracking-widest">II</div>
                <h2 class="text-4xl md:text-6xl font-serif font-black text-yellow-500 uppercase tracking-[0.3em]">The Happy Couple</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
                <!-- Groom -->
                <div class="relative group" data-aos="fade-right">
                    <div class="relative w-72 h-96 mx-auto">
                        <div class="absolute inset-0 border-2 border-yellow-600 translate-x-4 translate-y-4 group-hover:translate-x-2 group-hover:translate-y-2 transition-transform"></div>
                        <img :src="invitation.gallery?.[2]?.url || '/images/placeholder.jpg'" class="relative w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" alt="Groom">
                        <div class="absolute inset-0 bg-yellow-600/10 mix-blend-overlay"></div>
                    </div>
                    <div class="mt-12 text-center md:text-right space-y-4">
                        <h3 class="text-3xl md:text-4xl font-serif text-yellow-500 uppercase tracking-widest">{{ invitation.groom_name }}</h3>
                        <div class="space-y-1">
                            <p class="text-[10px] text-yellow-600/60 uppercase tracking-[0.4em] font-black italic">Son of</p>
                            <p class="text-white/80 font-serif italic text-lg">{{ invitation.groom_parent_name }}</p>
                        </div>
                        <a v-if="invitation.groom_ig" :href="`https://instagram.com/${invitation.groom_ig}`" target="_blank" class="inline-flex items-center gap-3 text-yellow-600 hover:text-yellow-500 transition-colors">
                            <span class="text-[10px] uppercase tracking-[0.3em] font-black">@{{ invitation.groom_ig }}</span>
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Bride -->
                <div class="relative group" data-aos="fade-left">
                    <div class="relative w-72 h-96 mx-auto">
                        <div class="absolute inset-0 border-2 border-yellow-600 -translate-x-4 translate-y-4 group-hover:-translate-x-2 group-hover:translate-y-2 transition-transform"></div>
                        <img :src="invitation.gallery?.[3]?.url || '/images/placeholder.jpg'" class="relative w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" alt="Bride">
                        <div class="absolute inset-0 bg-yellow-600/10 mix-blend-overlay"></div>
                    </div>
                    <div class="mt-12 text-center md:text-left space-y-4">
                        <h3 class="text-3xl md:text-4xl font-serif text-yellow-500 uppercase tracking-widest">{{ invitation.bride_name }}</h3>
                        <div class="space-y-1">
                            <p class="text-[10px] text-yellow-600/60 uppercase tracking-[0.4em] font-black italic">Daughter of</p>
                            <p class="text-white/80 font-serif italic text-lg">{{ invitation.bride_parent_name }}</p>
                        </div>
                        <a v-if="invitation.bride_ig" :href="`https://instagram.com/${invitation.bride_ig}`" target="_blank" class="inline-flex items-center gap-3 text-yellow-600 hover:text-yellow-500 transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                            <span class="text-[10px] uppercase tracking-[0.3em] font-black">@{{ invitation.bride_ig }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
