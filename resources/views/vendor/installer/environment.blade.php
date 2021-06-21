@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.environment.menu.templateTitle') }}
@endsection

@section('title')
    {!! trans('installer_messages.environment.menu.title') !!}
@endsection

@section('container')

    <p class="text-center">
        {!! trans('installer_messages.environment.menu.desc') !!}
    </p>
    <div class="py-6 flex justify-center gap-4">
        <a href="{{ route('DuxravelInstaller::environmentClassic') }}" class="btn">
            {{ trans('installer_messages.environment.menu.classic-button') }}
        </a>
        <a href="{{ route('DuxravelInstaller::environmentWizard') }}" class="btn-blue">
            {{ trans('installer_messages.environment.menu.wizard-button') }}
        </a>
    </div>

@endsection
