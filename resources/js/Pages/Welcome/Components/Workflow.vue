<script setup>
defineProps({ alurKerja: Array });
</script>

<template>
    <section class="py-32 px-6 bg-slate-50 relative z-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div v-for="(step, i) in alurKerja" :key="i" class="p-10 rounded-[3rem] bg-white border border-slate-100 shadow-sm flex flex-col items-center space-y-6 group hover:shadow-xl transition-all duration-500" data-aos="zoom-in" :data-aos-delay="i * 150">
                <div class="w-20 h-20 rounded-full bg-slate-50 shadow-inner flex items-center justify-center text-2xl text-brand-primary font-black group-hover:bg-brand-primary group-hover:text-white transition-all duration-500">
                    {{ step.step }}
                </div>
                <div class="space-y-3 text-slate-800">
                    <h3 class="text-xl font-black text-slate-900 uppercase italic">{{ step.title }}</h3>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed uppercase tracking-tighter">{{ step.desc }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
