@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.requirements.templateTitle') }}
@endsection

@section('title')
    {{ trans('installer_messages.requirements.title') }}
@endsection

@section('container')
    @foreach($requirements['requirements'] as $type => $requirement)
        <div class="bg-white border border-gray-300 mb-2">
            <div class="px-4 py-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900 {{ $phpSupportInfo['supported'] ? 'text-green-900' : 'text-red-900' }}">
                    {{ $type }}
                </h3>
                <div class="mt-1 max-w-2xl text-sm text-gray-500 flex">
                    @if($type == 'php')
                        <div class="flex-grow">
                            <small>
                                (version {{ $phpSupportInfo['minimum'] }} required)
                            </small>
                        </div>
                        <div class="flex-none {{ $phpSupportInfo['supported'] ? 'text-green-900' : 'text-red-900' }}">
                        <strong>
                            {{ $phpSupportInfo['current'] }}
                        </strong>
                        <i class="fa fa-fw fa-{{ $phpSupportInfo['supported'] ? 'check-circle' : 'exclamation-circle' }} row-icon"
                           aria-hidden="true"></i>
                        </div>
                    @endif
                </div>
            </div>
            <div class="border-t border-gray-300">
                <dl>
                    @foreach($requirements['requirements'][$type] as $extention => $enabled)
                    <div class="border-b border-gray-400 px-4 py-5 flex">
                        <dt class="text-sm font-medium text-gray-600 flex-grow">
                            {{ $extention }}
                        </dt>
                        <dd class=" text-sm text-gray-900 flex-none {{ $enabled ? 'text-green-900' : 'text-red-900' }}">
                            <i class="fa fa-fw fa-{{ $enabled ? 'check-circle' : 'exclamation-circle' }} row-icon"
                               aria-hidden="true"></i>
                        </dd>
                    </div>
                    @endforeach

                </dl>
            </div>
        </div>
    @endforeach

    @if ( ! isset($requirements['errors']) && $phpSupportInfo['supported'] )
        <div class="py-8 text-right">
            <a class="btn-blue" href="{{ route('LaravelInstaller::permissions') }}">
                {{ trans('installer_messages.requirements.next') }}
                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    @endif

@endsection
