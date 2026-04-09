<script setup>
import { computed } from 'vue';

const props = defineProps({
    invitation: Object,
});

const digitalGifts = computed(() => {
    try {
        return typeof props.invitation.digital_gifts === 'string' 
            ? JSON.parse(props.invitation.digital_gifts) 
            : props.invitation.digital_gifts || [];
    } catch (e) {
        return [];
    }
});

const copyToClipboard = (text) => {
    navigator.clipboard.writeText(text);
    alert('Nomor rekening berhasil disalin!');
};
</script>

<template>
    <section id="gifts" class="relative py-32 px-6 bg-[#450a0a] overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/royal-lineage.png')]"></div>
        
        <div class="max-w-4xl mx-auto space-y-24 relative z-10">
            <div class="text-center" data-aos="fade-up">
                <div class="w-10 h-10 border border-yellow-600/30 rounded-full flex items-center justify-center mx-auto text-yellow-600/50 text-xs mb-6 uppercase tracking-widest">VI</div>
                <h2 class="text-4xl md:text-6xl font-serif font-black text-yellow-500 uppercase tracking-[0.3em]">Wedding Gift</h2>
                <p class="mt-8 text-white/60 font-serif italic max-w-xl mx-auto">Doa restu Anda adalah kado terindah bagi kami. Namun, apabila Anda ingin memberikan tanda kasih, Anda dapat memberikannya secara digital.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div v-for="(gift, i) in digitalGifts" :key="i" 
                     class="relative group bg-[#450a0a] p-10 border border-yellow-600/20 hover:border-yellow-600/50 transition-all duration-700 overflow-hidden shadow-2xl" 
                     data-aos="fade-up">
                    
                    <div class="absolute top-0 right-0 w-32 h-32 border-t-2 border-r-2 border-yellow-600/10 pointer-events-none"></div>
                    
                    <div class="relative z-10 space-y-6">
                        <div class="flex items-center justify-between">
                            <h4 class="text-xs font-black uppercase tracking-[0.4em] text-yellow-600/80">{{ gift.bank }}</h4>
                            <div class="w-8 h-8 border border-yellow-600/30 rounded-full flex items-center justify-center text-yellow-600/30 text-[10px]">⚜</div>
                        </div>
                        
                        <div class="space-y-1">
                            <p class="text-3xl font-serif text-yellow-500 tracking-widest">{{ gift.no }}</p>
                            <p class="text-[10px] uppercase font-black text-white/40 tracking-[0.3em]">Account Name: <span class="text-white/80">{{ gift.name }}</span></p>
                        </div>

                        <button @click="copyToClipboard(gift.no)" class="w-full py-4 border border-yellow-600/30 text-yellow-600 text-[10px] font-black uppercase tracking-[0.3em] hover:bg-yellow-600 hover:text-[#450a0a] transition-all">
                            COPY NUMBER
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
