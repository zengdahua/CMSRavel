<?php

namespace Modules\System\Model;

/**
 * Class Menu
 * @package Modules\System\Model
 */
class Menu
{

    public function getData(string $route = '', string $auth = '', bool $system = false)
    {
        $list = app_hook('service', 'Menu', 'getAdminMenu');

        $data = [];
        foreach ((array) $list as $value) {
            $data = array_merge_recursive((array) $data, (array) $value);
        }

        $ruleName = $route ?: request()->path();
        $ruleArr = explode('/', $ruleName);
        $ruleName = $ruleArr[0].'/'.$ruleArr[1] . ($ruleArr[2] ? '/'.$ruleArr[2] : '') . '/';

        $data = collect($data)->sortBy('order');
        $roleList = auth('admin')->user()->roles()->get();
        $purview = [];
        $roleList->map(function ($item) use (&$purview) {
            $purview = array_merge($purview, (array) $item->purview);
        });
        $purview = array_filter($purview);



        $list = [];
        foreach ($data as $app => $appList) {
            if (empty($appList['menu']) && empty($appList['url'])) {
                continue;
            }
            if ($appList['url'] && $purview && !in_array($appList['url'], $purview)) {
                continue;
            }
            $url = $appList['url'] ? route($appList['url'], $appList['params']) : '';
            $appData = [
                'name' => $appList['name'],
                'icon' => $appList['icon'],
                'url'  => $url,
                'topic' => $appList['topic'],
                'hidden' => $appList['hidden'] ? true : false,
                'target' => $appList['target'],
                'cur'  => false,
            ];
            if ($appList['url']) {
                if($this->contrastRoute($url, $ruleName)) {
                    $appData['cur'] = true;
                }
            } else {
                $parentData = [];
                $appList['menu'] = collect($appList['menu'])->sortBy('order')->values();
                foreach ($appList['menu'] as $parent => $parentList) {
                    $parentData[$parent] = [
                        'name' => $parentList['name'],
                    ];
                    if (empty($parentList['menu'])) {
                        continue;
                    }
                    $subData = [];
                    $parentList['menu'] = collect($parentList['menu'])->sortBy('order')->values();
                    foreach ($parentList['menu'] as $sub => $subList) {
                        if($purview && !in_array($subList['url'], $purview)) {
                            continue;
                        }
                        $url = route($subList['url'], $subList['params']);
                        $subData[$sub] = [
                            'name' => $subList['name'],
                            'url'  => $url,
                            'target' => $subList['target'],
                            'cur'  => false,
                        ];

                        if($this->contrastRoute($url, $ruleName)) {
                            $subData[$sub]['cur'] = true;
                            $appData['cur'] = true;
                        }
                    }
                    if (empty($subData)) {
                        unset($parentData[$parent]);
                    } else {
                        $parentData[$parent]['menu'] = $subData;
                    }
                    if (empty($parentData)) {
                        unset($parentData);
                    } else {
                        $appData['menu'] = $parentData;
                    }
                }
            }
            if (!empty($appData)) {
                $list[$app] = $appData;
            } else {
                unset($list[$app]);
            }
        }
        return $list;

    }

    public function contrastRoute($url, $value): bool
    {
        $path = trim(parse_url($url, PHP_URL_PATH), '/') . '/';
        if (strpos($path, $value, 0) === false) {
            return false;
        }else {
            return true;
        }
    }

}
