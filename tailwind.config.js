/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                // colores principales y sus complementarios
                colorPrincipal_1: '#e6b120',
                complementarioPrincipal_1_1: '#194edf',
                complementarioPrincipal_1_2: '#df1965',
                complementarioPrincipal_1_3: '#19df98',
                colorPrincipal_2: '#63155C',
                complementarioPrincipal_2_1: '#9ceaa3',
                complementarioPrincipal_2_2: '#a3eac7',
                complementarioPrincipal_2_3: '#eaa319',
                violet: {
                    100: "#e0d0de",
                    200: "#c1a1be",
                    300: "#a1739d",
                    400: "#82447d",
                    500: "#63155c",
                    600: "#4f114a",
                    700: "#3b0d37",
                    800: "#280825",
                    900: "#140412"
                },
                magenta: {
                    100: "#e5d1e4",
                    200: "#cca3c9",
                    300: "#b276ad",
                    400: "#994892",
                    500: "#7f1a77",
                    600: "#66155f",
                    700: "#4c1047",
                    800: "#330a30",
                    900: "#190518"
                },
                yellow: {
                    100: "#faefd2",
                    200: "#f5e0a6",
                    300: "#f0d079",
                    400: "#ebc14d",
                    500: "#e6b120",
                    600: "#b88e1a",
                    700: "#8a6a13",
                    800: "#5c470d",
                    900: "#2e2306"
                },
                // colores normales
                color0: 'inherit',
                color1: '#141313',
                color2: '#747474',
                color3: '#8f0432',
                color4: '#000000',
                color5: '#ffffff66',
                color6: '#151515',
                color7: '#555555',
                color8: '#ffffff',
                color9: '#ee82ee',
                color10: '#ffffff80',
                color11: '#7f1a77',
                color12: '#efb810'
            },
            fontFamily: {
                raleway: ['Raleway'],
                poppins: ['Poppins'],
                inconsolata: ['Inconsolata'],
            },
            imageSize: {
                'square-200px': 'width: 200px; height: 200px;',
                'square-210px': 'width: 210px; height: 210px;',
                'square-220px': 'width: 220px; height: 220px;',
                'square-230px': 'width: 230px; height: 230px;',
                'square-240px': 'width: 240px; height: 240px;',
                'square-250px': 'width: 250px; height: 250px;',
                'square-260px': 'width: 260px; height: 260px;',
                'square-270px': 'width: 270px; height: 270px;',
                'square-280px': 'width: 280px; height: 280px;',
                'square-290px': 'width: 290px; height: 290px;',
                'square-300px': 'width: 300px; height: 300px;',
            },
            gridTemplateColumns: {
                'auto-fit-200': 'repeat(auto-fit, minmax(200px, 1fr))',
                'auto-fit-210': 'repeat(auto-fit, minmax(210px, 1fr))',
                'auto-fit-220': 'repeat(auto-fit, minmax(220px, 1fr))',
                'auto-fit-230': 'repeat(auto-fit, minmax(230px, 1fr))',
                'auto-fit-240': 'repeat(auto-fit, minmax(240px, 1fr))',
                'auto-fit-250': 'repeat(auto-fit, minmax(250px, 1fr))',
                'auto-fit-260': 'repeat(auto-fit, minmax(260px, 1fr))',
                'auto-fit-270': 'repeat(auto-fit, minmax(270px, 1fr))',
                'auto-fit-280': 'repeat(auto-fit, minmax(280px, 1fr))',
                'auto-fit-290': 'repeat(auto-fit, minmax(290px, 1fr))',
                'auto-fit-300': 'repeat(auto-fit, minmax(300px, 1fr))',
            },
            screens: {
                'opera': '1325px',  // opera screens
                'edge': '1358px',  // edge screens
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
        // require('tailwind-scrollbar-hide'),
        require('postcss-import'),
        require('postcss'),
        require('flowbite/plugin'),
        // require('@tailwindcss/aspect-ratio'),
        // require("daisyui"),
    ],
}

