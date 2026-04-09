<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed, onMounted } from 'vue'; 
import AOS from 'aos';
import 'aos/dist/aos.css';

import Navbar from '@/Components/Layout/Navbar.vue';
import Footer from '@/Components/Layout/Footer.vue';

// Pricing Components
import EssentialCard from '@/Components/Pricing/EssentialCard.vue';
import SignatureCard from '@/Components/Pricing/SignatureCard.vue';
import ExclusiveCard from '@/Components/Pricing/ExclusiveCard.vue';

// Welcome Components
import Hero from './Welcome/Components/Hero.vue';
import Stats from './Welcome/Components/Stats.vue';
import Workflow from './Welcome/Components/Workflow.vue';
import ThemeCatalog from './Welcome/Components/ThemeCatalog.vue';
import Features from './Welcome/Components/Features.vue';
import FAQ from './Welcome/Components/FAQ.vue';

const props = defineProps({
    canLogin: Boolean,
    themes: Array,
});

const activeTab = ref('populer');
const activeCategory = ref('elegan');

const allThemes = computed(() => {
    const defaultThemes = [
        { id: 1, name: 'Elegansi Klasik', category: 'elegan', style: 'classic', tag: 'Paling Populer', couple: 'Budi & Siti', img: 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=400', is_premium: true },
        { id: 2, name: 'Minimalis Modern', category: 'modern', style: 'modern-dark', tag: 'Edisi Elit', couple: 'BUDI & SITI', img: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=400', is_premium: true },
        { id: 3, name: 'Floral Islami', category: 'islami', style: 'islamic-floral', tag: 'Koleksi Suci', couple: 'Budi & Siti', img: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?q=80&w=400', is_premium: true },
        { id: 4, name: 'Royal Velvet', category: 'elegan', style: 'royal', tag: 'Mewah', couple: 'Budi & Siti', img: 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=400', is_premium: true },
        { id: 5, name: 'Urban Chic', category: 'modern', style: 'urban', tag: 'Trendi', couple: 'BUDI & SITI', img: 'https://images.unsplash.com/photo-1465495910483-0d6749ee9973?q=80&w=400', is_premium: true },
        { id: 8, name: 'Heritage Batik', category: 'adat', style: 'batik', tag: 'Tradisi', couple: 'Budi & Siti', img: 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=400', is_premium: true },
    ];
    return (props.themes && props.themes.length > 0) ? props.themes : defaultThemes;
});

const statsData = [
    { label: 'Undangan Terbit', value: '25.000+' },
    { label: 'Tamu Terundang', value: '2.8 Juta' },
    { label: 'Pilihan Tema', value: '120+' },
    { label: 'Tingkat Kepuasan', value: '4.9/5' }
];

const workflowData = [
    { step: '1', title: 'Daftar & Pilih Tema', desc: 'Temukan desain yang sesuai dengan karakter pernikahan Anda.' },
    { step: '2', title: 'Lengkapi Data', desc: 'Isi detail mempelai, lokasi akad, resepsi, hingga galeri foto.' },
    { step: '3', title: 'Sebarkan Link', desc: 'Undangan siap dibagikan melalui WhatsApp dalam sekejap.' },
];

const featuresData = [
    { title: 'Konfirmasi RSVP Cerdas', desc: 'Pantau daftar hadir tamu secara real-time langsung dari pusat kendali Anda.', icon: 'fas fa-check-double' },
    { title: 'Kisah Cinta & Galeri', desc: 'Bagikan perjalanan cinta dan foto-foto indah dalam galeri berkualitas tinggi.', icon: 'fas fa-heart-pulse' },
    { title: 'Hadiah Digital & Angpao', desc: 'Terima tanda kasih dari tamu melalui transfer bank atau dompet digital yang aman.', icon: 'fas fa-gift' },
    { title: 'Navigasi Lokasi Presisi', desc: 'Integrasi peta memudahkan tamu menemukan lokasi acara tanpa kendala.', icon: 'fas fa-map-location-dot' },
    { title: 'Link Siaran Langsung', desc: 'Sematkan link Zoom atau YouTube bagi kerabat yang berada jauh dari lokasi.', icon: 'fas fa-video' },
    { title: 'Musik Latar Romantis', desc: 'Ciptakan suasana romantis dengan pilihan musik pilihan saat undangan dibuka.', icon: 'fas fa-music' },
];

const faqsData = [
    { q: 'Apakah data bisa diubah setelah dipublish?', a: 'Tentu saja. Anda dapat memperbarui informasi acara, foto, dan musik kapan saja melalui dashboard Anda.' },
    { q: 'Bagaimana cara menyebarkan undangannya?', a: 'Sistem akan membuatkan link unik yang dapat Anda salin dan kirimkan langsung melalui WhatsApp.' },
    { q: 'Apakah musik otomatis terputar?', a: 'Ya, sistem kami mendukung auto-play sesuai kebijakan browser terbaru untuk pengalaman terbaik.' }
];

onMounted(() => {
    try {
        AOS.init({ duration: 1000, once: true });
    } catch (e) {
        console.warn("AOS skip");
    }
});
</script>

<template>
    <Head title="Solusi Undangan Digital Premium - Kabar Kita" />

    <div class="min-h-screen bg-white font-sans selection:bg-blue-600 selection:text-white overflow-x-hidden text-slate-800 text-left">
        <Navbar :canLogin="canLogin" />

        <main>
            <!-- 1. HERO -->
            <Hero />
            
            <!-- 2. SOCIAL PROOF -->
            <Stats :stats="statsData" />
            
            <!-- 3. ALUR KERJA -->
            <Workflow :alurKerja="workflowData" />
            
            <!-- 4. KATALOG TEMA -->
            <ThemeCatalog :themes="allThemes" />
            
            <!-- 5. FITUR UNGGULAN -->
            <Features :fiturUtama="featuresData" />
            
            <!-- 6. PAKET HARGA -->
            <section class="py-48 px-6 bg-slate-50 rounded-[4rem] mx-4 md:mx-10 my-20 shadow-sm text-center">
                <div class="max-w-7xl mx-auto space-y-24">
                    <div class="space-y-6">
                        <h2 class="text-4xl md:text-[5rem] font-black uppercase italic leading-none text-center text-slate-900">Investasi Kebahagiaan</h2>
                        <p class="text-slate-400 font-bold uppercase tracking-[0.5em] text-center">Pilih Paket Sesuai Visi Anda</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-stretch">
                        <EssentialCard />
                        <SignatureCard />
                        <ExclusiveCard />
                    </div>
                </div>
            </section>
            
            <!-- 7. FAQ -->
            <FAQ :faqs="faqsData" />
        </main>

        <Footer />
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,900;1,300;1,900&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
body { font-family: 'Figtree', sans-serif; scroll-behavior: smooth; }
@keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
.animate-float { animation: float 6s ease-in-out infinite; }
</style>
