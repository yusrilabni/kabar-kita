<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import PhoneMockup from '@/Components/UI/PhoneMockup.vue';
defineProps({ demoThemeId: { type: Number, default: 1 } });
</script>

<template>
    <section class="relative min-h-screen flex items-center justify-center pt-24 md:pt-28 pb-20 px-6 overflow-hidden bg-slate-50">
        <!-- Animated Background -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-[-10%] left-[-10%] w-[600px] h-[600px] bg-blue-600/5 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-sky-400/5 rounded-full blur-[100px] animate-pulse"></div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center relative z-10 w-full">
            <div class="space-y-12 text-center lg:text-left order-1 lg:order-1">
                <div data-aos="fade-right" class="inline-flex items-center gap-3 px-6 py-2.5 rounded-full bg-white border border-slate-200 text-blue-600 text-[11px] font-black uppercase tracking-[0.3em] shadow-sm mx-auto lg:mx-0">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                    </span> 
                    Premium Digital Invitation
                </div>
                <h1 data-aos="fade-up" data-aos-delay="100" class="text-5xl md:text-8xl lg:text-[7.5rem] font-black text-slate-900 leading-[0.85] tracking-tighter uppercase italic">
                    Abadikan <br><span class="bg-gradient-to-r from-blue-600 to-sky-500 bg-clip-text text-transparent">Momen Indah.</span>
                </h1>
                <p data-aos="fade-up" data-aos-delay="200" class="text-lg md:text-xl text-slate-500 max-w-xl mx-auto lg:mx-0 leading-relaxed font-medium uppercase tracking-tighter">
                    Solusi undangan digital eksklusif dengan desain presisi dan fitur tercanggih untuk hari istimewa Anda.
                </p>
                <div data-aos="fade-up" data-aos-delay="300" class="flex flex-wrap gap-6 justify-center lg:justify-start">
                    <a :href="route('register')">
                        <button class="px-10 md:px-14 py-5 md:py-6 rounded-2xl bg-slate-900 text-white font-black text-xs md:text-sm uppercase tracking-widest hover:bg-blue-600 transition-all duration-500 shadow-2xl hover:-translate-y-1 italic">Mulai Buat Sekarang</button>
                    </a>
                    <a href="#katalog" class="px-8 md:px-10 py-5 md:py-6 rounded-2xl bg-white border border-slate-200 text-slate-900 font-black text-xs md:text-sm uppercase tracking-widest hover:bg-slate-50 transition-all italic">Lihat Katalog</a>
                </div>
            </div>

            <!-- RESPONSIVE CINEMATIC MOCKUP -->
            <div class="relative order-2 lg:order-2 flex justify-center items-center" data-aos="zoom-in" data-aos-delay="400">
                <!-- Visible on all devices now with responsive scaling -->
                <PhoneMockup 
                    class="scale-[0.75] sm:scale-90 lg:scale-110"
                    coupleName="Budi & Siti"
                    date="Minggu, 12 Juli 2026"
                />
                
                <!-- Decoration Elements -->
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-blue-600/10 rounded-full blur-3xl -z-10 hidden lg:block"></div>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Mockup internal animations moved to PhoneMockup.vue */
</style>
