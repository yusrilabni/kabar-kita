<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from '@/Components/UI/Card.vue';
import Button from '@/Components/UI/Button.vue';
import { useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
    users: Array,
});

const planForm = useForm({
    plan_type: '',
    plan_expired_at: '',
});

const activeUserId = ref(null);

const updatePlan = (user) => {
    activeUserId.value = user.id;
    planForm.plan_type = user.plan_type;
    planForm.plan_expired_at = user.plan_expired_at ? user.plan_expired_at.split('T')[0] : '';
};

const submitPlan = (id) => {
    planForm.post(route('admin.users.plan', id), {
        onSuccess: () => activeUserId.value = null,
    });
};

import { ref } from 'vue';
</script>

<template>
    <AppLayout title="Manage Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">User Management</h2>
        </template>

        <Card>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="p-4 font-bold">Name & Email</th>
                            <th class="p-4 font-bold">Current Plan</th>
                            <th class="p-4 font-bold">Role</th>
                            <th class="p-4 font-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id" class="border-b hover:bg-gray-50">
                            <td class="p-4">
                                <div class="font-bold">{{ user.name }}</div>
                                <div class="text-gray-500 text-xs">{{ user.email }}</div>
                            </td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded-full text-xs font-bold uppercase"
                                      :class="user.plan_type === 'free' ? 'bg-gray-100 text-gray-600' : (user.plan_type === 'premium' ? 'bg-yellow-100 text-yellow-800' : 'bg-purple-100 text-purple-800')">
                                    {{ user.plan_type }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span v-for="role in user.roles" :key="role.id" class="mr-1 text-xs bg-indigo-50 text-indigo-700 px-2 py-1 rounded">
                                    {{ role.name }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div v-if="activeUserId === user.id" class="flex flex-col gap-2">
                                    <select v-model="planForm.plan_type" class="text-xs rounded border-gray-300">
                                        <option value="free">Free</option>
                                        <option value="premium">Premium</option>
                                        <option value="special">Special</option>
                                    </select>
                                    <input type="date" v-model="planForm.plan_expired_at" class="text-xs rounded border-gray-300">
                                    <div class="flex gap-2">
                                        <Button variant="primary" class="text-[10px]" @click="submitPlan(user.id)">Save</Button>
                                        <Button variant="secondary" class="text-[10px]" @click="activeUserId = null">Cancel</Button>
                                    </div>
                                </div>
                                <Button v-else variant="outline" class="text-xs" @click="updatePlan(user)">Update Plan</Button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </Card>
    </AppLayout>
</template>
