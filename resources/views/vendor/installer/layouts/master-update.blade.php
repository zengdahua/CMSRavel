<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ trans('installer_messages.updater.title') }}</title>
    <link rel="stylesheet" href="{{ mix('static/system/css/base.css') }}"/>
    <link rel="stylesheet" href="{{ mix('static/system/css/fontawesome.min.css') }}"/>
    <script src="//unpkg.com/alpinejs" defer></script>
    @yield('style')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-200 px-4 py-6">

    <div class="max-w-xl max-w-2xl w-full bg-white rounded shadow">
        <div class="bg-blue-900 text-white  text-center rounded-t text-sm">
            <div class="py-6 text-xl">{{trans('installer_messages.updater.title')}}</div>
        </div>
        <ul class="app-step-num py-4 border-b border-gray-300">

            <li class="{{isActive('LaravelUpdater::welcome')}} {{isActive('LaravelUpdater::overview')}} {{isActive('LaravelUpdater::final')}}">
                {{ trans('installer_messages.updater.welcome.title') }}
            </li>
            <li class="{{isActive('LaravelUpdater::overview')}} {{isActive('LaravelUpdater::final')}}">
                {{ trans('installer_messages.updater.overview.title') }}
            </li>
            <li class="{{isActive('LaravelUpdater::final')}}">
                {{ trans('installer_messages.updater.final.title') }}
            </li>
        </ul>
        <div class="pt-6 px-6 text-sm">

            @yield('container')
        </div>
    </div>
</div>

</body>
</html>
