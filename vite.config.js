const laravel = require('laravel-vite-plugin').default;

module.exports = {
    plugins: [
        laravel({
            input: ['resources/css/mizyan.css', 'resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
};
