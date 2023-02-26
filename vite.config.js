import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';



export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/inicio.css',
                'resources/css/administracion.css',
                'resources/css/anadir.css',
                'resources/css/confirmarinvitacion.css',
                'resources/css/formulario.css',
                'resources/css/informacionrelevante.css',
                'resources/css/invitacionconfirmada.css',
                'resources/css/login.css',
                'resources/css/menuprincipal.css',
                'resources/js/inicio.js',
                'resources/js/confirmarinvitacion.js',
                'resources/js/menuprincipal.js',
                'resources/js/administracion/administracion.js',
                'resources/js/administracion/alergias.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
    // server: {
    //     host: true
    // }
});
