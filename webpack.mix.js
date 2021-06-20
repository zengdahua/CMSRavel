const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.postCss('resources/system/css/base.pcss', 'public/static/system/css', [
    require('postcss-import'),
    tailwindcss('./tailwind.config.js'),
    require('postcss-nesting'),
    require('autoprefixer'),
])
    .options({
        processCssUrls: false,
    }).version();
mix.minify(['public/static/system/css/base.css']);

mix.scripts([
    'resources/system/js/do.js',
    'resources/system/js/package.js',
    'resources/system/js/common.js',
    'resources/system/js/component/app.js',
    'resources/system/js/component/notify.js',
    'resources/system/js/component/dialog.js',
    'resources/system/js/component/table.js',
    'resources/system/js/component/form.js',
    'resources/system/js/component/show.js',
    'resources/system/js/component/system.js',
    'resources/system/js/component/file.js',
    'resources/system/js/component/page.js',
], 'public/static/system/js/app.js').version();
mix.minify(['public/static/system/js/app.js']);

mix.copyDirectory('resources/system/img', 'public/static/system/img');
mix.copyDirectory('resources/system/libs/fontawesome/webfonts', 'public/static/system/webfonts');
mix.copyDirectory('resources/system/js/package/cascader', 'public/static/system/js/cascader');
mix.copyDirectory('resources/system/js/package/Inputmask', 'public/static/system/js/Inputmask');
mix.copyDirectory('resources/system/js/package/pagination', 'public/static/system/js/pagination');
mix.copyDirectory('resources/system/js/package/password', 'public/static/system/js/password');
mix.copyDirectory('resources/system/js/package/prompt', 'public/static/system/js/prompt');
mix.copyDirectory('resources/system/js/package/toast', 'public/static/system/js/toast');
mix.copyDirectory('resources/system/js/package/treetable', 'public/static/system/js/treetable');
mix.copyDirectory('resources/system/js/package/tinymce', 'public/static/system/js/tinymce');
mix.copyDirectory('resources/system/js/package/tinydux/theme/build/ui/dux', 'public/static/system/js/tinymce/skins/ui/dux');
mix.copyDirectory('resources/system/js/package/tinydux/theme/build/content/dux', 'public/static/system/js/tinymce/skins/content/dux');

mix.copy('resources/system/libs/fontawesome/css/all.min.css', 'public/static/system/css/fontawesome.min.css');
mix.copy('resources/system/libs/jquery/jquery-3.5.1.min.js', 'public/static/system/js/jquery.min.js');
mix.copy('node_modules/@popperjs/core/dist/umd/popper.min.js', 'public/static/system/js/tippy/popper.min.js');
mix.copy('node_modules/tippy.js/dist/tippy.umd.min.js', 'public/static/system/js/tippy/tippy.min.js');
mix.copy('node_modules/tippy.js/dist/tippy.css', 'public/static/system/js/tippy/tippy.css');

mix.version([
    'public/static/system/js/jquery.min.js',
    'public/static/system/css/fontawesome.min.css',
]);
