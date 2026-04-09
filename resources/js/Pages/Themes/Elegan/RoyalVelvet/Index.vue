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
    AOS.init({ duration: 1200, once: true });
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
    <Head :title="`The Royal Wedding: ${invitation.bride_nickname} & ${invitation.groom_nickname}`" />
    
    <div class="bg-[#450a0a] min-h-[100dvh] overflow-hidden selection:bg-yellow-500/30">
        <audio ref="audioPlayer" loop>
            <source :src="invitation.music_url" type="audio/mpeg">
        </audio>

        <MusicControl v-if="isOpened" :isPlaying="isPlaying" @toggle="toggleAudio" />

        <transition name="fade-royal">
            <Cover v-if="!isOpened" :invitation="invitation" :to="to" @open="openInvitation" />
        </transition>

        <main v-if="isOpened" class="relative bg-[#450a0a]">
            <!-- Border Mewah Global -->
            <div class="fixed inset-4 border border-yellow-600/30 pointer-events-none z-50"></div>
            
            <Quote :invitation="invitation" />
            <Couple :invitation="invitation" />
            <Story :invitation="invitation" />
            <Event :invitation="invitation" />
            <Gallery :invitation="invitation" @select="(url) => selectedImage = url" />
            <Gifts :invitation="invitation" />
            <RSVP :invitation="invitation" />

            <footer class="py-24 bg-[#2d0606] text-center border-t border-yellow-600/20">
                <div class="space-y-6">
                    <div class="w-12 h-12 border border-yellow-600 rounded-full flex items-center justify-center mx-auto text-yellow-600">⚜</div>
                    <h2 class="text-3xl font-serif tracking-[0.3em] text-yellow-500 uppercase leading-none">Kabar Kita <span class="text-white">Online</span></h2>
                    <p class="text-[10px] text-yellow-600/60 uppercase tracking-[0.5em]">Luxury Digital Experience</p>
                </div>
            </footer>
        </main>

        <transition name="fade">
            <div v-if="selectedImage" class="fixed inset-0 z-[200] bg-black/95 flex items-center justify-center p-4 md:p-10" @click="selectedImage = null">
                <img :src="selectedImage" class="max-w-full max-h-full object-contain border-4 border-yellow-600 shadow-2xl" alt="Preview">
            </div>
        </transition>
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Great+Vibes&display=swap');

.fade-royal-enter-active, .fade-royal-leave-active { transition: all 2s cubic-bezier(0.4, 0, 0.2, 1); }
.fade-royal-enter-from { opacity: 0; }
.fade-royal-leave-to { opacity: 0; transform: scale(1.1); filter: blur(20px); }

body { font-family: 'Figtree', sans-serif; scroll-behavior: smooth; }
h1, h2, h3, .font-royal { font-family: 'Cinzel', serif; }
</style>
