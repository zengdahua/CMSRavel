<?php

return [

    /*
     *
     * Shared translations.
     *
     */
    'title' => 'DuxRavel 安装向导',
    'next' => '下一步',
    'finish' => '安装',

    /*
     *
     * Home page translations.
     *
     */
    'welcome' => [
        'templateTitle' => '安装向导',
        'title'   => 'DuxRavel 安装程序',
        'message' => 'DuxRavel 是一款基于Laravel框架的全新一代开源内容管理系统，拥有更快、更便捷、易开发的定制化管理后台。',
        'next'    => '检查组件',
    ],

    /*
     *
     * Requirements page translations.
     *
     */
    'requirements' => [
        'templateTitle' => '组件检查',
        'title' => '组件要求',
        'next'    => '检查权限',
    ],

    /*
     *
     * Permissions page translations.
     *
     */
    'permissions' => [
        'templateTitle' => '权限检查',
        'title' => '权限',
        'next'    => '配置环境',
    ],

    /*
     *
     * Environment page translations.
     *
     */
    'environment' => [
        'menu' => [
            'templateTitle' => '环境设置',
            'title' => '环境设置',
            'desc' => '请选择环境文件 <code>.env</code> 配置方式',
            'wizard-button' => '向导模式',
            'classic-button' => '编辑模式',
        ],
        'wizard' => [
            'templateTitle' => '环境配置向导',
            'title' => '环境配置 [.env] 向导',
            'tabs' => [
                'environment' => '环境',
                'database' => '数据库',
                'application' => '应用',
            ],
            'form' => [
                'name_required' => '名称必须填写',
                'app_name_label' => '应用名',
                'app_name_placeholder' => '应用名称',
                'app_environment_label' => '运行环境',
                'app_environment_label_local' => '本地环境',
                'app_environment_label_developement' => '开发环境',
                'app_environment_label_qa' => '测试环境',
                'app_environment_label_production' => '线上环境',
                'app_environment_label_other' => '其他',
                'app_environment_placeholder_other' => '请输入环境名',
                'app_debug_label' => '调试模式',
                'app_debug_label_true' => '开启',
                'app_debug_label_false' => '关闭',
                'app_log_level_label' => '日志级别',
                'app_log_level_label_debug' => 'debug',
                'app_log_level_label_info' => 'info',
                'app_log_level_label_notice' => 'notice',
                'app_log_level_label_warning' => 'warning',
                'app_log_level_label_error' => 'error',
                'app_log_level_label_critical' => 'critical',
                'app_log_level_label_alert' => 'alert',
                'app_log_level_label_emergency' => 'emergency',
                'app_url_label' => '应用地址',
                'app_url_placeholder' => '应用地址',
                'db_connection_failed' => '数据库连接失败',
                'db_connection_label' => '数据库连接',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => '数据库地址',
                'db_host_placeholder' => '数据库主机地址',
                'db_port_label' => '数据库端口',
                'db_port_placeholder' => '数据库端口',
                'db_name_label' => '数据库名',
                'db_name_placeholder' => '数据库名',
                'db_username_label' => '用户名',
                'db_username_placeholder' => '数据库用户名',
                'db_password_label' => '密码',
                'db_password_placeholder' => '数据库密码',

                'app_tabs' => [
                    'more_info' => '更多信息',
                    'broadcasting_title' => '数据设置',
                    'broadcasting_label' => '广播驱动',
                    'broadcasting_placeholder' => '广播驱动',
                    'cache_label' => '缓存驱动',
                    'cache_placeholder' => '缓存驱动',
                    'session_label' => '会话驱动',
                    'session_placeholder' => '会话驱动',
                    'queue_label' => '队列驱动',
                    'queue_placeholder' => '队列驱动',
                    'redis_label' => 'Redis 设置',
                    'redis_host' => 'Redis 主机',
                    'redis_password' => 'Redis 密码',
                    'redis_port' => 'Redis 端口',

                    'mail_label' => '邮件设置',
                    'mail_driver_label' => '邮件驱动',
                    'mail_driver_placeholder' => '邮件驱动',
                    'mail_host_label' => '邮箱主机',
                    'mail_host_placeholder' => '邮箱主机',
                    'mail_port_label' => '邮箱端口',
                    'mail_port_placeholder' => '邮箱端口',
                    'mail_username_label' => '邮箱账号',
                    'mail_username_placeholder' => '邮箱账号',
                    'mail_password_label' => '邮箱密码',
                    'mail_password_placeholder' => '邮箱密码',
                    'mail_encryption_label' => '加密类型',
                    'mail_encryption_placeholder' => '加密类型',

                    'pusher_label' => '推送设置',
                    'pusher_app_id_label' => '应用 id',
                    'pusher_app_id_palceholder' => '应用 id',
                    'pusher_app_key_label' => '应用 key',
                    'pusher_app_key_palceholder' => '应用 key',
                    'pusher_app_secret_label' => '应用 secret',
                    'pusher_app_secret_palceholder' => '应用 secret',
                ],
                'buttons' => [
                    'setup_database' => '数据库设置',
                    'setup_application' => '应用设置',
                    'install' => '安装',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => '编辑环境',
            'title' => '环境编辑器',
            'save' => '保存[.env]文件',
            'back' => '向导模式',
            'install' => '保存并安装',
        ],
        'success' => '.env 文件保存成功.',
        'errors' => '无法保存 .env 文件, 请手动创建它.',
    ],

    /*
     *
     * Final page translations.
     *
     */
    'final' => [
        'templateTitle' => '完成安装',
        'title' => '完成',
        'finished' => '应用已成功安装.',
        'exit' => '完成',
        'migration' => '数据库合并:',
        'console' => '命令输出:',
        'log' => '安装日志:',
        'env' => '环境文件:',
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
        'title' => 'DuxRavel 升级向导',

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'welcome' => [
            'title'   => '升级向导',
            'message' => '欢迎使用升级向导，该向导可帮助您进行程序升级',
        ],

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'overview' => [
            'title'   => '升级信息',
            'message' => '发现 1 个更新内容|发现 :number 个更新内容',
            'install_updates' => '安装更新',
        ],

        /*
         *
         * Final page translations.
         *
         */
        'final' => [
            'title' => '完成',
            'finished' => '应用数据已更新至最新版本',
            'exit' => '完成',
        ],

        'log' => [
            'success_message' => 'DuxRavel 更新已安装成功',
        ],
    ],
];
