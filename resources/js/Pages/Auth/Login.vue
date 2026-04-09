<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Premium Login" />

        <div class="mb-10 text-center">
            <h1 class="text-3xl font-black text-white mb-2 tracking-tighter uppercase italic">Welcome Back</h1>
            <p class="text-text-secondary text-xs font-bold uppercase tracking-widest">Sign in to your elite account</p>
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <div>
                <InputLabel for="email" value="Identity (Email)" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-secondary ml-1" />
                <TextInput
                    id="email"
                    type="email"
                    class="mt-2 block w-full bg-dark-bg border-white/5 focus:border-primary/50 text-white rounded-2xl py-4"
                    v-model="form.email"
                    required
                    autofocus
                    placeholder="email@example.com"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="password" value="Secret Key" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-secondary ml-1" />
                <TextInput
                    id="password"
                    type="password"
                    class="mt-2 block w-full bg-dark-bg border-white/5 focus:border-primary/50 text-white rounded-2xl py-4"
                    v-model="form.password"
                    required
                    placeholder="••••••••"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex items-center justify-between px-1">
                <label class="flex items-center cursor-pointer group">
                    <Checkbox name="remember" v-model:checked="form.remember" class="bg-dark-bg border-white/10 text-primary rounded-md" />
                    <span class="ms-2 text-xs font-bold text-text-secondary group-hover:text-white transition-colors">Remember Me</span>
                </label>

                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-xs font-bold text-secondary hover:text-accent transition-colors"
                >
                    Lost Access?
                </Link>
            </div>

            <div class="pt-4">
                <button
                    class="w-full py-5 rounded-2xl bg-primary hover:bg-primary/80 text-white font-black uppercase tracking-[0.2em] text-sm shadow-glow transition-all active:scale-95 disabled:opacity-50"
                    :disabled="form.processing"
                >
                    Authenticate
                </button>
            </div>
        </form>

        <div class="mt-12 text-center pt-8 border-t border-white/5">
            <p class="text-text-secondary text-xs font-bold">
                New to the platform? 
                <Link :href="route('register')" class="text-white hover:text-accent underline decoration-primary underline-offset-8">
                    Create Elite Account
                </Link>
            </p>
        </div>
    </GuestLayout>
</template>
