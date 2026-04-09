<script setup>
import { ref } from 'vue';

const props = defineProps({
    invitation: Object,
});

const form = ref({
    name: '',
    attendance: '1',
    message: '',
});

const submitRSVP = () => {
    // Logic for RSVP submission can be added here or handled by parent
    alert('Terima kasih atas konfirmasi Anda!');
};
</script>

<template>
    <section id="rsvp" class="relative py-32 px-6 bg-[#450a0a] overflow-hidden border-t border-yellow-600/20">
        <div class="absolute inset-0 opacity-5 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/royal-lineage.png')]"></div>
        
        <div class="max-w-3xl mx-auto space-y-24 relative z-10">
            <div class="text-center" data-aos="fade-up">
                <div class="w-10 h-10 border border-yellow-600/30 rounded-full flex items-center justify-center mx-auto text-yellow-600/50 text-xs mb-6 uppercase tracking-widest">VII</div>
                <h2 class="text-4xl md:text-6xl font-serif font-black text-yellow-500 uppercase tracking-[0.3em]">RSVP & Greetings</h2>
                <p class="mt-8 text-white/60 font-serif italic max-w-xl mx-auto">Kami sangat menantikan kehadiran Bapak/Ibu/Saudara/i untuk merayakan hari istimewa ini bersama kami.</p>
            </div>

            <form @submit.prevent="submitRSVP" class="space-y-8" data-aos="zoom-in">
                <div class="space-y-2 group">
                    <label class="text-[10px] text-yellow-600 font-black uppercase tracking-[0.4em] ml-2">Your Noble Name</label>
                    <input v-model="form.name" type="text" class="w-full bg-[#450a0a] border-b-2 border-yellow-600/20 focus:border-yellow-600 px-6 py-5 text-yellow-500 font-serif text-lg outline-none transition-all placeholder-yellow-600/30" placeholder="Enter your name...">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] text-yellow-600 font-black uppercase tracking-[0.4em] ml-2">Presence Status</label>
                    <select v-model="form.attendance" class="w-full bg-[#450a0a] border-b-2 border-yellow-600/20 focus:border-yellow-600 px-6 py-5 text-yellow-500 font-serif text-lg outline-none transition-all">
                        <option value="1">I will be honored to attend</option>
                        <option value="0">I regretfully cannot attend</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] text-yellow-600 font-black uppercase tracking-[0.4em] ml-2">Wishes & Prayers</label>
                    <textarea v-model="form.message" rows="5" class="w-full bg-[#450a0a] border-b-2 border-yellow-600/20 focus:border-yellow-600 px-6 py-5 text-yellow-500 font-serif text-lg outline-none transition-all placeholder-yellow-600/30" placeholder="Write your warm wishes here..."></textarea>
                </div>

                <button type="submit" class="w-full py-6 bg-yellow-600 text-[#450a0a] font-black uppercase text-xs tracking-[0.5em] hover:bg-yellow-500 transition-all shadow-[0_0_30px_rgba(202,138,4,0.2)]">
                    SEND RSVP
                </button>
            </form>
        </div>
    </section>
</template>
