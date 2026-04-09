<script setup>
defineProps({
    invitation: Object,
});
</script>

<template>
    <section id="couple" class="py-40 px-10 relative bg-black/50 border-y border-white/5 overflow-hidden">
        <div class="max-w-7xl mx-auto space-y-40">
            <!-- Header -->
            <div class="flex flex-col items-center text-center space-y-4" data-aos="fade-up">
                <p class="text-[10px] font-black uppercase tracking-[1em] text-brand-primary">THE PROTAGONISTS / 02</p>
                <h2 class="text-6xl md:text-[10rem] font-black italic uppercase tracking-tighter leading-none">THE COUPLE</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
                <div class="space-y-12 relative" data-aos="fade-right">
                    <div class="aspect-[3/4] bg-slate-900 overflow-hidden shadow-[20px_20px_0px_rgba(37,99,235,0.2)] grayscale hover:grayscale-0 transition-all duration-1000 border border-white/10 group">
                        <img v-if="invitation.gallery?.[0]?.url" :src="invitation.gallery[0].url" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[2000ms]" alt="Mempelai Pria">
                    </div>
                    <div class="space-y-4 relative">
                        <div class="absolute -top-10 -left-10 text-[8rem] font-black italic text-white/[0.03] pointer-events-none select-none">GROOM</div>
                        <h3 class="text-5xl md:text-7xl font-black italic uppercase tracking-tighter leading-none text-white relative z-10">{{ invitation.groom_name }}</h3>
                        <p class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-500 relative z-10">Putra dari {{ invitation.groom_parent_name }}</p>
                    </div>
                </div>

                <div class="space-y-12 relative md:mt-60" data-aos="fade-left">
                    <div class="aspect-[3/4] bg-slate-900 overflow-hidden shadow-[-20px_20px_0px_rgba(37,99,235,0.2)] grayscale hover:grayscale-0 transition-all duration-1000 border border-white/10 group">
                        <img v-if="invitation.gallery?.[1]?.url" :src="invitation.gallery[1].url" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[2000ms]" alt="Mempelai Wanita">
                    </div>
                    <div class="space-y-4 relative text-right md:text-left">
                        <div class="absolute -top-10 -right-10 md:right-auto md:-left-10 text-[8rem] font-black italic text-white/[0.03] pointer-events-none select-none">BRIDE</div>
                        <h3 class="text-5xl md:text-7xl font-black italic uppercase tracking-tighter leading-none text-white relative z-10">{{ invitation.bride_name }}</h3>
                        <p class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-500 relative z-10">Putri dari {{ invitation.bride_parent_name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
