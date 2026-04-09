<script setup>
defineProps({ stats: Array });
</script>

<template>
    <section class="py-16 bg-white border-y border-slate-200 relative z-20 text-center">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-slate-100">
            <div v-for="(stat, i) in stats" :key="i" class="px-4" data-aos="fade-up" :data-aos-delay="i * 100">
                <div class="text-3xl md:text-5xl font-black text-brand-primary tracking-tighter">{{ stat.value }}</div>
                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-2">{{ stat.label }}</div>
            </div>
        </div>
    </section>
</template>
