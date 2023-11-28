/** @type {import('tailwindcss').Config} */
export default {
    content: ['./../resources/**/*.blade.php', './../resources/**/*.vue', './resources/**/*.blade.php', './resources/**/*.vue'],
    theme: {
        extend: {},
    },
    plugins: [require('@tailwindcss/forms')],
}
