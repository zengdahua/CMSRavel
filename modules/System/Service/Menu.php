<?php

namespace Modules\System\Service;

/**
 * 系统菜单接口
 */
class Menu
{

    /**
     * 获取菜单结构
     */
    public function getAdminMenu()
    {
        $curName = request()->route()->getName();
        $formInfo = [];
        if (strpos($curName, 'admin.system.formData', 0) !== false) {
            $formInfo = \Modules\System\Model\Form::find(request()->get('form'));
        }
        return [
            'index' => [
                'name' => '首页',
                'topic' => '控制台',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
</svg>',
                'order' => 0,
                'menu' => [
                    [
                        'name' => '控制台',
                        'order' => 100,
                        'menu' => [
                            [
                                'name' => '运维概况',
                                'url' => 'admin.development',
                                'order' => 1,
                            ],
                        ]
                    ],

                ],
            ],
            'system' => [
                'name' => '设置',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>',
                'order' => 150,
                'menu' => [
                    [
                        'name' => '设置',
                        'order' => 100,
                        'menu' => [
                            [
                                'name' => '系统设置',
                                'url' => 'admin.system.setting',
                                'order' => 0,
                            ],
                        ]
                    ],
                    [
                        'name' => '用户',
                        'order' => 200,
                        'menu' => [
                            [
                                'name' => '用户管理',
                                'url' => 'admin.system.user',
                                'order' => 1
                            ],
                            [
                                'name' => '角色管理',
                                'url' => 'admin.system.role',
                                'order' => 2
                            ],
                        ]
                    ],
                    [
                        'name' => '管理',
                        'order' => 201,
                        'menu' => [
                            [
                                'name' => '接口授权',
                                'url' => 'admin.system.api',
                                'order' => 0
                            ],
                            [
                                'name' => '任务队列',
                                'url' => 'admin.system.task',
                                'order' => 1
                            ],
                        ]
                    ],
                    [
                        'name' => '记录',
                        'order' => 202,
                        'menu' => [
                            [
                                'name' => '接口统计',
                                'url' => 'admin.system.visitorApi',
                                'order' => 1
                            ],
                            [
                                'name' => '操作日志',
                                'url' => 'admin.system.operate',
                                'order' => 2
                            ],
                        ]
                    ],
                    [
                        'name' => '地区',
                        'order' => 203,
                        'menu' => [
                            [
                                'name' => '地区数据',
                                'url' => 'admin.system.area',
                                'order' => 0
                            ],
                        ]
                    ],

                ],
            ],
            'app' => [
                'name' => '应用',
                'icon' => file_get_contents(module_path('System/Static/Image/app.svg')),
                'url' => 'admin.system.application',
                'order' => 200,
            ],
            'form' => [
                'name' => '表单',
                'icon' => file_get_contents(module_path('System/Static/Image/form.svg')),
                'hidden' => true,
                'order' => 1000,
                'url' => 'admin.system.form'
            ],
            'form_data' => [
                'name' => $formInfo  ? $formInfo->menu : '表单',
                'icon' => file_get_contents(module_path('System/Static/Image/form.svg')),
                'hidden' => true,
                'order' => 1000,
                'url' => 'admin.system.formData',
                'params' => $formInfo ? ['form' => request()->get('form')] : []
            ],
        ];
    }

    public function getAppMenu()
    {
        return [
            [
                'name' => '自定义表单',
                'desc' => '多功能自定义表单功能',
                'type' => 'tools',
                'url' => 'admin.system.form',
                'icon' => file_get_contents(module_path('System/Static/Image/form.svg'))
            ]
        ];
    }
}

