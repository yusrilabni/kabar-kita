<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
    invitation: Object,
});

const days = ref('00');
const hours = ref('00');
const minutes = ref('00');
const seconds = ref('00');

const updateCountdown = () => {
    const weddingDate = new Date(props.invitation.wedding_date).getTime();
    const now = new Date().getTime();
    const distance = weddingDate - now;

    if (distance < 0) {
        days.value = '00';
        hours.value = '00';
        minutes.value = '00';
        seconds.value = '00';
        return;
    }

    days.value = Math.floor(distance / (1000 * 60 * 60 * 24)).toString().padStart(2, '0');
    hours.value = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2, '0');
    minutes.value = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0');
    seconds.value = Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(2, '0');
};

onMounted(() => {
    updateCountdown();
    setInterval(updateCountdown, 1000);
});
</script>

<template>
    <section id="event" class="relative py-32 px-6 bg-[#450a0a] overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/royal-lineage.png')]"></div>
        
        <div class="max-w-6xl mx-auto space-y-24 relative z-10">
            <div class="text-center" data-aos="fade-up">
                <div class="w-10 h-10 border border-yellow-600/30 rounded-full flex items-center justify-center mx-auto text-yellow-600/50 text-xs mb-6 uppercase tracking-widest">IV</div>
                <h2 class="text-4xl md:text-6xl font-serif font-black text-yellow-500 uppercase tracking-[0.3em] mb-12">The Royal Celebration</h2>
                
                <!-- Countdown -->
                <div class="flex flex-wrap justify-center gap-6 md:gap-12">
                    <div v-for="(val, label) in { DAYS: days, HOURS: hours, MINUTES: minutes, SECONDS: seconds }" :key="label" class="flex flex-col items-center">
                        <div class="w-20 h-20 md:w-32 md:h-32 border-2 border-yellow-600/30 flex items-center justify-center mb-4 relative group">
                            <div class="absolute inset-2 border border-yellow-600/10 group-hover:border-yellow-600/30 transition-colors"></div>
                            <span class="text-3xl md:text-5xl font-serif text-yellow-500">{{ val }}</span>
                        </div>
                        <span class="text-[9px] md:text-[10px] text-yellow-600 font-black tracking-[0.4em] uppercase">{{ label }}</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-yellow-600/20 border border-yellow-600/20">
                <!-- Akad -->
                <div class="bg-[#450a0a] p-12 md:p-20 space-y-10" data-aos="fade-right">
                    <div class="space-y-4">
                        <span class="text-yellow-600 text-xs uppercase tracking-[0.5em] font-black">Holy Matrimony</span>
                        <h3 class="text-4xl font-serif text-yellow-500 uppercase tracking-widest italic">Akad Nikah</h3>
                    </div>
                    
                    <div class="space-y-6 border-l-2 border-yellow-600/30 pl-8">
                        <div class="space-y-1">
                            <p class="text-white text-xl font-serif italic">{{ new Date(invitation.akad_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                            <p class="text-yellow-600/80 font-black tracking-widest text-xs">{{ invitation.akad_time }}</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-white uppercase tracking-widest font-black text-sm">{{ invitation.akad_location }}</p>
                            <p class="text-white/60 text-xs leading-relaxed italic font-serif">{{ invitation.akad_address }}</p>
                        </div>
                    </div>

                    <a :href="invitation.akad_maps_embed" target="_blank" class="inline-block px-12 py-4 border border-yellow-600 text-yellow-500 text-[10px] font-black uppercase tracking-[0.4em] hover:bg-yellow-600 hover:text-[#450a0a] transition-all">
                        VIEW LOCATION
                    </a>
                </div>

                <!-- Resepsi -->
                <div class="bg-[#450a0a] p-12 md:p-20 space-y-10 border-t md:border-t-0 md:border-l border-yellow-600/20" data-aos="fade-left">
                    <div class="space-y-4">
                        <span class="text-yellow-600 text-xs uppercase tracking-[0.5em] font-black">Grand Reception</span>
                        <h3 class="text-4xl font-serif text-yellow-500 uppercase tracking-widest italic">Resepsi</h3>
                    </div>
                    
                    <div class="space-y-6 border-l-2 border-yellow-600/30 pl-8">
                        <div class="space-y-1">
                            <p class="text-white text-xl font-serif italic">{{ new Date(invitation.reception_date).toLocaleDateString('id-ID', { weekday:'long', day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
                            <p class="text-yellow-600/80 font-black tracking-widest text-xs">{{ invitation.reception_time }}</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-white uppercase tracking-widest font-black text-sm">{{ invitation.reception_location }}</p>
                            <p class="text-white/60 text-xs leading-relaxed italic font-serif">{{ invitation.reception_address }}</p>
                        </div>
                    </div>

                    <a :href="invitation.reception_maps_embed" target="_blank" class="inline-block px-12 py-4 border border-yellow-600 text-yellow-500 text-[10px] font-black uppercase tracking-[0.4em] hover:bg-yellow-600 hover:text-[#450a0a] transition-all">
                        VIEW LOCATION
                    </a>
                </div>
            </div>

            <div v-if="invitation.streaming_link" class="text-center py-20 border-y border-yellow-600/20" data-aos="fade-up">
                <h3 class="text-2xl font-serif text-yellow-500 uppercase tracking-[0.3em] mb-8">Virtual Celebration</h3>
                <p class="text-white/60 font-serif italic mb-10 max-w-xl mx-auto">Kami mengundang Bapak/Ibu/Saudara/i untuk menyaksikan momen bahagia kami secara virtual melalui siaran langsung.</p>
                <a :href="invitation.streaming_link" target="_blank" class="inline-flex items-center gap-4 px-12 py-4 bg-yellow-600 text-[#450a0a] text-[10px] font-black uppercase tracking-[0.4em] hover:bg-yellow-500 transition-all">
                    <i class="fab fa-youtube text-lg"></i>
                    JOIN LIVE STREAM
                </a>
            </div>
        </div>
    </section>
</template>
