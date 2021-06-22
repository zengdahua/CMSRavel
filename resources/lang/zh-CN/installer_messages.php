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
    'forms' => [
        'errorTitle' => '安装失败:',
    ],

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

                'APP_NAME_label' => '应用名',
                'APP_NAME_placeholder' => '应用名称',
                'APP_ENV_label' => '运行环境',
                'APP_ENV_placeholder' => '请输入环境名',

                'APP_DEBUG_label' => '调试模式',
                'APP_URL_label' => '应用地址',
                'APP_URL_placeholder' => '应用地址',
                'DB_CONNECTION_failed' => '数据库连接失败',
                'DB_CONNECTION_label' => '数据库连接',
                'DB_HOST_label' => '数据库地址',
                'DB_HOST_placeholder' => '数据库主机地址',
                'DB_PORT_label' => '数据库端口',
                'DB_PORT_placeholder' => '数据库端口',
                'DB_DATABASE_label' => '数据库名',
                'DB_DATABASE_placeholder' => '数据库名',
                'DB_USERNAME_label' => '用户名',
                'DB_USERNAME_placeholder' => '数据库用户名',
                'DB_PASSWORD_label' => '密码',
                'DB_PASSWORD_placeholder' => '数据库密码',
                'DB_TABLE_PREFIX_label' => '表前缀',
                'DB_TABLE_PREFIX_placeholder' => '数据库表前缀名',

                'class_cache_label' => '数据设置',
                'BROADCAST_DRIVER_label' => '广播驱动',
                'BROADCAST_DRIVER_placeholder' => '广播驱动',
                'CACHE_DRIVER_label' => '缓存驱动',
                'CACHE_DRIVER_placeholder' => '缓存驱动',
                'SESSION_DRIVER_label' => '会话驱动',
                'SESSION_DRIVER_placeholder' => '会话驱动',
                'QUEUE_CONNECTION_label' => '队列驱动',
                'QUEUE_CONNECTION_placeholder' => '队列驱动',
                'class_redis_label' => 'Redis 设置',
                'REDIS_HOST_label' => 'Redis 主机',
                'REDIS_HOST_placeholder' => '主机地址',
                'REDIS_PASSWORD_label' => 'Redis 密码',
                'REDIS_PASSWORD_placeholder' => 'Redis 密码，可留空',
                'REDIS_PORT_label' => 'Redis 端口',
                'REDIS_PORT_placeholder' => 'Redis 端口',
                'REDIS_CONNECTION_failed' => 'Redis 链接失败',

                'class_mail_label' => '邮件设置',
                'MAIL_MAILER_label' => '邮件驱动',
                'MAIL_MAILER_placeholder' => '邮件驱动',
                'MAIL_HOST_label' => '邮箱主机',
                'MAIL_HOST_placeholder' => '邮箱主机',
                'MAIL_PORT_label' => '邮箱端口',
                'MAIL_PORT_placeholder' => '邮箱端口',
                'MAIL_USERNAME_label' => '邮箱账号',
                'MAIL_USERNAME_placeholder' => '邮箱账号',
                'MAIL_PASSWORD_label' => '邮箱密码',
                'MAIL_PASSWORD_placeholder' => '邮箱密码',
                'MAIL_ENCRYPTION_label' => '加密类型',
                'MAIL_ENCRYPTION_placeholder' => '加密类型',

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
