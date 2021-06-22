<?php

namespace Modules\Tools\Service;

use Modules\Tools\Model\ToolsMenu;

/**
 * 系统菜单接口
 */
class Menu
{
    /**
     * 获取菜单结构
     */
    public function getAdminMenu(): array
    {
        $model = ToolsMenu::get();
        $menuList = $model->map(function ($item) {
            return [
                'name' => $item['name'],
                'url' => 'admin.tools.menuItems',
                'params' => ['menu' => $item['menu_id']]
            ];
        })->toArray();

        $curName = request()->route()->getName();
        $formInfo = [];
        if (strpos($curName, 'admin.tools.formData', 0) !== false) {
            $formInfo = \Modules\Tools\Model\Form::find(request()->get('form'));
        }
        return [
            'tools' => [
                'name' => '工具',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>',
                'order' => 140,
                'menu' => [
                    [
                        'name' => '扩展工具',
                        'order' => 0,
                        'menu' => [
                            [
                                'name' => '菜单管理',
                                'url' => 'admin.tools.menu',
                            ],
                            [
                                'name'  => '自定义页面',
                                'url'   => 'admin.tools.page',
                            ],
                            [
                                'name'  => '内容标签',
                                'url'   => 'admin.tools.tags',
                            ],
                            [
                                'name'  => '模板标记',
                                'url'   => 'admin.tools.mark',
                            ],
                            // Generate Menu Make
                        ]
                    ],
                    [
                        'name' => '菜单管理',
                        'order' => 1,
                        'menu' => [
                            ...$menuList
                        ]
                    ],
                ],
            ],
            'form' => [
                'name' => '表单',
                'icon' => file_get_contents(module_path('System/Static/Image/form.svg')),
                'hidden' => true,
                'order' => 1000,
                'url' => 'admin.tools.form'
            ],
            'form_data' => [
                'name' => $formInfo  ? $formInfo->menu : '表单',
                'icon' => file_get_contents(module_path('System/Static/Image/form.svg')),
                'hidden' => true,
                'order' => 1000,
                'url' => 'admin.tools.formData',
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
                'url' => 'admin.tools.form',
                'icon' => file_get_contents(module_path('System/Static/Image/form.svg'))
            ]
        ];
    }
}

