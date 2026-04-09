<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Daftar Akun Baru" />

        <div class="mb-8 text-center">
            <h1 class="text-3xl font-black text-gray-900 mb-2 tracking-tight">Mulai Cerita Anda!</h1>
            <p class="text-gray-500 text-sm">Daftar sekarang dan buat momen spesial Anda tak terlupakan.</p>
        </div>

        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <InputLabel for="name" value="Nama Lengkap" class="text-xs font-bold uppercase tracking-widest text-gray-400" />
                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full border-gray-100 bg-gray-50/50 focus:bg-white rounded-2xl shadow-sm border-2"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Nama Anda"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" value="Email Address" class="text-xs font-bold uppercase tracking-widest text-gray-400" />
                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full border-gray-100 bg-gray-50/50 focus:bg-white rounded-2xl shadow-sm border-2"
                    v-model="form.email"
                    required
                    autocomplete="username"
                    placeholder="nama@email.com"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <InputLabel for="password" value="Password" class="text-xs font-bold uppercase tracking-widest text-gray-400" />
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full border-gray-100 bg-gray-50/50 focus:bg-white rounded-2xl shadow-sm border-2"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                        placeholder="••••••••"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div>
                    <InputLabel for="password_confirmation" value="Konfirmasi" class="text-xs font-bold uppercase tracking-widest text-gray-400" />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full border-gray-100 bg-gray-50/50 focus:bg-white rounded-2xl shadow-sm border-2"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="••••••••"
                    />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
            </div>

            <div class="pt-4">
                <PrimaryButton
                    class="w-full py-4 rounded-2xl bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 shadow-xl shadow-indigo-200 border-none flex justify-center text-lg font-black transition-all transform active:scale-95"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Daftar Sekarang
                </PrimaryButton>
            </div>
        </form>

        <div class="mt-10 text-center border-t border-gray-50 pt-8">
            <p class="text-gray-500 text-sm">
                Sudah punya akun? 
                <Link :href="route('login')" class="font-bold text-rose-500 hover:text-rose-600 underline underline-offset-4">
                    Masuk ke Akun
                </Link>
            </p>
        </div>
    </GuestLayout>
</template>
