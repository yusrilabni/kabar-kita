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
    <Head :title="`Undangan ${invitation.bride_nickname} & ${invitation.groom_nickname}`" />
    
    <div class="bg-black min-h-[100dvh] text-white selection:bg-white selection:text-black">
        <audio ref="audioPlayer" loop>
            <source :src="invitation.music_url" type="audio/mpeg">
        </audio>

        <MusicControl v-if="isOpened" :isPlaying="isPlaying" @toggle="toggleAudio" />

        <transition name="fade-up">
            <Cover v-if="!isOpened" :invitation="invitation" :to="to" @open="openInvitation" />
        </transition>

        <main v-if="isOpened" class="relative">
            <Quote :invitation="invitation" />
            <Couple :invitation="invitation" />
            <Story :invitation="invitation" />
            <Event :invitation="invitation" />
            <Gallery :invitation="invitation" @select="(url) => selectedImage = url" />
            <Gifts :invitation="invitation" />
            <RSVP :invitation="invitation" />

            <footer class="py-20 bg-white text-black text-center italic">
                <div class="space-y-4">
                    <h2 class="text-4xl font-black tracking-tighter uppercase italic leading-none">Kabar Kita <span class="text-brand-primary">Online</span></h2>
                    <p class="text-[10px] font-bold uppercase tracking-[0.5em]">Premium Digital Invitation</p>
                </div>
            </footer>
        </main>

        <transition name="fade">
            <div v-if="selectedImage" class="fixed inset-0 z-[200] bg-black flex items-center justify-center p-4 md:p-10" @click="selectedImage = null">
                <img :src="selectedImage" class="max-w-full max-h-full object-contain border-[20px] border-white" alt="Preview">
            </div>
        </transition>
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,900;1,300;1,900&display=swap');
.fade-up-enter-active, .fade-up-leave-active { transition: all 1.2s cubic-bezier(0.7, 0, 0.3, 1); }
.fade-up-enter-from { transform: translateY(100%); }
.fade-up-leave-to { transform: translateY(-100%); }
body { font-family: 'Figtree', sans-serif; scroll-behavior: smooth; }
</style>
