<template>
  <div class="workflow-container">
    <div class="bg-orb-1"></div>
    <div class="bg-orb-2"></div>
    <div class="bg-orb-3"></div>
    <div class="grid-overlay"></div>

    <div class="scroll-viewport no-scrollbar" ref="scrollContainer">
      <div class="steps-wrapper">
        <!-- Step 1 -->
        <div class="step-card" ref="step1">
          <div class="step-badge">01</div>
          <div class="visual-area text-center flex flex-col items-center">
            <div class="theme-stack mx-auto">
              <div class="theme-card theme-card-1"><div class="card-pattern"></div></div>
              <div class="theme-card theme-card-2"><div class="card-pattern"></div></div>
              <div class="theme-card theme-card-3"><div class="card-pattern"></div></div>
            </div>
            <div class="icon-circle palette-icon mx-auto">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
              </svg>
            </div>
            <h3 class="step-title font-black uppercase italic">Pilih Tema</h3>
            <p class="step-desc mx-auto text-center">Temukan desain yang sesuai dengan karakter pernikahan Anda</p>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="step-card" ref="step2">
          <div class="step-badge">02</div>
          <div class="visual-area text-center flex flex-col items-center">
            <div class="form-visual mx-auto">
              <div class="form-row"><div class="field-icon"></div><div class="field-line"></div></div>
              <div class="form-row"><div class="field-icon"></div><div class="field-line short"></div></div>
              <div class="form-row check-row"><div class="check-box"></div><div class="check-line"></div></div>
            </div>
            <div class="icon-circle edit-icon mx-auto">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
            </div>
            <h3 class="step-title font-black uppercase italic">Lengkapi Data</h3>
            <p class="step-desc mx-auto text-center">Isi detail mempelai, lokasi akad, resepsi, hingga galeri foto</p>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="step-card" ref="step3">
          <div class="step-badge">03</div>
          <div class="visual-area text-center flex flex-col items-center">
            <div class="share-visual mx-auto">
              <div class="whatsapp-bubble"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.123 9.123 0 01-3.132-.556c-1.282.833-3.021 1.556-4.743 1.806a.75.75 0 01-.729-.992c.234-.858.552-1.86.834-2.679C3.288 16.053 3 14.09 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" /></svg></div>
              <div class="ripple"></div><div class="ripple delay-1"></div>
            </div>
            <div class="icon-circle share-icon mx-auto text-green-400">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
              </svg>
            </div>
            <h3 class="step-title font-black uppercase italic">Sebarkan Link</h3>
            <p class="step-desc mx-auto text-center">Undangan siap dibagikan melalui WhatsApp dalam sekejap</p>
          </div>
        </div>
      </div>
    </div>

    <div class="scroll-indicator">
      <span class="dot" :class="{active: currentStep === 0}"></span>
      <span class="dot" :class="{active: currentStep === 1}"></span>
      <span class="dot" :class="{active: currentStep === 2}"></span>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'

const scrollContainer = ref(null)
const step1 = ref(null)
const step2 = ref(null)
const step3 = ref(null)
let scrollInterval = null
const currentStep = ref(0)
const steps = []

onMounted(() => {
  if (step1.value) steps.push(step1.value)
  if (step2.value) steps.push(step2.value)
  if (step3.value) steps.push(step3.value)
  startAutoScroll()
})

const startAutoScroll = () => {
  scrollInterval = setInterval(() => {
    currentStep.value = (currentStep.value + 1) % steps.length
    const targetStep = steps[currentStep.value]
    if (targetStep && scrollContainer.value) {
      scrollContainer.value.scrollTo({ top: targetStep.offsetTop - 40, behavior: 'smooth' })
    }
  }, 1500)
}

onBeforeUnmount(() => { if (scrollInterval) clearInterval(scrollInterval) })
</script>

<style scoped>
.workflow-container {
  position: absolute; inset: 0; background: radial-gradient(ellipse at 30% 20%, #0a0f2a, #030617);
  border-radius: 2.8rem; overflow: hidden;
}
.bg-orb-1, .bg-orb-2, .bg-orb-3 { position: absolute; border-radius: 50%; filter: blur(60px); opacity: 0.3; animation: float-orb 15s infinite alternate; }
.bg-orb-1 { width: 200px; height: 200px; background: #3b82f6; top: -40px; left: -40px; }
.bg-orb-2 { width: 250px; height: 250px; background: #a855f7; bottom: -60px; right: -60px; animation-delay: -5s; }
.bg-orb-3 { width: 180px; height: 180px; background: #ec4899; top: 40%; left: -30px; animation-delay: -10s; }
@keyframes float-orb { 0% { transform: translate(0,0); } 100% { transform: translate(15px,-15px); } }
.grid-overlay { position: absolute; inset: 0; background-image: linear-gradient(rgba(59,130,246,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.05) 1px, transparent 1px); background-size: 30px 30px; pointer-events: none; }
.scroll-viewport { position: relative; z-index: 10; height: 100%; overflow-y: auto; padding: 40px 16px; }
.steps-wrapper { display: flex; flex-direction: column; gap: 32px; padding-bottom: 80px; }
.step-card { position: relative; background: rgba(10, 15, 35, 0.7); backdrop-filter: blur(12px); border-radius: 28px; border: 1px solid rgba(59, 130, 246, 0.3); padding: 28px 16px; }
.step-badge { position: absolute; top: 12px; left: 16px; font-size: 10px; font-weight: 800; color: rgba(255,255,255,0.2); font-family: monospace; }
.visual-area { display: flex; flex-direction: column; align-items: center; text-align: center; }
.theme-stack { position: relative; width: 90px; height: 80px; margin-bottom: 12px; }
.theme-card { position: absolute; width: 60px; height: 75px; background: rgba(255,255,255,0.08); border-radius: 14px; border: 1px solid rgba(255,255,255,0.2); }
.card-pattern { width: 100%; height: 100%; background: repeating-linear-gradient(45deg, rgba(255,255,255,0.05) 0px, rgba(255,255,255,0.05) 5px, transparent 5px, transparent 10px); border-radius: 12px; }
.theme-card-1 { transform: rotate(-10deg) translateX(-10px); top: 0; left: 0; }
.theme-card-2 { transform: rotate(0deg); top: 4px; left: 15px; z-index: 2; border-color: #3b82f6; }
.theme-card-3 { transform: rotate(10deg) translateX(10px); top: 0; left: 30px; }
.icon-circle { width: 48px; height: 48px; background: rgba(59,130,246,0.15); border-radius: 24px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; color: #60a5fa; border: 1px solid rgba(59, 130, 246,0.2); }
.icon-circle svg { width: 24px; height: 24px; }
.step-title { font-size: 1.1rem; color: white; margin-bottom: 4px; font-weight: 800; }
.step-desc { font-size: 0.7rem; color: #94a3b8; max-width: 200px; line-height: 1.3; }
.form-visual { width: 150px; background: rgba(15,23,42,0.6); border-radius: 20px; padding: 10px; margin-bottom: 12px; }
.form-row { display: flex; align-items: center; gap: 6px; margin-bottom: 8px; }
.field-icon { width: 20px; height: 20px; background: rgba(96,165,250,0.2); border-radius: 6px; }
.field-line { flex: 1; height: 4px; background: #3b82f6; border-radius: 2px; opacity: 0.5; }
.field-line.short { width: 40px; flex: none; }
.check-box { width: 14px; height: 14px; border: 1px solid #10b981; border-radius: 4px; background: rgba(16,185,129,0.1); }
.check-line { width: 50px; height: 4px; background: #10b981; border-radius: 2px; }
.share-visual { position: relative; width: 80px; height: 80px; margin-bottom: 10px; }
.whatsapp-bubble { position: absolute; inset: 15px; background: #25D366; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 2; color: white; }
.whatsapp-bubble svg { width: 28px; height: 28px; }
.ripple { position: absolute; inset: 0; border-radius: 50%; background: rgba(37,211,102,0.2); animation: ripple 2s infinite; }
@keyframes ripple { 0% { transform: scale(0.8); opacity: 0.8; } 100% { transform: scale(1.3); opacity: 0; } }
.scroll-indicator { position: absolute; bottom: 16px; left: 0; right: 0; display: flex; justify-content: center; gap: 6px; z-index: 30; }
.scroll-indicator .dot { width: 4px; height: 4px; border-radius: 2px; background: rgba(255,255,255,0.2); transition: all 0.3s; }
.scroll-indicator .dot.active { width: 12px; background: #3b82f6; }
</style>
