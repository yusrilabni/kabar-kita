<script setup>
defineProps({ fiturUtama: Array });
</script>

<template>
    <section class="py-40 px-6 bg-white relative z-10 text-center">
        <div class="max-w-7xl mx-auto space-y-24">
            <div class="space-y-4">
                <h2 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tighter uppercase italic leading-tight text-center">Fitur Tanpa Batas</h2>
                <p class="text-brand-primary font-black uppercase text-xs tracking-[0.5em] text-center font-bold">Kualitas Terbaik di Setiap Detail</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 text-left">
                <div v-for="(f, i) in fiturUtama" :key="i" class="p-10 rounded-[3rem] bg-slate-50 border border-slate-100 group hover:bg-white hover:shadow-2xl transition-all duration-700 text-slate-800" data-aos="fade-up" :data-aos-delay="i * 100">
                    <div class="w-16 h-16 rounded-2xl bg-white shadow-sm flex items-center justify-center text-2xl text-brand-primary mb-8 group-hover:scale-110 transition-transform">
                        <i :class="f.icon"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4 uppercase italic tracking-tighter font-bold">{{ f.title }}</h3>
                    <p class="text-slate-500 font-medium text-sm leading-relaxed uppercase tracking-tighter opacity-80">{{ f.desc }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
