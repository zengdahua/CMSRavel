@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.welcome.templateTitle') }}
@endsection

@section('title')
    {{ trans('installer_messages.welcome.title') }}
@endsection

@section('container')
    <p class="text-l">
      {{ trans('installer_messages.welcome.message') }}
    </p>
    <p class="text-right py-8">
      <a href="{{ route('LaravelInstaller::requirements') }}" class="btn-blue">
        {{ trans('installer_messages.welcome.next') }}
          <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
      </a>
    </p>
@endsection
