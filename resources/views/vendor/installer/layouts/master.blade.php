<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title')
        | @endif {{ trans('installer_messages.title') }}</title>
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
            <div class="py-6 text-xl">{{trans('installer_messages.title')}}</div>
        </div>
        <ul class="app-step-num py-4 border-b border-gray-300">
            <li class="{{isActive('DuxravelInstaller::welcome')}} {{isActive('DuxravelInstaller::requirements')}} {{isActive('DuxravelInstaller::permissions')}} {{ isActive('DuxravelInstaller::environment')}} {{ isActive('DuxravelInstaller::environmentWizard')}} {{ isActive('DuxravelInstaller::environmentClassic')}} {{isActive('DuxravelInstaller::final')}}">
                @if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                    <a href="{{ route('DuxravelInstaller::welcome') }}">
                        {{ trans('installer_messages.welcome.templateTitle') }}
                    </a>
                @else
                    {{ trans('installer_messages.welcome.templateTitle') }}
                @endif
            </li>
            <li class="{{isActive('DuxravelInstaller::requirements')}} {{isActive('DuxravelInstaller::permissions')}} {{ isActive('DuxravelInstaller::environment')}} {{ isActive('DuxravelInstaller::environmentWizard')}} {{ isActive('DuxravelInstaller::environmentClassic')}} {{isActive('DuxravelInstaller::final')}}">
                @if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                    <a href="{{ route('DuxravelInstaller::requirements') }}">
                        {{ trans('installer_messages.requirements.templateTitle') }}
                    </a>
                @else
                    {{ trans('installer_messages.requirements.templateTitle') }}
                @endif
            </li>
            <li class="{{isActive('DuxravelInstaller::permissions')}} {{ isActive('DuxravelInstaller::environment')}} {{ isActive('DuxravelInstaller::environmentWizard')}} {{ isActive('DuxravelInstaller::environmentClassic')}} {{isActive('DuxravelInstaller::final')}}">
                @if(Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                    <a href="{{ route('DuxravelInstaller::permissions') }}">
                        {{ trans('installer_messages.permissions.templateTitle') }}
                    </a>
                @else
                    {{ trans('installer_messages.permissions.templateTitle') }}
                @endif

            </li>
            <li class="{{ isActive('DuxravelInstaller::environment')}} {{ isActive('DuxravelInstaller::environmentWizard')}} {{ isActive('DuxravelInstaller::environmentClassic')}} {{isActive('DuxravelInstaller::final')}}">
                @if(Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                    <a href="{{ route('DuxravelInstaller::environment') }}">
                        {{ trans('installer_messages.environment.menu.templateTitle') }}
                    </a>
                @else
                    {{ trans('installer_messages.environment.menu.templateTitle') }}
                @endif
            </li>
            <li class="{{isActive('DuxravelInstaller::final')}}">
                {{ trans('installer_messages.final.templateTitle') }}
            </li>
        </ul>
        <div class="pt-6 px-6 text-sm">
                @if (session('message'))
                    <p class="p-4 mb-4 bg-yellow-400 border border-yellow-900 text-yellow-900 rounded">
                        <strong>
                            @if(is_array(session('message')))
                                {{ session('message')['message'] }}
                            @else
                                {{ session('message') }}
                            @endif
                        </strong>
                    </p>
                @endif
                @if(session()->has('errors'))
                    <div class="p-4 mb-4 bg-yellow-400 border border-yellow-900 text-yellow-900 rounded relative" x-data="{show: true}" x-show="show">
                        <button type="button" class="close absolute right-2 top-2" @click="show = false">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                        <div class="flex items-center">
                            <i class="fa fa-fw fa-exclamation-triangle mr-2" aria-hidden="true"></i>
                            {{ trans('installer_messages.forms.errorTitle') }}
                        </div>
                        <ul class="mt-2">
                            @foreach($errors->all() as $error)
                                <li class="mt-2">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            @yield('container')
        </div>
    </div>
</div>


@yield('scripts')
</body>
</html>
