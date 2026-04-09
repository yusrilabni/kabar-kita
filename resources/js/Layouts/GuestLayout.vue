<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-brand-dark-bg font-sans relative overflow-hidden">
        <!-- Background Glows -->
        <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-brand-primary/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[400px] h-[400px] bg-brand-secondary/10 rounded-full blur-[80px]"></div>

        <div data-aos="zoom-in" class="relative z-10">
            <Link href="/" class="flex flex-col items-center group">
                <ApplicationLogo class="h-24 w-auto transition-transform group-hover:scale-105 duration-500" />
            </Link>
        </div>

                <div class="w-full sm:max-w-md mt-10 px-10 py-12 bg-brand-surface border border-white/5 shadow-glow-lg sm:rounded-[2.5rem] relative z-10">
                <slot />
                </div>

                <div class="mt-12 text-[9px] font-black text-white/20 uppercase tracking-[0.4em] text-center relative z-10">
                &copy; {{ new Date().getFullYear() }} Kabar Kita. <br>            Crafted by <span class="text-brand-primary">Muh. Yusril Abni</span>
        </div>
    </div>
</template>
