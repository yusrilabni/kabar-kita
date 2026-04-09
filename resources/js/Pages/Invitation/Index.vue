<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from '@/Components/UI/Card.vue';
import Button from '@/Components/UI/Button.vue';
import { Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    invitations: Array,
});

const form = useForm({});

const togglePublish = (id) => {
    form.post(route('invitation.publish', id));
};
</script>

<template>
    <AppLayout title="My Invitations">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">My Invitations</h2>
                <Link :href="route('invitation.create')">
                    <Button>Create New</Button>
                </Link>
            </div>
        </template>

        <div v-if="invitations.length === 0" class="text-center py-12">
            <Card>
                <p class="text-gray-500">You haven't created any invitations yet.</p>
                <Link :href="route('invitation.create')" class="mt-4 inline-block">
                    <Button variant="outline">Start Creating</Button>
                </Link>
            </Card>
        </div>

        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <Card v-for="item in invitations" :key="item.id">
                <template #header>
                    {{ item.bride_name }} & {{ item.groom_name }}
                </template>
                
                <div class="space-y-2 text-sm">
                    <p><span class="font-bold">Slug:</span> /{{ item.slug }}</p>
                    <p><span class="font-bold">Theme:</span> {{ item.theme.name }}</p>
                    <p><span class="font-bold">Status:</span> 
                        <span :class="item.is_published ? 'text-green-600' : 'text-red-600'">
                            {{ item.is_published ? 'Published' : 'Draft' }}
                        </span>
                    </p>
                </div>

                <template #footer>
                    <div class="flex justify-between gap-2">
                        <Link :href="route('invitation.edit', item.id)">
                            <Button variant="secondary" class="text-xs">Edit</Button>
                        </Link>
                        <a :href="route('invitation.public', item.slug)" target="_blank">
                            <Button variant="outline" class="text-xs">Preview</Button>
                        </a>
                        <Button 
                            @click="togglePublish(item.id)" 
                            :variant="item.is_published ? 'danger' : 'primary'"
                            class="text-xs"
                        >
                            {{ item.is_published ? 'Unpublish' : 'Publish' }}
                        </Button>
                    </div>
                </template>
            </Card>
        </div>
    </AppLayout>
</template>
