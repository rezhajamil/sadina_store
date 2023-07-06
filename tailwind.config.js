const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                premier: "#E3D3D4",
                primary: "#E3D3D4",
                sekunder: "#0D3B66",
                secondary: "#0D3B66",
                tersier: "#F95738",
                kuartener: "#1F2F16",
                primary: {
                    100: "#F4EBEB",
                    200: "#E9D2D3",
                    300: "#DDB8BB",
                    400: "#D19E9E",
                    500: "#C48382",
                    600: "#A7706E",
                    700: "#855D5A",
                    800: "#624A46",
                    900: "#3F3732",
                },
                secondary: {
                    100: "#5C7FA5",
                    200: "#356298",
                    300: "#0D3B66",
                    400: "#0A3157",
                    500: "#082746",
                    600: "#062035",
                    700: "#041824",
                    800: "#020C14",
                    900: "#000503",
                },
                tertiary: {
                    100: "#FEC9BE",
                    200: "#FEA48D",
                    300: "#FE7F5C",
                    400: "#FD5B2B",
                    500: "#F95738",
                    600: "#D54630",
                    700: "#AD3728",
                    800: "#832820",
                    900: "#5A1A18",
                },
                quaternary: {
                    100: "#7A8D6B",
                    200: "#677555",
                    300: "#555E3F",
                    400: "#43472A",
                    500: "#1F2F16",
                    600: "#1A2913",
                    700: "#141F0F",
                    800: "#0F170C",
                    900: "#0A0F08",
                },
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("tw-elements/dist/plugin"),
    ],
};
