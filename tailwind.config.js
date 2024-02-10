/** @type {import('tailwindcss').Config} */
export default {
    container: {
        center: true,
        padding: '2rem',
      },
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
