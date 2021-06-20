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
                        'order' => 0,
                        'menu' => [
                            ...$menuList
                        ]
                    ],
                ],
            ],

        ];
    }
}

