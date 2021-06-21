@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.environment.wizard.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-magic fa-fw" aria-hidden="true"></i>
    {!! trans('installer_messages.environment.wizard.title') !!}
@endsection

@section('container')
    <div id="tabs" x-data="{tab: 0}">
        <div class="flex">
            <div class="flex-grow flex justify-center items-center flex-col cursor-pointer text-gray-500"
                 :class="{'text-blue-900': tab === 0}" @click="tab = 0">
                <i class="fa fa-cog fa-2x fa-fw"></i>
                <div class="mt-2">{{ trans('installer_messages.environment.wizard.tabs.environment') }}</div>
            </div>

            <div class="flex-grow flex justify-center items-center flex-col cursor-pointer text-gray-500"
                 :class="{'text-blue-900': tab === 1}" @click="tab = 1">
                <i class="fa fa-database fa-2x fa-fw"></i>
                <div class="mt-2">{{ trans('installer_messages.environment.wizard.tabs.database') }}</div>
            </div>

            <div class="flex-grow flex justify-center items-center flex-col cursor-pointer text-gray-500"
                 :class="{'text-blue-900': tab === 2}" @click="tab = 2">
                <i class="fa fa-cogs fa-2x fa-fw"></i>
                <div class="mt-2">{{ trans('installer_messages.environment.wizard.tabs.application') }}</div>
            </div>
        </div>

        <form method="post" action="{{ route('DuxravelInstaller::environmentSaveWizard') }}" class="py-6">
            <div x-show="tab === 0">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @foreach($data['base'] as $key => $vo)
                @php
                    if (is_int($key)) {
                        $name = $vo;
                        $type = 'text';
                    }else {
                        $name = $key;
                        if (is_array($vo)) {
                            $type = 'select';
                        }else {
                            $type = $vo;
                        }
                    }
                @endphp
                <div class="py-2 {{ $errors->has($name) ? 'text-red-900' : '' }}">
                    <label class="mb-2 block text-gray-500">
                        {{ trans('installer_messages.environment.wizard.form.' . $name . '_label') }}
                    </label>
                    @if($type === 'select')
                        <select class="form-select" name="{{$name}}">
                            @foreach($vo as $k => $v)
                                <option value="{{$k}}" {{$k === $env[$name]}}>{{$v}}</option>
                            @endforeach
                        </select>
                    @else
                        <input type="{{$type}}" class="form-input" name="{{$name}}"
                               value="{{$env[$name]}}"
                               placeholder="{{ trans('installer_messages.environment.wizard.form.' . $name . '_placeholder') }}"/>
                    @endif
                    @if ($errors->has($name))
                        <span class="mt-2 text-red-900 block">
                                <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ $errors->first($name) }}
                            </span>
                    @endif
                </div>
                @endforeach

                <div class="pt-6 text-right">
                    <button class="btn" @click="tab = 1" type="button">
                        {{ trans('installer_messages.environment.wizard.form.buttons.setup_database') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div x-show="tab === 1">

                @foreach($data['database'] as $key => $vo)
                    @php
                        if (is_int($key)) {
                            $name = $vo;
                            $type = 'text';
                        }else {
                            $name = $key;
                            if (is_array($vo)) {
                                $type = 'select';
                            }else {
                                $type = $vo;
                            }
                        }
                    @endphp
                    <div class="py-2 {{ $errors->has($name) ? 'text-red-900' : '' }}">
                        <label class="mb-2 block text-gray-500">
                            {{ trans('installer_messages.environment.wizard.form.' . $name . '_label') }}
                        </label>
                        @if($type === 'select')
                            <select class="form-select" name="{{$name}}">
                                @foreach($vo as $k => $v)
                                    <option value="{{$k}}" {{$k === $env[$name]}}>{{$v}}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="{{$type}}" class="form-input" name="{{$name}}"
                                   value="{{$env[$name]}}"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.' . $name . '_placeholder') }}"/>
                        @endif
                        @if ($errors->has($name))
                            <span class="mt-2 text-red-900 block">
                                <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ $errors->first($name) }}
                            </span>
                        @endif
                    </div>
                @endforeach



                <div class="text-right pt-6">
                    <button class="btn" @click="tab = 2" type="button">
                        {{ trans('installer_messages.environment.wizard.form.buttons.setup_application') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div x-show="tab === 2" x-data="{collapse : 0}">

                @php
                $i = -1;
                @endphp
                @foreach($data['app'] as $class => $app)
                    @php
                        $i++;
                    @endphp
                    <div>
                        <div class="mb-2 block bg-gray-600 text-white p-4 cursor-pointer"
                             :class="{'bg-blue-900': collapse === {{$i}}}" @click="collapse = {{$i}}">
                        <span>
                            {{ trans('installer_messages.environment.wizard.form.class_' . $class . '_label') }}
                        </span>
                        </div>
                        <div class="p-4" x-show="collapse === {{$i}}">
                        @foreach($app as $key => $vo)
                            @php
                                if (is_int($key)) {
                                    $name = $vo;
                                    $type = 'text';
                                }else {
                                    $name = $key;
                                    if (is_array($vo)) {
                                        $type = 'select';
                                    }else {
                                        $type = $vo;
                                    }
                                }
                            @endphp
                            <div class="py-2 {{ $errors->has($name) ? 'text-red-900' : '' }}">
                                <label class="mb-2 block text-gray-500">
                                    {{ trans('installer_messages.environment.wizard.form.' . $name . '_label') }}
                                </label>
                                @if($type === 'select')
                                    <select class="form-select" name="{{$name}}">
                                        @foreach($vo as $k => $v)
                                            <option value="{{$k}}" {{$k === $env[$name]}}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="{{$type}}" class="form-input" name="{{$name}}"
                                           value="{{$env[$name]}}"
                                           placeholder="{{ trans('installer_messages.environment.wizard.form.' . $name . '_placeholder') }}"/>
                                @endif
                                @if ($errors->has($name))
                                    <span class="mt-2 text-red-900 block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first($name) }}
                                    </span>
                                @endif
                            </div>
                        @endforeach
                        </div>
                    </div>
                @endforeach


                <div class="pt-6 text-right">
                    <button class="btn-blue" type="submit">
                        {{ trans('installer_messages.environment.wizard.form.buttons.install') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function checkEnvironment(val) {
            var element = document.getElementById('environment_text_input');
            if (val == 'other') {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }
    </script>
@endsection
