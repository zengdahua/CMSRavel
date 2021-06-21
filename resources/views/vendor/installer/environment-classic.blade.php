@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.environment.classic.templateTitle') }}
@endsection

@section('title')
    {{ trans('installer_messages.environment.classic.title') }}
@endsection

@section('container')

    <form method="post" action="{{ route('DuxravelInstaller::environmentSaveClassic') }}">
        {!! csrf_field() !!}
        <textarea class="form-textarea bg-gray-800 text-white" rows="20" name="envConfig">{{ $envConfig }}</textarea>
        <div class="text-right py-4">
            <button class="btn-outline-blue" type="submit">
             	{!! trans('installer_messages.environment.classic.save') !!}
            </button>
        </div>
    </form>

    @if( ! isset($environment['errors']))
        <div class="flex justify-between pb-6 pt-4">
            <a class="btn" href="{{ route('DuxravelInstaller::environmentWizard') }}">
                {!! trans('installer_messages.environment.classic.back') !!}
            </a>
            <a class="btn-blue" href="{{ route('DuxravelInstaller::database') }}">
                {!! trans('installer_messages.environment.classic.install') !!}
                <i class="fa fa-angle-double-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    @endif

@endsection
