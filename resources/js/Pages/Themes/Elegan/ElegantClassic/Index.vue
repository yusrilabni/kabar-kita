<script setup>
import { Head } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import Cover from './Components/Cover.vue';
import Quote from './Components/Quote.vue';
import Couple from './Components/Couple.vue';
import Story from './Components/Story.vue';
import Event from './Components/Event.vue';
import Gallery from './Components/Gallery.vue';
import Gifts from './Components/Gifts.vue';
import RSVP from './Components/RSVP.vue';
import MusicControl from '@/Components/UI/MusicControl.vue';
import LoadingScreen from '@/Components/UI/LoadingScreen.vue';
import AOS from 'aos';
import 'aos/dist/aos.css';

const props = defineProps({
    invitation: Object,
    to: String,
});

const isOpened = ref(false);
const showAllGallery = ref(false);
const selectedImg = ref(null);
const audioPlayer = ref(null);
const isPlaying = ref(true);

const days = ref('00');
const hours = ref('00');
const minutes = ref('00');
const seconds = ref('00');

const updateCountdown = () => {
    const weddingDate = new Date(props.invitation.wedding_date).getTime();
    const now = new Date().getTime();
    const distance = weddingDate - now;

    if (distance > 0) {
        days.value = Math.floor(distance / (1000 * 60 * 60 * 24)).toString().padStart(2, '0');
        hours.value = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2, '0');
        minutes.value = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0');
        seconds.value = Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(2, '0');
    }
};

onMounted(() => {
    AOS.init({ duration: 1000, once: true });
    updateCountdown();
    setInterval(updateCountdown, 1000);
});

const openInvitation = () => {
    isOpened.value = true;
    if (audioPlayer.value) {
        audioPlayer.value.play();
        isPlaying.value = true;
    }
    setTimeout(() => { AOS.refresh(); }, 100);
    window.scrollTo(0, 0);
};

const toggleAudio = () => {
    if (audioPlayer.value) {
        if (isPlaying.value) {
            audioPlayer.value.pause();
        } else {
            audioPlayer.value.play();
        }
        isPlaying.value = !isPlaying.value;
    }
};
</script>

<template>
    <LoadingScreen />
    <div class="min-h-[100dvh] bg-[#FDFBF7] text-[#5C5346] font-sans selection:bg-[#D4C3A3] selection:text-white overflow-x-hidden relative">
        <Head :title="`Pernikahan: ${invitation.bride_nickname} & ${invitation.groom_nickname}`" />
        
        <audio ref="audioPlayer" loop>
            <source :src="invitation.music_url" type="audio/mpeg">
        </audio>

        <!-- Standardized Music Control -->
        <MusicControl v-if="isOpened" :isPlaying="isPlaying" @toggle="toggleAudio" />

        <!-- Lightbox -->
        <transition name="fade">
            <div v-if="selectedImg" class="fixed inset-0 z-[200] bg-black/95 backdrop-blur-sm flex items-center justify-center p-4 cursor-zoom-out" @click="selectedImg = null">
                <img :src="selectedImg" class="max-w-5xl max-h-[90vh] object-contain rounded-sm" alt="Galeri">
            </div>
        </transition>

        <!-- COVER COMPONENT -->
        <transition name="slide-up">
            <Cover v-if="!isOpened" :invitation="invitation" :to="to" @open="openInvitation" />
        </transition>

        <!-- MAIN ORCHESTRATOR -->
        <main v-if="isOpened" class="relative pb-24 text-slate-800 text-left">
            <nav class="fixed bottom-6 left-1/2 -translate-x-1/2 z-[80] bg-white/90 backdrop-blur-md border border-[#E8DFD1] px-6 py-3 rounded-full shadow-2xl flex items-center gap-6 md:gap-10 text-[#A89070]">
                <a href="#hero" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-[#FDFBF7] transition-colors"><i class="fas fa-home"></i></a>
                <a href="#couple" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-[#FDFBF7] transition-colors"><i class="fas fa-heart"></i></a>
                <a href="#event" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-[#FDFBF7] transition-colors"><i class="fas fa-calendar-alt"></i></a>
                <a href="#gallery" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-[#FDFBF7] transition-colors"><i class="fas fa-images"></i></a>
                <a href="#rsvp" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-[#FDFBF7] transition-colors"><i class="fas fa-envelope"></i></a>
            </nav>

            <section id="hero" class="relative min-h-screen flex flex-col items-center justify-center text-center px-6 overflow-hidden">
                <div class="absolute inset-0 bg-black/30 z-10"></div>
                <div class="absolute inset-0 bg-cover bg-center bg-fixed scale-105 animate-kenburns" :style="`background-image: url('${invitation.gallery?.[1]?.url || 'https://images.unsplash.com/photo-1519741497674-611481863552'}');`"></div>
                <div class="relative z-20 space-y-8 max-w-2xl" data-aos="fade-up">
                    <p class="uppercase tracking-[0.5em] text-xs font-bold text-white italic">The Wedding Celebration Of</p>
                    <h2 class="text-7xl md:text-9xl font-['Great_Vibes'] text-white py-4 italic">{{ invitation.bride_nickname }} & {{ invitation.groom_nickname }}</h2>
                    <div class="inline-block px-8 py-3 border border-white/50 rounded-full text-white font-medium tracking-widest uppercase text-sm backdrop-blur-sm italic">
                        {{ new Date(invitation.wedding_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) }}
                    </div>
                </div>
            </section>

            <Quote :invitation="invitation" />
            <Couple :invitation="invitation" />
            <Story :invitation="invitation" />
            <Event :invitation="invitation" :days="days" :hours="hours" :minutes="minutes" :seconds="seconds" />
            <Gallery :invitation="invitation" :showAllGallery="showAllGallery" @showAll="showAllGallery = true" @select="(url) => selectedImg = url" />
            <Gifts :invitation="invitation" />
            <RSVP :invitation="invitation" />

            <footer class="py-16 text-center bg-[#FDFBF7] text-[#A89070]">
                <p class="font-['Great_Vibes'] text-4xl mb-4 italic">{{ invitation.bride_nickname }} & {{ invitation.groom_nickname }}</p>
                <p class="text-[9px] font-black uppercase tracking-[0.4em] opacity-60">Dibuat dengan penuh cinta oleh Kabar Kita</p>
            </footer>
        </main>
    </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');
.font-serif { font-family: 'Playfair Display', serif; }
.slide-up-leave-active { transition: all 1.2s cubic-bezier(0.77, 0, 0.175, 1); }
.slide-up-leave-to { transform: translateY(-100%); }
.fade-enter-active, .fade-leave-active { transition: opacity 0.5s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
.no-scrollbar::-webkit-scrollbar { display: none; }

@keyframes kenburns {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}
.animate-kenburns {
    animation: kenburns 20s infinite ease-in-out;
}
</style>
