<script setup>
defineProps({
    variant: {
        type: String,
        default: 'default'
    }
});
</script>

<template>
    <div class="inline-flex items-center transition-all duration-300">
        <!-- Logo sourced from professional storage path -->
        <img 
            src="/storage/logo/logo.png" 
            alt="Kabar Kita" 
            v-bind="$attrs"
            class="relative z-10 drop-shadow-[0_4px_12px_rgba(59,130,246,0.15)]"
        >
    </div>
</template>
