<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    canLogin: Boolean,
    transparent: {
        type: Boolean,
        default: false
    }
});

const page = usePage();
</script>

<template>
    <nav class="fixed top-0 left-0 right-0 z-[100] px-4 py-4 md:px-6 md:py-6 pointer-events-none">
        <div class="max-w-7xl mx-auto h-16 md:h-20 rounded-2xl md:rounded-[2rem] px-4 md:px-8 flex justify-between items-center pointer-events-auto transition-all duration-500 shadow-glass"
             :class="transparent ? 'bg-white/10 backdrop-blur-md border border-white/20' : 'bg-white/90 backdrop-blur-xl border border-slate-200'">
            
            <Link href="/" class="hover:scale-105 transition-all duration-500 shrink-0">
                <ApplicationLogo class="h-8 md:h-10 w-auto" />
            </Link>
            
            <div v-if="canLogin" class="flex gap-3 md:gap-8 items-center font-bold text-[10px] md:text-sm tracking-tight text-brand-secondary">
                <Link v-if="page.props.auth.user" :href="route('dashboard')" class="text-brand-primary group flex items-center gap-2 whitespace-nowrap">
                    Dashboard <i class="fas fa-arrow-right-long group-hover:translate-x-1 transition-all duration-500"></i>
                </Link>
                <template v-else>
                    <a :href="route('login')" class="hover:text-brand-primary transition-all duration-500 hidden sm:block">Masuk</a>
                    <a :href="route('register')">
                        <button class="px-4 py-2 md:px-8 md:py-3 rounded-xl md:rounded-2xl bg-brand-primary text-white shadow-glow hover:scale-105 active:scale-95 transition-all duration-500 whitespace-nowrap">Mulai Gratis</button>
                    </a>
                </template>
            </div>
        </div>
    </nav>
</template>
