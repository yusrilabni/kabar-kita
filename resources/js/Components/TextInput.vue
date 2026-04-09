<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="rounded-xl border border-white/10 bg-brand-surface text-brand-txt-main px-4 py-3 shadow-sm focus:border-brand-primary focus:ring-brand-primary placeholder:text-white/20 transition-all duration-300"
        v-model="model"
        ref="input"
    />
</template>
