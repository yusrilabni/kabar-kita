<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    stats: Object,
});

const quickStats = [
    { label: 'Undangan Aktif', value: '03', icon: 'fas fa-envelope-open-text', color: 'text-blue-600', bg: 'bg-blue-50' },
    { label: 'Tamu Terdaftar', value: '1.240', icon: 'fas fa-users', color: 'text-indigo-600', bg: 'bg-indigo-50' },
    { label: 'Konfirmasi RSVP', value: '856', icon: 'fas fa-check-double', color: 'text-emerald-600', bg: 'bg-emerald-50' },
];
</script>

<template>
    <AppLayout title="Pusat Kendali">
        <div class="space-y-10 pb-20">
            <!-- HEADER WELCOME -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm">
                <div>
                    <h2 class="text-3xl font-black text-brand-secondary tracking-tighter uppercase italic">Halo, {{ $page.props.auth.user.name }}!</h2>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em] mt-2">Selamat datang kembali di sistem kendali premium Anda.</p>
                </div>
                <Link :href="route('invitation.create')">
                    <button class="px-8 py-4 rounded-2xl bg-brand-primary text-white font-black text-xs uppercase tracking-widest shadow-glow hover:scale-105 transition-premium">
                        <i class="fas fa-plus mr-2"></i> Buat Undangan
                    </button>
                </Link>
            </div>

            <!-- QUICK STATS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div v-for="stat in quickStats" :key="stat.label" class="p-8 rounded-[2.5rem] bg-white border border-slate-100 shadow-premium flex items-center gap-6 group hover:border-brand-primary transition-premium">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-2xl transition-premium group-hover:scale-110" :class="[stat.bg, stat.color]">
                        <i :class="stat.icon"></i>
                    </div>
                    <div>
                        <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">{{ stat.label }}</div>
                        <div class="text-3xl font-black text-brand-secondary tracking-tighter">{{ stat.value }}</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- MAIN ACTIONS -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xs font-black text-brand-secondary uppercase tracking-[0.4em] italic border-l-4 border-brand-primary pl-4">Aksi Strategis</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <Link :href="route('invitation.index')" class="group p-8 rounded-[2.5rem] bg-white border border-slate-100 shadow-premium hover:shadow-2xl transition-premium flex flex-col justify-between aspect-video">
                            <div class="w-12 h-12 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-brand-primary group-hover:text-white transition-premium">
                                <i class="fas fa-layer-group text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-black text-brand-secondary uppercase tracking-tighter italic mb-2">Semua Undangan</h4>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Kelola dan pantau semua aset Anda.</p>
                            </div>
                        </Link>

                        <div class="group p-8 rounded-[2.5rem] bg-white border border-slate-100 shadow-premium hover:shadow-2xl transition-premium flex flex-col justify-between aspect-video relative overflow-hidden">
                            <div class="w-12 h-12 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-indigo-600 group-hover:text-white transition-premium">
                                <i class="fas fa-chart-line text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-black text-brand-secondary uppercase tracking-tighter italic mb-2">Analitik Real-time</h4>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Pantau performa dan traffic undangan.</p>
                            </div>
                            <div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-slate-100 text-slate-400 text-[8px] font-black uppercase">Coming Soon</div>
                        </div>
                    </div>
                </div>

                <!-- PLAN STATUS -->
                <div class="space-y-8">
                    <h3 class="text-xs font-black text-brand-secondary uppercase tracking-[0.4em] italic">Status Lisensi</h3>
                    <div class="p-8 rounded-[3rem] bg-brand-secondary text-white shadow-2xl relative overflow-hidden group h-full flex flex-col justify-between">
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-brand-primary/20 rounded-full blur-3xl group-hover:scale-150 transition-premium"></div>
                        <div class="relative z-10 space-y-6">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-crown text-brand-primary text-2xl"></i>
                                <span class="text-[10px] font-black uppercase tracking-widest opacity-60 italic">Paket Saat Ini</span>
                            </div>
                            <div class="text-4xl font-black uppercase italic tracking-tighter leading-none">{{ $page.props.auth.user.plan_type }}</div>
                            <p class="text-xs text-slate-400 leading-relaxed font-bold uppercase tracking-tight">Nikmati akses tak terbatas ke semua fitur eksklusif kami.</p>
                        </div>
                        <button class="relative z-10 w-full bg-white text-brand-secondary py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-brand-primary hover:text-white transition-premium shadow-lg mt-10">Lihat Detail Paket</button>
                    </div>
                </div>
            </div>

            <!-- RECENT LOGS -->
            <div class="p-10 rounded-[3rem] bg-white border border-slate-100 shadow-premium">
                <div class="flex items-center justify-between mb-12">
                    <div class="space-y-1">
                        <h3 class="text-xs font-black text-brand-secondary uppercase tracking-[0.4em] italic">Log Aktivitas Terakhir</h3>
                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-[0.3em]">Update data sistem secara berkala</p>
                    </div>
                    <span class="px-4 py-2 bg-emerald-50 text-emerald-600 text-[9px] font-black uppercase tracking-widest rounded-full flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Sinkronisasi Aktif
                    </span>
                </div>
                
                <div class="divide-y divide-slate-50">
                    <div v-for="n in 4" :key="n" class="flex items-center justify-between py-6 group cursor-default transition-premium hover:px-4 hover:bg-slate-50 rounded-2xl">
                        <div class="flex items-center gap-8">
                            <div class="w-14 h-14 rounded-2xl bg-brand-bg flex items-center justify-center text-brand-primary border border-slate-100 transition-premium group-hover:bg-brand-primary group-hover:text-white shadow-sm">
                                <i class="fas fa-tower-broadcast"></i>
                            </div>
                            <div>
                                <div class="text-sm font-black text-brand-secondary uppercase tracking-tight italic">Tamu Baru Terdeteksi</div>
                                <div class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-[0.2em]">Source: Cloud Infrastructure</div>
                            </div>
                        </div>
                        <div class="text-[10px] font-black text-brand-primary uppercase bg-blue-50 px-4 py-2 rounded-full tracking-tighter">Aktif</div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
