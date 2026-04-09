<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from '@/Components/UI/Card.vue';
import Button from '@/Components/UI/Button.vue';
import { useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
    invitation: Object,
    themes: Array,
});

const form = useForm({
    bride_name: props.invitation.bride_name,
    bride_nickname: props.invitation.bride_nickname,
    groom_name: props.invitation.groom_name,
    groom_nickname: props.invitation.groom_nickname,
    theme_id: props.invitation.theme_id,
    wedding_date: props.invitation.wedding_date ? props.invitation.wedding_date.split('.')[0] : '', // Format for datetime-local
    location_name: props.invitation.location_name,
    location_address: props.invitation.location_address,
    location_maps_embed: props.invitation.location_maps_embed,
    music_url: props.invitation.music_url,
    slug: props.invitation.slug,
});

const submit = () => {
    form.put(route('invitation.update', props.invitation.id));
};
</script>

<template>
    <AppLayout title="Edit Invitation">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Invitation Builder</h2>
                <div class="flex gap-2">
                    <a :href="route('invitation.public', invitation.slug)" target="_blank">
                        <Button variant="outline">Live Preview</Button>
                    </a>
                </div>
            </div>
        </template>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Form Section -->
            <div class="lg:col-span-2 space-y-6">
                <form @submit.prevent="submit" class="space-y-6">
                    <Card>
                        <template #header>Detail Mempelai</template>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Pengantin Wanita</label>
                                <input v-model="form.bride_name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Panggilan (Wanita)</label>
                                <input v-model="form.bride_nickname" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Pengantin Pria</label>
                                <input v-model="form.groom_name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Panggilan (Pria)</label>
                                <input v-model="form.groom_nickname" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>
                    </Card>

                    <Card>
                        <template #header>Waktu & Lokasi Acara</template>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal & Waktu Pernikahan</label>
                                <input v-model="form.wedding_date" type="datetime-local" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Lokasi (Gedung/Rumah)</label>
                                <input v-model="form.location_name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea v-model="form.location_address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Google Maps Embed Code (Optional)</label>
                                <input v-model="form.location_maps_embed" type="text" placeholder="<iframe>...</iframe>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <p class="text-xs text-gray-500 mt-1">Hanya masukkan tag iframe dari Google Maps.</p>
                            </div>
                        </div>
                    </Card>

                    <Card>
                        <template #header>Pengaturan Tambahan</template>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pilih Tema</label>
                                <select v-model="form.theme_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option v-for="theme in themes" :key="theme.id" :value="theme.id">{{ theme.name }}</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Custom Music URL (YouTube/MP3)</label>
                                <input v-model="form.music_url" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>
                    </Card>

                    <div class="flex justify-end gap-4 pb-12">
                        <Link :href="route('invitation.index')">
                            <Button variant="secondary" type="button">Back</Button>
                        </Link>
                        <Button :disabled="form.processing">Save Changes</Button>
                    </div>
                </form>
            </div>

            <!-- Sidebar Info Section -->
            <div class="space-y-6">
                <Card>
                    <template #header>Status</template>
                    <div class="p-2">
                        <div class="flex items-center justify-between mb-4">
                            <span>Status Publikasi:</span>
                            <span :class="invitation.is_published ? 'text-green-600 font-bold' : 'text-red-600 font-bold'">
                                {{ invitation.is_published ? 'Published' : 'Draft' }}
                            </span>
                        </div>
                        <p class="text-xs text-gray-500">Undangan Anda hanya bisa diakses publik jika statusnya Published.</p>
                    </div>
                </Card>

                <Card>
                    <template #header>Share Link</template>
                    <div class="p-2 space-y-4">
                        <div class="bg-gray-50 p-2 rounded text-xs break-all border font-mono">
                            {{ route('invitation.public', invitation.slug) }}
                        </div>
                        <Button variant="outline" class="w-full text-xs" type="button">Copy Link</Button>
                        <a :href="`https://wa.me/?text=Halo! Kami mengundang Anda di acara pernikahan kami: ${route('invitation.public', invitation.slug)}`" target="_blank" class="block w-full text-center py-2 bg-green-500 hover:bg-green-600 text-white rounded-md text-xs font-bold transition">Share to WhatsApp</a>
                    </div>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
