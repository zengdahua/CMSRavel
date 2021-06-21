<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Server Requirements
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel server requirements, you can add as many
    | as your application require, we check if the extension is enabled
    | by looping through the array and run "extension_loaded" on it.
    |
    */
    'core' => [
        'minPhpVersion' => '7.4.0',
    ],
    'final' => [
        'key' => true,
        'publish' => false,
    ],
    'requirements' => [
        'php' => [
            'openssl',
            'pdo',
            'mbstring',
            'tokenizer',
            'JSON',
            'cURL',
            'Redis',
        ],
        'apache' => [
            'mod_rewrite',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel folders permissions, if your application
    | requires more permissions just add them to the array list bellow.
    |
    */
    'permissions' => [
        'storage/framework/' => '755',
        'storage/logs/' => '755',
        'bootstrap/cache/' => '755',
    ],

    /*
    |--------------------------------------------------------------------------
    | Environment Form Wizard Validation Rules & Messages
    |--------------------------------------------------------------------------
    |
    | This are the default form field validation rules. Available Rules:
    | https://laravel.com/docs/5.4/validation#available-validation-rules
    |
    */
    'environment' => [
        'form' => [
            'fields' => [
                'base' => [
                    'APP_NAME',
                    'APP_ENV' => [
                        'local' => 'local',
                        'developement' => 'developement',
                        'qa' => 'qa',
                        'production' => 'production',
                    ],
                    'APP_DEBUG' => [
                        1 => 'true',
                        0 => 'false',
                    ],
                    'APP_URL',
                ],
                'database' => [
                    'DB_CONNECTION' => [
                        'mysql' => 'mysql',
                        'sqlite' => 'sqlite',
                        'pgsql' => 'pgsql',
                        'sqlsrv' => 'sqlsrv'
                    ],
                    'DB_HOST',
                    'DB_PORT' => 'number',
                    'DB_DATABASE' => '',
                    'DB_USERNAME',
                    'DB_PASSWORD' => 'password',
                    'DB_TABLE_PREFIX',
                ],
                'app' => [
                    'cache' => [
                        'BROADCAST_DRIVER',
                        'CACHE_DRIVER',
                        'QUEUE_CONNECTION',
                        'SESSION_DRIVER',
                    ],
                    'redis' => [
                        'REDIS_HOST',
                        'REDIS_PASSWORD' => 'password',
                        'REDIS_PORT',
                    ],
                    'mail' => [
                        'MAIL_MAILER',
                        'MAIL_HOST',
                        'MAIL_PORT',
                        'MAIL_USERNAME',
                        'MAIL_PASSWORD',
                        'MAIL_ENCRYPTION',
                    ],
                ],
            ],
            'rules' => [
                'APP_NAME' => 'required|string|max:50',
                'APP_ENV' => 'required|string|max:50',
                'APP_URL' => 'required|url',
                'DB_CONNECTION' => 'required|string|max:50',
                'DB_HOST' => 'required|string|max:50',
                'DB_PORT' => 'required|numeric',
                'DB_DATABASE' => 'required|string|max:50',
                'DB_USERNAME' => 'required|string|max:50',
                'DB_PASSWORD' => 'nullable|string|max:50',
                'DB_TABLE_PREFIX' => 'nullable|string|max:50',
                'BROADCAST_DRIVER' => 'required|string|max:50',
                'CACHE_DRIVER' => 'required|string|max:50',
                'QUEUE_CONNECTION' => 'required|string|max:50',
                'SESSION_DRIVER' => 'required|string|max:50',
                'REDIS_HOST' => 'required|string|max:50',
                'REDIS_PASSWORD' => 'nullable|string|max:50',
                'REDIS_PORT' => 'required|numeric',
                'MAIL_MAILER' => 'nullable|string|max:50',
                'MAIL_HOST' => 'nullable|string|max:50',
                'MAIL_PORT' => 'nullable|string|max:50',
                'MAIL_USERNAME' => 'nullable|string|max:50',
                'MAIL_PASSWORD' => 'nullable|string|max:50',
                'MAIL_ENCRYPTION' => 'nullable|string|max:50',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Installed Middleware Options
    |--------------------------------------------------------------------------
    | Different available status switch configuration for the
    | canInstall middleware located in `canInstall.php`.
    |
    */
    'installed' => [
        'redirectOptions' => [
            'route' => [
                'name' => 'admin.index',
                'data' => [],
            ],
            'abort' => [
                'type' => '404',
            ],
            'dump' => [
                'data' => '没有输出消息',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Selected Installed Middleware Option
    |--------------------------------------------------------------------------
    | The selected option fo what happens when an installer instance has been
    | Default output is to `/resources/views/error/404.blade.php` if none.
    | The available middleware options include:
    | route, abort, dump, 404, default, ''
    |
    */
    'installedAlreadyAction' => '',

    /*
    |--------------------------------------------------------------------------
    | Updater Enabled
    |--------------------------------------------------------------------------
    | Can the application run the '/update' route with the migrations.
    | The default option is set to False if none is present.
    | Boolean value
    |
    */
    'updaterEnabled' => 'true',

];
