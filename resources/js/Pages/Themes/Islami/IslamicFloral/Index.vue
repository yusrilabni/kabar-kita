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
    <Head :title="`Undangan Pernikahan ${invitation.bride_nickname} & ${invitation.groom_nickname}`" />
    
    <div class="bg-[#FCF9F2] min-h-[100dvh] overflow-hidden selection:bg-[#86A36E]/20">
        <audio ref="audioPlayer" loop>
            <source :src="invitation.music_url" type="audio/mpeg">
        </audio>

        <!-- Musik Kontrol -->
        <MusicControl v-if="isOpened" :isPlaying="isPlaying" @toggle="toggleAudio" />

        <!-- Sampul Depan -->
        <transition name="fade-up">
            <Cover v-if="!isOpened" :invitation="invitation" :to="to" @open="openInvitation" />
        </transition>

        <!-- Konten Utama -->
        <main v-if="isOpened" class="relative">
            <Quote :invitation="invitation" />
            <Couple :invitation="invitation" />
            <Story :invitation="invitation" />
            <Event :invitation="invitation" />
            <Gallery :invitation="invitation" @select="(url) => selectedImage = url" />
            <Gifts :invitation="invitation" />
            <RSVP :invitation="invitation" />

            <!-- Footer Branding -->
            <footer class="py-20 bg-white text-center border-t border-[#86A36E]/10">
                <div class="space-y-4">
                    <p class="text-[10px] font-black uppercase tracking-[0.5em] text-[#86A36E]">Dibuat dengan penuh cinta oleh</p>
                    <h2 class="text-2xl font-black tracking-tighter text-slate-900 uppercase italic leading-none">Kabar Kita <span class="text-[#86A36E]">Online</span></h2>
                    <p class="text-[9px] text-slate-400 uppercase tracking-widest leading-relaxed">Platform Undangan Digital Premium & Eksklusif</p>
                </div>
            </footer>
        </main>

        <!-- Lightbox Galeri -->
        <transition name="fade">
            <div v-if="selectedImage" class="fixed inset-0 z-[200] bg-black/95 flex items-center justify-center p-4 md:p-10" @click="selectedImage = null">
                <img :src="selectedImage" class="max-w-full max-h-full object-contain shadow-2xl" alt="Preview">
                <button class="absolute top-10 right-10 text-white text-4xl">&times;</button>
            </div>
        </transition>
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');

.fade-up-enter-active, .fade-up-leave-active { transition: all 1.5s cubic-bezier(0.4, 0, 0.2, 1); }
.fade-up-enter-from { opacity: 0; transform: translateY(100px); }
.fade-up-leave-to { opacity: 0; transform: translateY(-100%); }

.fade-enter-active, .fade-leave-active { transition: opacity 0.5s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }

body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
</style>
