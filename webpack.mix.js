const mix = require('laravel-mix')

mix
    .setPublicPath('dist')
    .js('resources/js/full-calendar.js', 'js')
    // .js('resources/js/nova-apex-chart.js', 'js')
