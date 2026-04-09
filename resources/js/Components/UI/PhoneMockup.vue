<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import PhoneCover from './Phone/PhoneCover.vue';
import PhoneContent from './Phone/PhoneContent.vue';
import PhoneWorkflow from './Phone/PhoneWorkflow.vue';

const props = defineProps({
    invitationTitle: { type: String, default: 'The Wedding Of' },
    coupleName: { type: String, default: 'Budi & Siti' },
    date: { type: String, default: 'Minggu, 12 Juli 2026' },
    location: { type: String, default: 'Jakarta, Indonesia' },
    image: { type: String, default: 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=400' },
    scale: { type: String, default: 'scale-100' }
});

const currentStep = ref(0);
let timer = null;

const startCycle = () => {
    timer = setInterval(() => {
        currentStep.value = (currentStep.value + 1) % 3;
    }, 6000); // Setiap slide tampil 6 detik
};

onMounted(() => startCycle());
onBeforeUnmount(() => clearInterval(timer));
</script>

<template>
    <div :class="['relative mx-auto w-[280px] h-[580px] sm:w-[320px] sm:h-[680px] bg-slate-900 rounded-[3.5rem] p-3 shadow-[0_50px_100px_-20px_rgba(0,0,0,0.3)] border-4 border-slate-800 animate-float transition-all duration-500 overflow-hidden', scale]">
        <!-- Dynamic Island -->
        <div class="absolute top-5 left-1/2 -translate-x-1/2 w-24 h-6 sm:w-28 sm:h-7 bg-black rounded-full z-[100] flex items-center justify-end px-4 gap-1">
            <div class="w-1 h-1 sm:w-1.5 sm:h-1.5 rounded-full bg-white/10"></div>
        </div>
        
        <div class="w-full h-full bg-[#fdfaf7] rounded-[2.8rem] overflow-hidden relative shadow-inner isolate mask-fix">
            <div class="absolute inset-0 rounded-[2.8rem] overflow-hidden bg-white">
                
                <Transition name="fade-slide">
                    <PhoneCover v-if="currentStep === 0" />
                    <PhoneContent v-else-if="currentStep === 1" 
                        :invitationTitle="invitationTitle"
                        :coupleName="coupleName"
                        :date="date"
                        :location="location"
                        :image="image"
                    />
                    <PhoneWorkflow v-else-if="currentStep === 2" />
                </Transition>

            </div>
            <!-- Border Overlay -->
            <div class="absolute inset-0 border-[4px] border-black/5 rounded-[2.8rem] pointer-events-none z-[110]"></div>
        </div>
    </div>
</template>

<style scoped>
@keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
.animate-float { animation: float 6s ease-in-out infinite; }

/* VUE TRANSITION: Smooth swap without white gaps */
.fade-slide-enter-active,
.fade-slide-leave-active {
    transition: all 1s cubic-bezier(0.4, 0, 0.2, 1);
    position: absolute;
    inset: 0;
}

.fade-slide-enter-from { opacity: 0; transform: scale(1.05); }
.fade-slide-leave-to { opacity: 0; transform: translateY(-100%); }

.mask-fix { -webkit-mask-image: -webkit-radial-gradient(white, black); mask-image: radial-gradient(white, black); transform: translateZ(0); }
.isolate { isolation: isolate; }
</style>
