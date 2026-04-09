<script setup>
import { onMounted, ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const show = ref(true);
const fadeOut = ref(false);

onMounted(() => {
    // We give a small artificial delay to ensure everything is ready
    // and to show the beautiful animation
    setTimeout(() => {
        fadeOut.value = true;
        setTimeout(() => {
            show.value = false;
        }, 800);
    }, 1500);
});
</script>

<template>
    <transition name="fade">
        <div v-if="show" :class="['fixed inset-0 z-[999] flex flex-col items-center justify-center bg-white transition-opacity duration-700', fadeOut ? 'opacity-0' : 'opacity-100']">
            <!-- Animated Logo/Icon -->
            <div class="relative mb-12">
                <div class="w-24 h-24 border-2 border-blue-600/20 rounded-full animate-ping absolute inset-0"></div>
                <div class="w-24 h-24 border border-slate-100 rounded-full flex items-center justify-center relative bg-white shadow-xl z-10 p-6">
                    <img src="/storage/logo/favicon-96x96.png" class="w-full h-full object-contain" alt="Favicon" />
                </div>
            </div>

            <!-- Branding -->
            <div class="text-center space-y-4">
                <ApplicationLogo class="h-10 w-auto mx-auto" />
                <p class="text-[9px] text-slate-400 uppercase tracking-[0.6em] font-black animate-pulse">Menyiapkan Undangan Anda</p>
            </div>

            <!-- Progress Bar -->
            <div class="absolute bottom-24 left-1/2 -translate-x-1/2 w-40 h-[3px] bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-blue-600 animate-loading-bar shadow-[0_0_15px_rgba(37,99,235,0.4)]"></div>
            </div>
        </div>
    </transition>
</template>

<style scoped>
@keyframes loading-bar {
    0% { width: 0%; transform: translateX(-100%); }
    50% { width: 50%; transform: translateX(0%); }
    100% { width: 100%; transform: translateX(100%); }
}
.animate-loading-bar {
    animation: loading-bar 2s infinite ease-in-out;
}
</style>
