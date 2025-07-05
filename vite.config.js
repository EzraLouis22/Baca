import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: true, // biar dapat diakses publik
        port: 3000, // sesuaikan dengan Replit
        allowedHosts: [
            '.replit.dev',
            '.repl.co'
        ]
    },
});
