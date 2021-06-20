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
            <div class="flex-grow flex justify-center items-center flex-col cursor-pointer text-gray-500" :class="{'text-blue-900': tab === 0}" @click="tab = 0">
                <i class="fa fa-cog fa-2x fa-fw"></i>
                <div class="mt-2">{{ trans('installer_messages.environment.wizard.tabs.environment') }}</div>
            </div>

            <div class="flex-grow flex justify-center items-center flex-col cursor-pointer text-gray-500" :class="{'text-blue-900': tab === 1}" @click="tab = 1">
                <i class="fa fa-database fa-2x fa-fw"></i>
                <div class="mt-2">{{ trans('installer_messages.environment.wizard.tabs.database') }}</div>
            </div>

            <div class="flex-grow flex justify-center items-center flex-col cursor-pointer text-gray-500" :class="{'text-blue-900': tab === 2}" @click="tab = 2">
                <i class="fa fa-cogs fa-2x fa-fw"></i>
                <div class="mt-2">{{ trans('installer_messages.environment.wizard.tabs.application') }}</div>
            </div>
        </div>

        <form method="post" action="{{ route('LaravelInstaller::environmentSaveWizard') }}" class="py-6">
            <div x-show="tab === 0">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="py-2 {{ $errors->has('app_name') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="app_name">
                        {{ trans('installer_messages.environment.wizard.form.app_name_label') }}
                    </label>
                    <input type="text" class="form-input" name="app_name" id="app_name" value=""
                           placeholder="{{ trans('installer_messages.environment.wizard.form.app_name_placeholder') }}"/>
                    @if ($errors->has('app_name'))
                        <div class="mt-2 text-red-900">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_name') }}
                        </div>
                    @endif
                </div>

                <div class="py-2 {{ $errors->has('environment') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="environment">
                        {{ trans('installer_messages.environment.wizard.form.app_environment_label') }}
                    </label>
                    <select class="form-select" name="environment" id="environment" onchange='checkEnvironment(this.value);'>
                        <option value="local"
                                selected>{{ trans('installer_messages.environment.wizard.form.app_environment_label_local') }}</option>
                        <option
                            value="development">{{ trans('installer_messages.environment.wizard.form.app_environment_label_developement') }}</option>
                        <option
                            value="qa">{{ trans('installer_messages.environment.wizard.form.app_environment_label_qa') }}</option>
                        <option
                            value="production">{{ trans('installer_messages.environment.wizard.form.app_environment_label_production') }}</option>
                        <option
                            value="other">{{ trans('installer_messages.environment.wizard.form.app_environment_label_other') }}</option>
                    </select>
                    <div id="environment_text_input" class="mt-2" style="display: none;">
                        <input type="text" class="form-input" name="environment_custom" id="environment_custom"
                               placeholder="{{ trans('installer_messages.environment.wizard.form.app_environment_placeholder_other') }}"/>
                    </div>
                    @if ($errors->has('app_name'))
                        <div class="mt-2 text-red-900">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_name') }}
                        </div>
                    @endif
                </div>

                <div class="py-2 {{ $errors->has('app_debug') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="app_debug">
                        {{ trans('installer_messages.environment.wizard.form.app_debug_label') }}
                    </label>
                    <label class="mb-2 block text-gray-500" for="app_debug_true">
                        <input type="radio" class="form-radio mr-2" name="app_debug" id="app_debug_true" value=true checked/>
                        {{ trans('installer_messages.environment.wizard.form.app_debug_label_true') }}
                    </label>
                    <label class="mb-2 block text-gray-500" for="app_debug_false">
                        <input type="radio" class="form-radio mr-2" name="app_debug" id="app_debug_false" value=false/>
                        {{ trans('installer_messages.environment.wizard.form.app_debug_label_false') }}
                    </label>
                    @if ($errors->has('app_debug'))
                        <span class="mt-2 text-red-900 block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_debug') }}
                        </span>
                    @endif
                </div>

                <div class="py-2 {{ $errors->has('app_log_level') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="app_log_level">
                        {{ trans('installer_messages.environment.wizard.form.app_log_level_label') }}
                    </label>
                    <select class="form-select" name="app_log_level" id="app_log_level">
                        <option value="debug"
                                selected>{{ trans('installer_messages.environment.wizard.form.app_log_level_label_debug') }}</option>
                        <option
                            value="info">{{ trans('installer_messages.environment.wizard.form.app_log_level_label_info') }}</option>
                        <option
                            value="notice">{{ trans('installer_messages.environment.wizard.form.app_log_level_label_notice') }}</option>
                        <option
                            value="warning">{{ trans('installer_messages.environment.wizard.form.app_log_level_label_warning') }}</option>
                        <option
                            value="error">{{ trans('installer_messages.environment.wizard.form.app_log_level_label_error') }}</option>
                        <option
                            value="critical">{{ trans('installer_messages.environment.wizard.form.app_log_level_label_critical') }}</option>
                        <option
                            value="alert">{{ trans('installer_messages.environment.wizard.form.app_log_level_label_alert') }}</option>
                        <option
                            value="emergency">{{ trans('installer_messages.environment.wizard.form.app_log_level_label_emergency') }}</option>
                    </select>
                    @if ($errors->has('app_log_level'))
                        <span class="mt-2 text-red-900 block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_log_level') }}
                        </span>
                    @endif
                </div>

                <div class="py-2 {{ $errors->has('app_url') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="app_url">
                        {{ trans('installer_messages.environment.wizard.form.app_url_label') }}
                    </label>
                    <input type="url" class="form-input" name="app_url" id="app_url" value="http://localhost"
                           placeholder="{{ trans('installer_messages.environment.wizard.form.app_url_placeholder') }}"/>
                    @if ($errors->has('app_url'))
                        <span class="mt-2 text-red-900 block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_url') }}
                        </span>
                    @endif
                </div>

                <div class="pt-6 text-right">
                    <button class="btn" @click="tab = 1" type="button">
                        {{ trans('installer_messages.environment.wizard.form.buttons.setup_database') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div x-show="tab === 1">

                <div class="py-2 {{ $errors->has('database_connection') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="database_connection">
                        {{ trans('installer_messages.environment.wizard.form.db_connection_label') }}
                    </label>
                    <select class="form-select" name="database_connection" id="database_connection">
                        <option value="mysql"
                                selected>{{ trans('installer_messages.environment.wizard.form.db_connection_label_mysql') }}</option>
                        <option
                            value="sqlite">{{ trans('installer_messages.environment.wizard.form.db_connection_label_sqlite') }}</option>
                        <option
                            value="pgsql">{{ trans('installer_messages.environment.wizard.form.db_connection_label_pgsql') }}</option>
                        <option
                            value="sqlsrv">{{ trans('installer_messages.environment.wizard.form.db_connection_label_sqlsrv') }}</option>
                    </select>
                    @if ($errors->has('database_connection'))
                        <span class="mt-2 text-red-900 block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_connection') }}
                        </span>
                    @endif
                </div>

                <div class="py-2 {{ $errors->has('database_hostname') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="database_hostname">
                        {{ trans('installer_messages.environment.wizard.form.db_host_label') }}
                    </label>
                    <input type="text" class="form-input" name="database_hostname" id="database_hostname" value="127.0.0.1"
                           placeholder="{{ trans('installer_messages.environment.wizard.form.db_host_placeholder') }}"/>
                    @if ($errors->has('database_hostname'))
                        <span class="mt-2 text-red-900 block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_hostname') }}
                        </span>
                    @endif
                </div>

                <div class="py-2 {{ $errors->has('database_port') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="database_port">
                        {{ trans('installer_messages.environment.wizard.form.db_port_label') }}
                    </label>
                    <input type="number" class="form-input"  name="database_port" id="database_port" value="3306"
                           placeholder="{{ trans('installer_messages.environment.wizard.form.db_port_placeholder') }}"/>
                    @if ($errors->has('database_port'))
                        <span class="mt-2 text-red-900 block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_port') }}
                        </span>
                    @endif
                </div>

                <div class="py-2 {{ $errors->has('database_name') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="database_name">
                        {{ trans('installer_messages.environment.wizard.form.db_name_label') }}
                    </label>
                    <input type="text" class="form-input" name="database_name" id="database_name" value=""
                           placeholder="{{ trans('installer_messages.environment.wizard.form.db_name_placeholder') }}"/>
                    @if ($errors->has('database_name'))
                        <span class="mt-2 text-red-900 block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_name') }}
                        </span>
                    @endif
                </div>

                <div class="py-2 {{ $errors->has('database_username') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="database_username">
                        {{ trans('installer_messages.environment.wizard.form.db_username_label') }}
                    </label>
                    <input type="text" class="form-input" name="database_username" id="database_username" value=""
                           placeholder="{{ trans('installer_messages.environment.wizard.form.db_username_placeholder') }}"/>
                    @if ($errors->has('database_username'))
                        <span class="mt-2 text-red-900 block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_username') }}
                        </span>
                    @endif
                </div>

                <div class="py-2 {{ $errors->has('database_password') ? ' has-error ' : '' }}">
                    <label class="mb-2 block text-gray-500" for="database_password">
                        {{ trans('installer_messages.environment.wizard.form.db_password_label') }}
                    </label>
                    <input type="password" class="form-input"  name="database_password" id="database_password" value=""
                           placeholder="{{ trans('installer_messages.environment.wizard.form.db_password_placeholder') }}"/>
                    @if ($errors->has('database_password'))
                        <span class="mt-2 text-red-900 block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_password') }}
                        </span>
                    @endif
                </div>

                <div class="text-right pt-6">
                    <button class="btn"  @click="tab = 2" type="button">
                        {{ trans('installer_messages.environment.wizard.form.buttons.setup_application') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div x-show="tab === 2"  x-data="{collapse : 0}">
                <div>
                    <div  class="mb-2 block bg-gray-600 text-white p-4 cursor-pointer" :class="{'bg-blue-900': collapse === 0}" @click="collapse = 0">
                        <span>
                            {{ trans('installer_messages.environment.wizard.form.app_tabs.broadcasting_title') }}
                        </span>
                    </div>

                    <div class="p-4" x-show="collapse === 0">
                        <div class="py-2 {{ $errors->has('broadcast_driver') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="broadcast_driver">{{ trans('installer_messages.environment.wizard.form.app_tabs.broadcasting_label') }}
                            </label>
                            <input type="text" class="form-input" name="broadcast_driver" id="broadcast_driver" value="log"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.broadcasting_placeholder') }}"/>
                            @if ($errors->has('broadcast_driver'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('broadcast_driver') }}
                                </span>
                            @endif
                        </div>

                        <div class="py-2 {{ $errors->has('cache_driver') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="cache_driver">{{ trans('installer_messages.environment.wizard.form.app_tabs.cache_label') }}
                            </label>
                            <input type="text" class="form-input" name="cache_driver" id="cache_driver" value="file"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.cache_placeholder') }}"/>
                            @if ($errors->has('cache_driver'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('cache_driver') }}
                                </span>
                            @endif
                        </div>

                        <div class="py-2 {{ $errors->has('session_driver') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="session_driver">{{ trans('installer_messages.environment.wizard.form.app_tabs.session_label') }}
                            </label>
                            <input type="text" class="form-input" name="session_driver" id="session_driver" value="file"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.session_placeholder') }}"/>
                            @if ($errors->has('session_driver'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('session_driver') }}
                                </span>
                            @endif
                        </div>

                        <div class="py-2 {{ $errors->has('queue_driver') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="queue_driver">{{ trans('installer_messages.environment.wizard.form.app_tabs.queue_label') }}
                            </label>
                            <input type="text" class="form-input" name="queue_driver" id="queue_driver" value="sync"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.queue_placeholder') }}"/>
                            @if ($errors->has('queue_driver'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('queue_driver') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-2 block bg-gray-600 text-white p-4 cursor-pointer" :class="{'bg-blue-900': collapse === 1}"  @click="collapse = 1">
                        <span>
                            {{ trans('installer_messages.environment.wizard.form.app_tabs.redis_label') }}
                        </span>
                    </div>
                    <div class="p-4"  x-show="collapse === 1">
                        <div class="py-2 {{ $errors->has('redis_hostname') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500" for="redis_hostname">
                                {{ trans('installer_messages.environment.wizard.form.app_tabs.redis_host') }}
                            </label>
                            <input type="text" class="form-input" name="redis_hostname" id="redis_hostname" value="127.0.0.1"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_host') }}"/>
                            @if ($errors->has('redis_hostname'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('redis_hostname') }}
                                </span>
                            @endif
                        </div>

                        <div class="py-2 {{ $errors->has('redis_password') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="redis_password">{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_password') }}</label>
                            <input type="password" class="form-input"  name="redis_password" id="redis_password" value="null"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_password') }}"/>
                            @if ($errors->has('redis_password'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('redis_password') }}
                                </span>
                            @endif
                        </div>

                        <div class="py-2 {{ $errors->has('redis_port') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="redis_port">{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_port') }}</label>
                            <input type="number" class="form-input"  name="redis_port" id="redis_port" value="6379"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_port') }}"/>
                            @if ($errors->has('redis_port'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('redis_port') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <div  class="mb-2 block bg-gray-600 text-white p-4 cursor-pointer" :class="{'bg-blue-900': collapse === 2}" @click="collapse = 2">
                        <span>
                            {{ trans('installer_messages.environment.wizard.form.app_tabs.mail_label') }}
                        </span>
                    </div>
                    <div class="p-4"  x-show="collapse === 2">
                        <div class="py-2 {{ $errors->has('mail_driver') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500" for="mail_driver">
                                {{ trans('installer_messages.environment.wizard.form.app_tabs.mail_driver_label') }}
                            </label>
                            <input type="text" class="form-input" name="mail_driver" id="mail_driver" value="smtp"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_driver_placeholder') }}"/>
                            @if ($errors->has('mail_driver'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_driver') }}
                                </span>
                            @endif
                        </div>
                        <div class="py-2 {{ $errors->has('mail_host') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="mail_host">{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_host_label') }}</label>
                            <input type="text" class="form-input" name="mail_host" id="mail_host" value="smtp.mailtrap.io"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_host_placeholder') }}"/>
                            @if ($errors->has('mail_host'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_host') }}
                                </span>
                            @endif
                        </div>
                        <div class="py-2 {{ $errors->has('mail_port') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="mail_port">{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_port_label') }}</label>
                            <input type="number" class="form-input"  name="mail_port" id="mail_port" value="2525"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_port_placeholder') }}"/>
                            @if ($errors->has('mail_port'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_port') }}
                                </span>
                            @endif
                        </div>
                        <div class="py-2 {{ $errors->has('mail_username') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="mail_username">{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_username_label') }}</label>
                            <input type="text" class="form-input" name="mail_username" id="mail_username" value="null"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_username_placeholder') }}"/>
                            @if ($errors->has('mail_username'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_username') }}
                                </span>
                            @endif
                        </div>
                        <div class="py-2 {{ $errors->has('mail_password') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="mail_password">{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_password_label') }}</label>
                            <input type="text" class="form-input" name="mail_password" id="mail_password" value="null"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_password_placeholder') }}"/>
                            @if ($errors->has('mail_password'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_password') }}
                                </span>
                            @endif
                        </div>
                        <div class="py-2 {{ $errors->has('mail_encryption') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="mail_encryption">{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_encryption_label') }}</label>
                            <input type="text" class="form-input" name="mail_encryption" id="mail_encryption" value="null"
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_encryption_placeholder') }}"/>
                            @if ($errors->has('mail_encryption'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_encryption') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="block margin-bottom-2">
                    <div  class="mb-2 block bg-gray-600 text-white p-4 cursor-pointer" :class="{'bg-blue-900': collapse === 3}"  @click="collapse = 3">
                        <span>
                            {{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_label') }}
                        </span>
                    </div>
                    <div class="p-4"  x-show="collapse === 3">
                        <div class="py-2 {{ $errors->has('pusher_app_id') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500" for="pusher_app_id">
                                {{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_id_label') }}
                            </label>
                            <input type="text" class="form-input" name="pusher_app_id" id="pusher_app_id" value=""
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_id_palceholder') }}"/>
                            @if ($errors->has('pusher_app_id'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('pusher_app_id') }}
                                </span>
                            @endif
                        </div>
                        <div class="py-2 {{ $errors->has('pusher_app_key') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="pusher_app_key">{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_key_label') }}</label>
                            <input type="text" class="form-input" name="pusher_app_key" id="pusher_app_key" value=""
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_key_palceholder') }}"/>
                            @if ($errors->has('pusher_app_key'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('pusher_app_key') }}
                                </span>
                            @endif
                        </div>
                        <div class="py-2 {{ $errors->has('pusher_app_secret') ? ' has-error ' : '' }}">
                            <label class="mb-2 block text-gray-500"
                                for="pusher_app_secret">{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_label') }}</label>
                            <input type="password" class="form-input"  name="pusher_app_secret" id="pusher_app_secret" value=""
                                   placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_palceholder') }}"/>
                            @if ($errors->has('pusher_app_secret'))
                                <span class="mt-2 text-red-900 block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('pusher_app_secret') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
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
