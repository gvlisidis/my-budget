const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-red': '#E7717D',
                'custom-gray': '#C2CAD0',
                'custom-beige': '#C2B9B0',
                'custom-brown': '#7E685A',
                'custom-green': '#AFD275'
            },
            fontSize: {
                xxs: ['0.625rem', {lineHeight: '1rem'}],
                label: ['1.75rem', {lineHeight: '2,15rem'}]
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
