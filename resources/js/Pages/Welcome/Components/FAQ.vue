<script setup>
defineProps({ faqs: Array });
</script>

<template>
    <section class="py-40 px-6 bg-white relative z-10 text-center border-t border-slate-100">
        <div class="max-w-4xl mx-auto space-y-24">
            <div class="space-y-4">
                <h2 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tighter uppercase italic leading-tight text-center">Tanya Jawab</h2>
                <div class="w-20 h-1.5 bg-brand-primary mx-auto rounded-full"></div>
            </div>
            <div class="space-y-6 text-left">
                <div v-for="(f, i) in faqs" :key="i" class="p-10 rounded-[2.5rem] bg-[#F8FAFC] border border-slate-100 group transition-all duration-500 hover:border-brand-primary/30 shadow-sm text-slate-800">
                    <h4 class="text-lg font-black text-brand-secondary uppercase tracking-tight italic mb-4 font-bold">{{ f.q }}</h4>
                    <p class="text-slate-500 font-medium text-sm leading-loose uppercase tracking-widest opacity-80">{{ f.a }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
