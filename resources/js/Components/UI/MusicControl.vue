<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    isPlaying: Boolean,
});
defineEmits(['toggle']);
</script>

<template>
    <button @click="$emit('toggle')" class="fixed bottom-10 right-10 z-[90] w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-2xl transition-transform hover:scale-110 border border-slate-100 group">
        <div class="relative w-full h-full flex items-center justify-center">
            <!-- Ripple Effect when playing -->
            <div v-if="isPlaying" class="absolute inset-0 bg-brand-primary/20 rounded-full animate-ping"></div>
            <i class="fas text-brand-primary text-xl relative z-10" :class="isPlaying ? 'fa-music animate-spin-slow' : 'fa-volume-xmark text-slate-400'"></i>
        </div>
    </button>
</template>

<style scoped>
.animate-spin-slow {
    animation: spin 6s linear infinite;
}
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
</style>
