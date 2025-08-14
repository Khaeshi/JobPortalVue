import vue from '@vitejs/plugin-vue';
import path from 'path';
import tailwindcss from "@tailwindcss/vite";
import { resolve } from 'node:path';
import { defineConfig } from 'vite';

export default defineConfig({
    root: 'static-demo',
    publicDir: '../public',
    plugins: [
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
        },
    },
    build: {
        outDir: '../dist-static',
        emptyOutDir: true,
        rollupOptions: {},
    },
    base: './', // This ensures assets use relative paths
});
