<script setup>
import { ref } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Footer from '@/Components/Layout/Footer.vue';

defineProps({
    title: String,
});

const page = usePage();
const user = page.props.auth.user;
</script>

<template>
    <div class="min-h-screen bg-brand-bg font-sans selection:bg-brand-primary/20 text-brand-txt">
        <Head :title="title" />

        <!-- SIDEBAR -->
        <aside class="fixed left-0 top-0 h-screen w-72 bg-white border-r border-slate-200 hidden lg:flex flex-col z-50">
            <div class="p-10 mb-4 flex justify-center border-b border-slate-50">
                <Link href="/" class="transition-premium hover:scale-105 duration-500">
                    <ApplicationLogo class="h-12 w-auto" />
                </Link>
            </div>

            <nav class="flex-1 px-6 space-y-2 mt-8 overflow-y-auto">
                <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] px-4 mb-6">Menu Utama</div>
                
                <Link :href="route('dashboard')" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-premium font-bold text-sm uppercase tracking-tighter" :class="route().current('dashboard') ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'text-slate-500 hover:bg-slate-50 hover:text-brand-primary'">
                    <i class="fas fa-chart-pie text-lg"></i> Dashboard
                </Link>

                <Link :href="route('invitation.index')" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-premium font-bold text-sm uppercase tracking-tighter" :class="route().current('invitation.*') ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'text-slate-500 hover:bg-slate-50 hover:text-brand-primary'">
                    <i class="fas fa-envelope-open-text text-lg"></i> Undangan Saya
                </Link>

                <div v-if="user?.roles?.includes('affiliate')" class="pt-10">
                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] px-4 mb-6">Pemasaran</div>
                    <Link :href="route('affiliate.index')" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-premium font-bold text-sm uppercase tracking-tighter" :class="route().current('affiliate.*') ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'text-slate-500 hover:bg-slate-50 hover:text-brand-primary'">
                        <i class="fas fa-users text-lg"></i> Program Afiliasi
                    </Link>
                </div>

                <div v-if="user?.roles?.includes('admin')" class="pt-10">
                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] px-4 mb-6">Administrator</div>
                    <Link :href="route('admin.dashboard')" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-premium font-bold text-sm uppercase tracking-tighter" :class="route().current('admin.*') ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'text-slate-500 hover:bg-slate-50 hover:text-brand-primary'">
                        <i class="fas fa-shield-halved text-lg"></i> Admin Panel
                    </Link>
                </div>
            </nav>

            <div class="p-6">
                <div class="bg-brand-secondary p-6 rounded-[2rem] text-white shadow-xl relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 w-20 h-20 bg-brand-primary/20 rounded-full blur-2xl group-hover:scale-150 transition-premium"></div>
                    <div class="relative z-10 space-y-4">
                        <div class="text-[9px] font-black text-brand-primary uppercase tracking-widest opacity-80 italic">Status Paket</div>
                        <div class="text-xl font-bold tracking-tight uppercase italic leading-none">{{ user?.plan_type }}</div>
                        <button class="w-full bg-white text-brand-secondary py-3 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-brand-primary hover:text-white transition-premium">Upgrade</button>
                    </div>
                </div>
            </div>
        </aside>

        <!-- TOP BAR & CONTENT -->
        <div class="lg:ml-72 min-h-screen flex flex-col">
            <header class="h-24 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40 px-10 flex items-center justify-between">
                <div class="flex flex-col">
                    <h1 class="font-black text-xl text-brand-secondary tracking-tight uppercase">{{ title }}</h1>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Sistem Online</span>
                    </div>
                </div>

                <div class="flex items-center gap-8">
                    <button class="w-12 h-12 rounded-2xl hover:bg-slate-50 flex items-center justify-center text-slate-400 transition-premium duration-500">
                        <i class="far fa-bell text-xl"></i>
                    </button>

                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <button class="flex items-center gap-4 group text-left">
                                <div class="hidden sm:block">
                                    <div class="text-sm font-black text-brand-secondary group-hover:text-brand-primary transition-premium mb-0.5">{{ user?.name }}</div>
                                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Authorized Access</div>
                                </div>
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center text-brand-primary font-black border border-slate-200 group-hover:bg-brand-primary group-hover:text-white transition-premium">
                                    {{ user?.name?.charAt(0) }}
                                </div>
                            </button>
                        </template>

                        <template #content>
                            <div class="bg-white border border-slate-100 rounded-2xl shadow-2xl p-2 overflow-hidden min-w-[200px]">
                                <DropdownLink :href="route('profile.edit')" class="rounded-xl text-slate-600 hover:bg-slate-50 font-bold italic"> Profile Settings </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button" class="rounded-xl text-red-500 hover:bg-red-50 font-bold italic"> Log Out </DropdownLink>
                            </div>
                        </template>
                    </Dropdown>
                </div>
            </header>

            <main class="p-10 flex-1">
                <slot />
            </main>

            <Footer />
        </div>
    </div>
</template>

<style>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
</style>
