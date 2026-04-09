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
    AOS.init({ duration: 1000, once: true });
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
    <Head :title="`Pernikahan Adat ${invitation.bride_nickname} & ${invitation.groom_nickname}`" />
    
    <div class="bg-[#2d1a12] min-h-[100dvh] overflow-hidden selection:bg-[#d4a373]/30">
        <audio ref="audioPlayer" loop>
            <source :src="invitation.music_url" type="audio/mpeg">
        </audio>

        <MusicControl v-if="isOpened" :isPlaying="isPlaying" @toggle="toggleAudio" />

        <transition name="fade-adat">
            <Cover v-if="!isOpened" :invitation="invitation" :to="to" @open="openInvitation" />
        </transition>

        <main v-if="isOpened" class="relative text-[#d4a373]">
            <!-- Batik Global Texture Overlay -->
            <div class="fixed inset-0 opacity-[0.03] pointer-events-none z-0 bg-[url('https://www.transparenttextures.com/patterns/batik-fractal.png')]"></div>
            
            <Quote :invitation="invitation" />
            <Couple :invitation="invitation" />
            <Story :invitation="invitation" />
            <Event :invitation="invitation" />
            <Gallery :invitation="invitation" @select="(url) => selectedImage = url" />
            <Gifts :invitation="invitation" />
            <RSVP :invitation="invitation" />

            <footer class="py-24 bg-[#1a0f0b] text-center border-t border-[#d4a373]/20">
                <div class="space-y-6 relative z-10">
                    <p class="text-[10px] font-bold uppercase tracking-[0.5em] text-[#d4a373]/60">Melestarikan Tradisi Melalui</p>
                    <h2 class="text-3xl font-serif italic tracking-tighter text-[#d4a373] leading-none text-center">Kabar Kita <span class="text-white">Online</span></h2>
                    <p class="text-[9px] text-slate-500 uppercase tracking-widest leading-relaxed">Platform Undangan Digital Adat & Budaya</p>
                </div>
            </footer>
        </main>

        <transition name="fade">
            <div v-if="selectedImage" class="fixed inset-0 z-[200] bg-black/95 flex items-center justify-center p-4 md:p-10" @click="selectedImage = null">
                <img :src="selectedImage" class="max-w-full max-h-full object-contain border-8 border-[#2d1a12] shadow-2xl" alt="Preview">
            </div>
        </transition>
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200;0,900;1,200;1,900&family=Great+Vibes&display=swap');

.fade-adat-enter-active, .fade-adat-leave-active { transition: all 1.5s ease-in-out; }
.fade-adat-enter-from { opacity: 0; }
.fade-adat-leave-to { opacity: 0; transform: translateY(-50px) scale(1.05); filter: sepia(1); }

body { font-family: 'Figtree', sans-serif; scroll-behavior: smooth; }
h1, h2, h3 { font-family: 'Crimson Pro', serif; }
</style>
