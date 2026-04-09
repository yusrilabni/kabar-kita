<template>
    <div class="bg-brand-surface overflow-hidden shadow-glow rounded-[2.5rem] border border-white/5">
        <div v-if="$slots.header" class="px-8 py-6 border-b border-white/5 font-black text-xl text-brand-txt-main uppercase italic tracking-tighter">
            <slot name="header" />
        </div>
        <div class="p-8 text-brand-txt-sub">
            <slot />
        </div>
        <div v-if="$slots.footer" class="px-8 py-6 bg-brand-dark-bg/50 border-t border-white/5">
            <slot name="footer" />
        </div>
    </div>
</template>
