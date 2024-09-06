/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                montserrat: ["Montserrat Alternates", "sans-serif"],
                baiJamjuree: ["Bai Jamjuree", "sans-serif"],
                fallinLove: ["Fall in love", "sans-serif"],
                popins: ["Poppins", "sans-serif"],
                kozuka: ["Kozuka Gothic", "sans-serif"],
            },
        },
    },
    plugins: [],
};
