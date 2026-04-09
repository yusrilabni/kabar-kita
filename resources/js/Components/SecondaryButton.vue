<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center rounded-xl border border-white/10 bg-brand-surface px-6 py-3 text-xs font-black uppercase tracking-widest text-brand-txt-sub shadow-sm transition duration-150 ease-in-out hover:bg-white/5 focus:outline-none focus:ring-2 focus:ring-brand-primary focus:ring-offset-2 focus:ring-offset-brand-dark-bg disabled:opacity-25 active:scale-95"
    >
        <slot />
    </button>
</template>
