@extends('vendor.installer.layouts.master-update')

@section('title', trans('installer_messages.updater.final.title'))
@section('container')
    <p class=" text-center">{{ session('message')['message'] }}</p>
    <div class="py-6 text-right">
        <a href="{{ url('/') }}" class="btn-blue">{{ trans('installer_messages.updater.final.exit') }}</a>
    </div>
@stop
