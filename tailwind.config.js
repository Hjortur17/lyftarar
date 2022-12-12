const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Readex Pro", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: {
                    50: "#DCEEFB",
                    100: "#B6E0FE",
                    200: "#84C5F4",
                    300: "#62B0E8",
                    400: "#4098D7",
                    500: "#2680C2",
                    600: "#186FAF",
                    700: "#0F609B",
                    800: "#0A558C",
                    900: "#003E6B",
                },
                neutral: {
                    50: "#F7F7F7",
                    100: "#E1E1E1",
                    200: "#CFCFCF",
                    300: "#B1B1B1",
                    400: "#9E9E9E",
                    500: "#7E7E7E",
                    600: "#626262",
                    700: "#515151",
                    800: "#3B3B3B",
                    900: "#222222",
                },
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
