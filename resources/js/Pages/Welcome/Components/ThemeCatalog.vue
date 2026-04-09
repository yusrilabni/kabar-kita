<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({ themes: Array });

const activeTab = ref('populer');
const activeCategory = ref('elegan');

const filteredThemes = computed(() => {
    if (!props.themes || props.themes.length === 0) return [];
    if (activeTab.value === 'populer') return props.themes.filter(t => t.is_premium).slice(0, 3);
    return props.themes.filter(t => t.category === activeCategory.value);
});
</script>

<template>
    <section id="katalog" class="py-48 px-6 bg-slate-900 rounded-[4rem] mx-4 md:mx-10 my-20 shadow-2xl relative overflow-hidden text-white">
        <div class="max-w-7xl mx-auto space-y-24 relative z-10">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-12">
                <div class="space-y-4 text-center lg:text-left">
                    <h2 class="text-5xl md:text-7xl font-black uppercase italic tracking-tighter">Koleksi Desain</h2>
                    <p class="text-slate-400 font-bold uppercase tracking-[0.4em] text-sm">Pratinjau iOS 100% Akurat</p>
                </div>
                
                <div class="flex flex-col items-center md:items-end gap-6 w-full md:w-auto">
                    <!-- Tab System Restored -->
                    <div class="bg-white/5 p-1.5 rounded-2xl border border-white/10 flex gap-2">
                        <button @click="activeTab = 'populer'" class="px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest transition-all" :class="activeTab === 'populer' ? 'bg-blue-600 text-white shadow-lg' : 'text-white/40 hover:text-white'">Paling Populer</button>
                        <button @click="activeTab = 'kategori'" class="px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest transition-all" :class="activeTab === 'kategori' ? 'bg-blue-600 text-white shadow-lg' : 'text-white/40 hover:text-white'">Berdasarkan Kategori</button>
                    </div>
                    
                    <!-- Sub-Categories - Hanya muncul jika tab kategori aktif -->
                    <transition name="fade">
                        <div v-if="activeTab === 'kategori'" class="flex flex-wrap justify-center md:justify-end gap-3">
                            <button v-for="cat in ['elegan', 'modern', 'islami', 'minimalis', 'adat']" :key="cat" @click="activeCategory = cat" 
                                class="px-5 py-2 rounded-full border border-white/10 font-bold text-[9px] uppercase tracking-widest transition-all"
                                :class="activeCategory === cat ? 'bg-white text-slate-900' : 'text-white/40 hover:border-white/30'">
                                {{ cat }}
                            </button>
                        </div>
                    </transition>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-24">
                <div v-for="tema in filteredThemes" :key="tema.id" class="flex flex-col items-center group">
                    <!-- Link pembungkus mockup - Menggunakan <a> biasa agar refresh halaman dan lebih ringan -->
                    <a :href="route('theme.preview', tema.id)" target="_blank" class="relative w-[300px] h-[640px] bg-slate-950 rounded-[3.5rem] p-2.5 shadow-2xl transition-all duration-700 group-hover:-translate-y-8 border border-white/10 ring-4 ring-black cursor-pointer">
                        
                        <!-- Dynamic Island (iPhone Style) -->
                        <div class="absolute top-4 left-1/2 -translate-x-1/2 w-28 h-7 bg-black rounded-full z-[110] border border-white/5 flex items-center justify-end px-4 gap-1">
                            <div class="w-1.5 h-1.5 rounded-full bg-white/10"></div>
                        </div>
                        
                        <!-- Screen Container -->
                        <div class="relative w-full h-full rounded-[2.8rem] overflow-hidden bg-white">
                            <!-- IFRAME UNTUK MEMAKSA TAMPILAN MOBILE (ANDROID) -->
                            <iframe 
                                :src="route('theme.preview', tema.id)" 
                                class="w-full h-full border-none pointer-events-none select-none"
                                scrolling="no"
                                loading="lazy"
                            ></iframe>
                            
                            <!-- Overlay Transparan agar klik tertangkap oleh link, bukan Iframe -->
                            <div class="absolute inset-0 z-[105]"></div>
                        </div>
                    </a>
                    <h4 class="mt-16 text-3xl font-black uppercase tracking-tighter italic text-white group-hover:text-blue-500 transition-colors">{{ tema.name }}</h4>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: all 0.3s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; transform: translateY(-10px); }

/* Menghilangkan scrollbar di iframe */
iframe::-webkit-scrollbar { display: none; }
</style>
