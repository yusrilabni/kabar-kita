<script setup>
import { onMounted, ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AOS from 'aos';
import 'aos/dist/aos.css';

import MusicControl from '@/Components/UI/MusicControl.vue';
import LoadingScreen from '@/Components/UI/LoadingScreen.vue';
import Cover from './Components/Cover.vue';
import Quote from './Components/Quote.vue';
import Couple from './Components/Couple.vue';
import Story from './Components/Story.vue';
import Event from './Components/Event.vue';
import Gallery from './Components/Gallery.vue';
import Gifts from './Components/Gifts.vue';
import RSVP from './Components/RSVP.vue';

const props = defineProps({
    invitation: Object,
    to: String,
});

const isOpened = ref(false);
const selectedImage = ref(null);
const audioPlayer = ref(null);
const isPlaying = ref(true);

onMounted(() => {
    AOS.init({ duration: 800, once: true });
});

const openInvitation = () => {
    isOpened.value = true;
    if (audioPlayer.value) {
        audioPlayer.value.play();
        isPlaying.value = true;
    }
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
    <Head :title="`The Urban Wedding: ${invitation.bride_nickname} x ${invitation.groom_nickname}`" />
    
    <div class="bg-slate-950 min-h-[100dvh] overflow-hidden selection:bg-brand-primary selection:text-white">
        <audio ref="audioPlayer" loop>
            <source :src="invitation.music_url" type="audio/mpeg">
        </audio>

        <MusicControl v-if="isOpened" :isPlaying="isPlaying" @toggle="toggleAudio" />

        <transition name="fade-urban">
            <Cover v-if="!isOpened" :invitation="invitation" :to="to" @open="openInvitation" />
        </transition>

        <main v-if="isOpened" class="relative text-white">
            <!-- Neon Accent Background -->
            <div class="fixed top-0 left-0 w-full h-[500px] bg-brand-primary/10 blur-[150px] -z-10 pointer-events-none"></div>
            
            <Quote :invitation="invitation" />
            <Couple :invitation="invitation" />
            <Story :invitation="invitation" />
            <Event :invitation="invitation" />
            <Gallery :invitation="invitation" @select="(url) => selectedImage = url" />
            <Gifts :invitation="invitation" />
            <RSVP :invitation="invitation" />

            <footer class="py-32 bg-black text-center border-t border-white/10 overflow-hidden relative">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 text-[15rem] font-black text-white/[0.02] whitespace-nowrap leading-none">THE URBAN WEDDING</div>
                <div class="relative z-10 space-y-6">
                    <h2 class="text-5xl font-black italic tracking-tighter uppercase leading-none">Kabar Kita <span class="text-brand-primary">Online.</span></h2>
                    <p class="text-[10px] font-black uppercase tracking-[1em] text-slate-500">Crafted for the bold</p>
                </div>
            </footer>
        </main>

        <transition name="fade">
            <div v-if="selectedImage" class="fixed inset-0 z-[200] bg-black flex items-center justify-center p-4 md:p-10" @click="selectedImage = null">
                <img :src="selectedImage" class="max-w-full max-h-full object-contain grayscale hover:grayscale-0 transition-all duration-1000 shadow-[0_0_50px_rgba(37,99,235,0.3)]" alt="Preview">
            </div>
        </transition>
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,800;1,200;1,800&display=swap');

.fade-urban-enter-active, .fade-urban-leave-active { transition: all 1s cubic-bezier(0.8, 0, 0.2, 1); }
.fade-urban-enter-from { transform: translateX(100%); }
.fade-urban-leave-to { transform: translateX(-100%); filter: contrast(200%) brightness(0); }

body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
h1, h2, h3, .font-urban { font-weight: 800; font-style: italic; letter-spacing: -0.05em; }
</style>
