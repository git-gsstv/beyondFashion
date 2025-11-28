import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                beige: {
                    50: '#FCF9F6',
                    100: '#FBF6F0',
                    200: '#F7EEE2',
                    300: '#F3E6D3',
                    400: '#E9D3B8',
                    500: '#D9B996',
                    600: '#BFA076',
                    700: '#997A57',
                    800: '#7A5E42',
                    900: '#5E452F',
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};