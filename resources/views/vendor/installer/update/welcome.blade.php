@extends('vendor.installer.layouts.master-update')

@section('title', trans('installer_messages.updater.welcome.title'))
@section('container')
    <p class="text-center">
    	{{ trans('installer_messages.updater.welcome.message') }}
    </p>
    <div class="py-6 text-right">
        <a href="{{ route('LaravelUpdater::overview') }}" class="btn-blue">{{ trans('installer_messages.next') }}</a>
    </div>
@stop
