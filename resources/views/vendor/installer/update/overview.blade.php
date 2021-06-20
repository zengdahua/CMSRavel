@extends('vendor.installer.layouts.master-update')

@section('title', trans('installer_messages.updater.welcome.title'))
@section('container')
    <p class=" text-center">{{ trans_choice('installer_messages.updater.overview.message', $numberOfUpdatesPending, ['number' => $numberOfUpdatesPending]) }}</p>
    <div class="py-6 text-right">
        <a href="{{ route('LaravelUpdater::database') }}" class="btn-blue">{{ trans('installer_messages.updater.overview.install_updates') }}</a>
    </div>
@stop
