import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],   build: {
        manifest: true,  // Ensure the manifest file is generated
        outDir: 'public/build',  // Ensure the output directory is set correctly
    },
});
