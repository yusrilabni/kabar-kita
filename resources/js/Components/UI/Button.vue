<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    variant: {
        type: String,
        default: 'primary',
    }
});

const variants = {
    primary: 'bg-brand-primary hover:bg-brand-primary/80 text-white shadow-glow',
    secondary: 'bg-brand-surface hover:bg-white/5 text-brand-txt-sub border border-white/10',
    danger: 'bg-red-600 hover:bg-red-700 text-white shadow-lg',
    outline: 'bg-transparent border-2 border-brand-primary text-brand-primary hover:bg-brand-primary/10',
};
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center px-6 py-3 rounded-xl font-black text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-brand-primary focus:ring-offset-2 focus:ring-offset-brand-dark-bg transition ease-in-out duration-150 active:scale-95"
        :class="variants[variant]"
    >
        <slot />
    </button>
</template>
