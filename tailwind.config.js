const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/js/**/*.tsx',
  ],

  theme: {
    extend: {
      fontFamily: {
        body: ['"Source Sans Pro", sans-serif'],
        headings: ['"Nunito", sans-serif'],
      },
    },
  },

  plugins: [require('@tailwindcss/forms')],
};
