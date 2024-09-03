import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                    'resources/js/app.js',
                    'resources/js/Estructura/Materia/App/MateriaApp.js'
                    ],
            refresh: true,
        }),
    ],
});

/*
'resources/js/Estructura/Materia/App/MateriaApp.js'
*/
