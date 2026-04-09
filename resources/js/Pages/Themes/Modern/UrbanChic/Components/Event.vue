<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps({
    invitation: Object,
});

const days = ref('00');
const hours = ref('00');
const minutes = ref('00');
const seconds = ref('00');

let timer = null;

const startCountdown = () => {
    const targetDate = new Date(props.invitation.reception_date || props.invitation.akad_date).getTime();
    
    timer = setInterval(() => {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance < 0) {
            clearInterval(timer);
            return;
        }

        days.value = Math.floor(distance / (1000 * 60 * 60 * 24)).toString().padStart(2, '0');
        hours.value = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2, '0');
        minutes.value = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0');
        seconds.value = Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(2, '0');
    }, 1000);
};

onMounted(() => {
    startCountdown();
});

onUnmounted(() => {
    if (timer) clearInterval(timer);
});
</script>

<template>
    <section id="event" class="py-40 px-10 relative overflow-hidden bg-white text-slate-950">
        <!-- Background Text -->
        <div class="absolute top-0 left-0 w-full text-[20rem] font-black text-slate-100 whitespace-nowrap leading-none -translate-y-1/2 select-none pointer-events-none italic">
            SAVE THE DATE
        </div>

        <div class="max-w-7xl mx-auto space-y-40 relative">
            <!-- Countdown -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up">
                <div v-for="(val, label) in { DAYS: days, HOURS: hours, MINS: minutes, SECS: seconds }" :key="label" class="bg-slate-950 p-8 flex flex-col items-center justify-center group hover:bg-brand-primary transition-colors duration-500">
                    <span class="text-5xl md:text-8xl font-black italic tracking-tighter text-white">{{ val }}</span>
                    <span class="text-[10px] font-black tracking-[0.5em] text-brand-primary group-hover:text-slate-950 mt-4">{{ label }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
                <!-- Akad -->
                <div class="space-y-12" data-aos="fade-right">
                    <div class="flex items-center gap-6">
                        <div class="w-16 h-px bg-brand-primary"></div>
                        <p class="text-[10px] font-black uppercase tracking-[1em] text-brand-primary">THE CEREMONY / 01</p>
                    </div>
                    <div class="space-y-8">
                        <h3 class="text-5xl md:text-7xl font-black italic uppercase tracking-tighter leading-none">AKAD NIKAH</h3>
                        <div class="space-y-2">
                            <p class="text-2xl font-black uppercase italic">{{ new Date(invitation.akad_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                            <p class="text-lg font-bold text-slate-500 uppercase tracking-widest">{{ invitation.akad_time }}</p>
                        </div>
                        <div class="space-y-4">
                            <div class="p-6 bg-slate-100 border-l-4 border-brand-primary">
                                <p class="font-black uppercase tracking-tight text-xl mb-1">{{ invitation.akad_location }}</p>
                                <p class="text-sm font-medium text-slate-500 uppercase leading-relaxed">{{ invitation.akad_address }}</p>
                            </div>
                            <a :href="invitation.akad_maps_embed" target="_blank" class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[0.5em] text-brand-primary hover:gap-8 transition-all group">
                                GOOGLE MAPS <span class="group-hover:translate-x-2 transition-transform">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Resepsi -->
                <div class="space-y-12" data-aos="fade-left">
                    <div class="flex items-center gap-6">
                        <div class="w-16 h-px bg-brand-primary"></div>
                        <p class="text-[10px] font-black uppercase tracking-[1em] text-brand-primary">THE CELEBRATION / 02</p>
                    </div>
                    <div class="space-y-8">
                        <h3 class="text-5xl md:text-7xl font-black italic uppercase tracking-tighter leading-none">RESEPSI</h3>
                        <div class="space-y-2">
                            <p class="text-2xl font-black uppercase italic">{{ new Date(invitation.reception_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                            <p class="text-lg font-bold text-slate-500 uppercase tracking-widest">{{ invitation.reception_time }}</p>
                        </div>
                        <div class="space-y-4">
                            <div class="p-6 bg-slate-100 border-l-4 border-brand-primary">
                                <p class="font-black uppercase tracking-tight text-xl mb-1">{{ invitation.reception_location }}</p>
                                <p class="text-sm font-medium text-slate-500 uppercase leading-relaxed">{{ invitation.reception_address }}</p>
                            </div>
                            <a :href="invitation.reception_maps_embed" target="_blank" class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[0.5em] text-brand-primary hover:gap-8 transition-all group">
                                GOOGLE MAPS <span class="group-hover:translate-x-2 transition-transform">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
