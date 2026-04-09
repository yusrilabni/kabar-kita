<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from '@/Components/UI/Card.vue';
import Button from '@/Components/UI/Button.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    affiliate: Object,
    withdrawals: Array,
});

const withdrawalForm = useForm({
    amount: '',
    bank_info: {
        bank_name: '',
        account_number: '',
        account_name: '',
    }
});

const submitWithdrawal = () => {
    withdrawalForm.post(route('affiliate.withdraw'), {
        onSuccess: () => withdrawalForm.reset(),
    });
};
</script>

<template>
    <AppLayout title="Affiliate Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Affiliate Program</h2>
        </template>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <Card>
                <div class="text-xs text-gray-500 uppercase font-bold">Total Clicks</div>
                <div class="text-2xl font-bold">{{ affiliate.total_clicks }}</div>
            </Card>
            <Card>
                <div class="text-xs text-gray-500 uppercase font-bold">Total Registrations</div>
                <div class="text-2xl font-bold">{{ affiliate.total_registrations }}</div>
            </Card>
            <Card>
                <div class="text-xs text-gray-500 uppercase font-bold">Current Balance</div>
                <div class="text-2xl font-bold text-green-600">Rp {{ parseInt(affiliate.balance).toLocaleString() }}</div>
            </Card>
            <Card>
                <div class="text-xs text-gray-500 uppercase font-bold">Referral Code</div>
                <div class="text-xl font-mono font-bold text-indigo-600">{{ affiliate.referral_code }}</div>
            </Card>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Referral Link -->
            <div class="lg:col-span-2 space-y-6">
                <Card>
                    <template #header>Your Referral Link</template>
                    <div class="flex items-center gap-4">
                        <div class="flex-1 bg-gray-100 p-3 rounded border font-mono text-sm">
                            {{ $page.props.auth.user.app_url || 'https://kabarkita.online' }}/ref/{{ affiliate.referral_code }}
                        </div>
                        <Button variant="primary">Copy Link</Button>
                    </div>
                    <p class="mt-4 text-sm text-gray-600">Share this link to earn 20% commission on every premium plan purchase.</p>
                </Card>

                <Card>
                    <template #header>Withdrawal History</template>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="p-3">Date</th>
                                    <th class="p-3">Amount</th>
                                    <th class="p-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="w in withdrawals" :key="w.id" class="border-t">
                                    <td class="p-3">{{ new Date(w.created_at).toLocaleDateString() }}</td>
                                    <td class="p-3">Rp {{ parseInt(w.amount).toLocaleString() }}</td>
                                    <td class="p-3">
                                        <span class="px-2 py-1 rounded text-xs" 
                                              :class="w.status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'">
                                            {{ w.status }}
                                        </span>
                                    </td>
                                </tr>
                                <tr v-if="withdrawals.length === 0">
                                    <td colspan="3" class="p-3 text-center text-gray-500">No withdrawal history.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </Card>
            </div>

            <!-- Withdrawal Form -->
            <div>
                <Card>
                    <template #header>Request Withdrawal</template>
                    <form @submit.prevent="submitWithdrawal" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium">Amount (Min. 10,000)</label>
                            <input v-model="withdrawalForm.amount" type="number" class="mt-1 block w-full rounded-md border-gray-300" placeholder="Rp">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Bank Name</label>
                            <input v-model="withdrawalForm.bank_info.bank_name" type="text" class="mt-1 block w-full rounded-md border-gray-300" placeholder="BCA/Mandiri/BRI">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Account Number</label>
                            <input v-model="withdrawalForm.bank_info.account_number" type="text" class="mt-1 block w-full rounded-md border-gray-300">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Account Name</label>
                            <input v-model="withdrawalForm.bank_info.account_name" type="text" class="mt-1 block w-full rounded-md border-gray-300">
                        </div>
                        <Button class="w-full" :disabled="withdrawalForm.processing || affiliate.balance < 10000">Withdraw Funds</Button>
                    </form>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
