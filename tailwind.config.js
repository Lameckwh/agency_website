const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',

        './resources/views/**/*.blade.php',
        './public/home/src/js/*.js',
        "./node_modules/flowbite/**/*.js"
    ],
  darkMode: 'class', // or 'media' or false
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree',  ...defaultTheme.fontFamily.sans],
            },
        },
        // fontFamily: {
        //     sans: ['Roboto Slab', 'serif']
        //   },
    },
    variants: {
        extend: {
           backgroundOpacity: ['dark']
        }
      },

    plugins: [require('@tailwindcss/forms'), require("daisyui"),   require('flowbite/plugin')],
     
};
