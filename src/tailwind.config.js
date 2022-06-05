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
            'primary': '#5367ED',
            // 'primary': '#F47487',
            'gray': '#B0B3B8',
            // white
            'white': '#ffffff',
            'white-100': '#f8f8f8',
            // dark
            'dark': '#222327',
            'dark-2': '#31353F',
            //color
            't-color': '#3c4043',
            // 't-color': '#455078',
            't-d-color': '#ffffff',
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

