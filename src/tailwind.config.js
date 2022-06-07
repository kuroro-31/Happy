module.exports = {
    mode: 'jit',
    darkMode: 'class',
    important: true,
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
      extend: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            // 'primary': '#1966D2',
            // 'primary': '#A875FF',
            // 'primary': '#5367ED',
            // 'primary': '#F47487',
            // 'primary': '#E976B0',
            // 'primary': '#0c2088',
            'primary': '#4e86ff',
            'primary-light': '#7787fc',
            'gray': '#B0B3B8',
            'gray-2': '#E3E6EA',
            'gray-3': '#cacccf',
            // white
            'white': '#ffffff',
            'white-100': '#f8f8f8',
            'f5': '#F5F5F5',
            // dark
            'dark': '#222327',
            'dark-2': '#31353F',
            'dark-blue': '#022f61',
            //color
            't-color': '#3c4043',
            // 't-color': '#455078',
            't-d-color': '#ffffff',
            'red': '#F9197F',
            'yellow': '#d8a84a',
            'purple': '#3f3cbb',
            'midnight': '#121063',
            'metal': '#565584',
            'tahiti': '#3ab7bf',
            'silver': '#ecebff',
            'bubble-gum': '#ff77e9',
            'bermuda': '#78dcca',
        },
      },
    },
    plugins: []
}

