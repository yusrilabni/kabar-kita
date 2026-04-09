<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <footer class="py-16 px-6 bg-brand-bg border-t border-slate-200 relative z-10">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center gap-12">
            <!-- Left: Logo & Simple Desc -->
            <div class="space-y-4 max-w-xs">
                <ApplicationLogo class="h-10 w-auto opacity-90" />
                <p class="text-xs font-medium text-slate-500 leading-relaxed">
                    Platform layanan pembuatan undangan digital untuk berbagai kebutuhan acara Anda secara praktis dan modern.
                </p>
            </div>

            <!-- Middle: Social Connections -->
            <div class="flex gap-8">
                <a href="#" class="text-slate-300 hover:text-brand-primary transition-all duration-500"><i class="fab fa-instagram text-xl"></i></a>
                <a href="#" class="text-slate-300 hover:text-brand-primary transition-all duration-500"><i class="fab fa-whatsapp text-xl"></i></a>
                <a href="#" class="text-slate-300 hover:text-brand-primary transition-all duration-500"><i class="fab fa-tiktok text-xl"></i></a>
            </div>

            <!-- Right: Copyright -->
            <div class="text-left md:text-right">
                <p class="text-[10px] font-black text-brand-secondary uppercase tracking-[0.1em]">
                    &copy; {{ new Date().getFullYear() }} Kabar Kita.
                </p>
                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                    Seluruh Hak Cipta Dilindungi.
                </p>
            </div>
        </div>
    </footer>
</template>
