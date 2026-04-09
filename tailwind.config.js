import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'brand-primary': '#2563EB',     /* Biru Elektrik Anda */
                'brand-secondary': '#1E293B',   /* Navy Gelap untuk kontras teks */
                'brand-bg': '#F1F5F9',          /* Abu-abu Mutiara (Clean & Modern) */
                'brand-surface': '#FFFFFF',
                'brand-txt': '#334155',         /* Slate Grey untuk teks */
            },
            boxShadow: {
                'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.07)',
                'premium': '0 20px 50px -12px rgba(0, 0, 0, 0.05)',
                'glow': '0 0 15px rgba(37, 99, 235, 0.15)',
            }
        },
    },

    plugins: [forms],
};
