<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from '@/Components/UI/Card.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    stats: Object,
});
</script>

<template>
    <AppLayout title="Admin Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Admin Overview</h2>
        </template>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <Card>
                <div class="text-xs text-gray-500 uppercase font-bold">Total Users</div>
                <div class="text-3xl font-bold">{{ stats.total_users }}</div>
            </Card>
            <Card>
                <div class="text-xs text-gray-500 uppercase font-bold">Premium Users</div>
                <div class="text-3xl font-bold text-yellow-600">{{ stats.premium_users }}</div>
            </Card>
            <Card>
                <div class="text-xs text-gray-500 uppercase font-bold">Total Transactions</div>
                <div class="text-3xl font-bold text-green-600">{{ stats.total_transactions }}</div>
            </Card>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <Card>
                <template #header>System Management</template>
                <div class="space-y-4">
                    <Link :href="route('admin.users')" class="block p-4 border rounded hover:bg-gray-50 transition">
                        <div class="font-bold">User Management</div>
                        <div class="text-xs text-gray-500">Manage plans, roles, and status.</div>
                    </Link>
                    <div class="block p-4 border rounded bg-gray-50 opacity-50 cursor-not-allowed">
                        <div class="font-bold">Theme Management</div>
                        <div class="text-xs text-gray-500">Add or edit wedding themes (Coming soon).</div>
                    </div>
                </div>
            </Card>

            <Card>
                <template #header>Recent Activity</template>
                <div class="text-sm text-gray-500 py-8 text-center italic">
                    Log aktivitas transaksi dan registrasi akan muncul di sini.
                </div>
            </Card>
        </div>
    </AppLayout>
</template>
