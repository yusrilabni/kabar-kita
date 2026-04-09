<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from '@/Components/UI/Card.vue';
import Button from '@/Components/UI/Button.vue';
import { useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
    themes: Array,
});

const form = useForm({
    bride_name: '',
    groom_name: '',
    theme_id: '',
    wedding_date: '',
    slug: '',
});

const submit = () => {
    form.post(route('invitation.store'));
};
</script>

<template>
    <AppLayout title="Create Invitation">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create New Invitation</h2>
        </template>

        <div class="max-w-2xl mx-auto">
            <Card>
                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Bride Name</label>
                        <input v-model="form.bride_name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <div v-if="form.errors.bride_name" class="text-red-500 text-xs mt-1">{{ form.errors.bride_name }}</div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Groom Name</label>
                        <input v-model="form.groom_name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <div v-if="form.errors.groom_name" class="text-red-500 text-xs mt-1">{{ form.errors.groom_name }}</div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Wedding Date</label>
                        <input v-model="form.wedding_date" type="datetime-local" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <div v-if="form.errors.wedding_date" class="text-red-500 text-xs mt-1">{{ form.errors.wedding_date }}</div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Choose Theme</label>
                        <select v-model="form.theme_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="">Select a theme</option>
                            <option v-for="theme in themes" :key="theme.id" :value="theme.id">
                                {{ theme.name }} ({{ theme.category }})
                            </option>
                        </select>
                        <div v-if="form.errors.theme_id" class="text-red-500 text-xs mt-1">{{ form.errors.theme_id }}</div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Custom Slug (Optional)</label>
                        <div class="flex items-center mt-1">
                            <span class="text-gray-500 mr-2">kabarkita.online/</span>
                            <input v-model="form.slug" type="text" placeholder="yusril&fitri" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div v-if="form.errors.slug" class="text-red-500 text-xs mt-1">{{ form.errors.slug }}</div>
                    </div>

                    <div class="flex items-center justify-end">
                        <Link :href="route('invitation.index')" class="mr-4 text-sm text-gray-600 underline">Cancel</Link>
                        <Button :disabled="form.processing">Create Invitation</Button>
                    </div>
                </form>
            </Card>
        </div>
    </AppLayout>
</template>
