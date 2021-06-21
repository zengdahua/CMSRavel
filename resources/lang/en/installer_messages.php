<?php

return [

    /*
     *
     * Shared translations.
     *
     */
    'title' => 'Laravel Installer',
    'next' => 'Next Step',
    'back' => 'Previous',
    'finish' => 'Install',
    'forms' => [
        'errorTitle' => 'The Following errors occurred:',
    ],

    /*
     *
     * Home page translations.
     *
     */
    'welcome' => [
        'templateTitle' => 'Welcome',
        'title'   => 'Laravel Installer',
        'message' => 'Easy Installation and Setup Wizard.',
        'next'    => 'Check Requirements',
    ],

    /*
     *
     * Requirements page translations.
     *
     */
    'requirements' => [
        'templateTitle' => 'Step 1 | Server Requirements',
        'title' => 'Server Requirements',
        'next'    => 'Check Permissions',
    ],

    /*
     *
     * Permissions page translations.
     *
     */
    'permissions' => [
        'templateTitle' => 'Step 2 | Permissions',
        'title' => 'Permissions',
        'next' => 'Configure Environment',
    ],

    /*
     *
     * Environment page translations.
     *
     */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Step 3 | Environment Settings',
            'title' => 'Environment Settings',
            'desc' => 'Please select how you want to configure the apps <code>.env</code> file.',
            'wizard-button' => 'Form Wizard Setup',
            'classic-button' => 'Classic Text Editor',
        ],
        'wizard' => [
            'templateTitle' => 'Step 3 | Environment Settings | Guided Wizard',
            'title' => 'Guided <code>.env</code> Wizard',
            'tabs' => [
                'environment' => 'Environment',
                'database' => 'Database',
                'application' => 'Application',
            ],
            'form' => [
                'APP_NAME_label' => 'app name',
                'APP_NAME_placeholder' => 'app name',
                'APP_ENV_label' => 'app env',
                'APP_ENV_placeholder' => 'app env',

                'APP_DEBUG_label' => 'app debug',
                'APP_URL_label' => 'app url',
                'APP_URL_placeholder' => 'app url',
                'DB_CONNECTION_failed' => 'database type',
                'DB_CONNECTION_label' => 'database type',
                'DB_HOST_label' => 'database host',
                'DB_HOST_placeholder' => 'database host',
                'DB_PORT_label' => 'database port',
                'DB_PORT_placeholder' => 'database port',
                'DB_DATABASE_label' => 'database name',
                'DB_DATABASE_placeholder' => 'database name',
                'DB_USERNAME_label' => 'database username',
                'DB_USERNAME_placeholder' => 'database username',
                'DB_PASSWORD_label' => 'database password',
                'DB_PASSWORD_placeholder' => 'database password',
                'DB_TABLE_PREFIX_label' => 'database prefix',
                'DB_TABLE_PREFIX_placeholder' => 'database prefix',

                'class_cache_label' => 'cache setting',
                'BROADCAST_DRIVER_label' => 'broadcast driver',
                'BROADCAST_DRIVER_placeholder' => 'broadcast driver',
                'CACHE_DRIVER_label' => 'cache driver',
                'CACHE_DRIVER_placeholder' => 'cache driver',
                'SESSION_DRIVER_label' => 'session driver',
                'SESSION_DRIVER_placeholder' => 'session driver',
                'QUEUE_CONNECTION_label' => 'queue connection',
                'QUEUE_CONNECTION_placeholder' => 'queue connection',
                'class_redis_label' => 'Redis setting',
                'REDIS_HOST_label' => 'Redis host',
                'REDIS_HOST_placeholder' => 'Redis host',
                'REDIS_PASSWORD_label' => 'Redis password',
                'REDIS_PASSWORD_placeholder' => 'Redis password',
                'REDIS_PORT_label' => 'Redis port',
                'REDIS_PORT_placeholder' => 'Redis port',

                'class_mail_label' => 'mail setting',
                'MAIL_MAILER_label' => 'mail driver',
                'MAIL_MAILER_placeholder' => 'mail driver',
                'MAIL_HOST_label' => 'mail host',
                'MAIL_HOST_placeholder' => 'mail host',
                'MAIL_PORT_label' => 'mail port',
                'MAIL_PORT_placeholder' => 'mail port',
                'MAIL_USERNAME_label' => 'mail username',
                'MAIL_USERNAME_placeholder' => 'mail username',
                'MAIL_PASSWORD_label' => 'mail password',
                'MAIL_PASSWORD_placeholder' => 'mail password',
                'MAIL_ENCRYPTION_label' => 'mail encryption',
                'MAIL_ENCRYPTION_placeholder' => 'mail encryption',

                'buttons' => [
                    'setup_database' => 'Setup Database',
                    'setup_application' => 'Setup Application',
                    'install' => 'Install',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Step 3 | Environment Settings | Classic Editor',
            'title' => 'Classic Environment Editor',
            'save' => 'Save .env',
            'back' => 'Use Form Wizard',
            'install' => 'Save and Install',
        ],
        'success' => 'Your .env file settings have been saved.',
        'errors' => 'Unable to save the .env file, Please create it manually.',
    ],

    'install' => 'Install',

    /*
     *
     * Installed Log translations.
     *
     */
    'installed' => [
        'success_log_message' => 'Laravel Installer successfully INSTALLED on ',
    ],

    /*
     *
     * Final page translations.
     *
     */
    'final' => [
        'title' => 'Installation Finished',
        'templateTitle' => 'Installation Finished',
        'finished' => 'Application has been successfully installed.',
        'migration' => 'Migration &amp; Seed Console Output:',
        'console' => 'Application Console Output:',
        'log' => 'Installation Log Entry:',
        'env' => 'Final .env File:',
        'exit' => 'Click here to exit',
    ],

    /*
     *
     * Update specific translations
     *
     */
    'updater' => [
        /*
         *
         * Shared translations.
         *
         */
        'title' => 'Laravel Updater',

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'welcome' => [
            'title'   => 'Welcome To The Updater',
            'message' => 'Welcome to the update wizard.',
        ],

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'overview' => [
            'title'   => 'Overview',
            'message' => 'There is 1 update.|There are :number updates.',
            'install_updates' => 'Install Updates',
        ],

        /*
         *
         * Final page translations.
         *
         */
        'final' => [
            'title' => 'Finished',
            'finished' => 'Application\'s database has been successfully updated.',
            'exit' => 'Click here to exit',
        ],

        'log' => [
            'success_message' => 'Laravel Installer successfully UPDATED on ',
        ],
    ],
];
