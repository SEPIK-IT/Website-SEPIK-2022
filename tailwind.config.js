const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    prefix: 'tw-',
    important: ".tailwind",

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                serif: ['rutaban', ...defaultTheme.fontFamily.serif]
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
