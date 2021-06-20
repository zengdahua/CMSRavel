<?php

namespace Modules\System\Admin;

use Illuminate\Support\Facades\DB;
use Modules\Common\UI\Table;
use Modules\Common\UI\Widget;

class VisitorOperate extends \Modules\System\Admin\Expend
{

    public string $model = \Modules\Common\Model\VisitorOperate::class;

    protected function table(): Table
    {
        $table = new \Modules\Common\UI\Table(new $this->model());
        $table->title('操作日志');
        $table->model()->orderBy('operate_id', 'desc');

        $table->filter('管理员', 'user_id', function ($query, $value) {
            $query->where('has_id', $value);
        })->select([], function ($object) {
            $object->search(route('admin.system.user.data'));
        })->quick();

        $table->filter('开始日期', 'start', function ($query, $value) {
            $query->where('create_time', '>=', strtotime($value));
        })->date();
        $table->filter('结束日期', 'stop', function ($query, $value) {
            $query->where('update_time', '<=', strtotime($value));
        })->date();

        $table->column('管理员', 'admin.username')->desc('admin.nickname');
        $table->column('页面', 'desc', function ($value, $item) {
            return Widget::Badge($item['method'], function (Widget\Badge $badge) use ($item) {
                    $badge->size('small');
                    if ($item['method'] == 'GET') {
                        $badge->color('blue');
                    } else {
                        $badge->color('red');
                    }
                }) . ' ' . $item['desc'];
        })->desc('name');
        $table->column('客户端', 'ip')->desc('ua', function ($value, $item) {

            $html = [];
            if ($item->mobile) {
                $html[] = Widget::Icon('fa fa-phone');
            } else {
                if ($item->device === 'OS X') {
                    $html[] = Widget::Icon('fab fa-apple');
                } elseif ($item->device === 'Windows') {
                    $html[] = Widget::Icon('fab fa-windows');
                } else {
                    $html[] = Widget::Icon('fab fa-linux');
                }
            }
            return implode(' ', $html) . ' ' . $item->device . ' - ' . $item->browser;
        });
        $table->column('操作时间', 'update_time')->desc('time', function ($value) {
            return $value . 's';
        });


        $column = $table->column('详情');
        $column->link('查看数据', 'admin.system.operate.info', ['id' => 'operate_id'])->type('dialog')->data(['size' => 'large']);

        return $table;
    }

    public function loadData()
    {
        $apiList = app(\Modules\Common\Model\VisitorOperate::class)
            ->orderBy('create_time', 'desc')
            ->where('has_type', 'admin')
            ->where('has_id', auth('admin')->user()->user_id)
            ->limit(10)
            ->get(['method', 'name', 'route', 'desc', 'time', 'create_time']);

        $this->assign('apiList', $apiList);
        return $this->dialogView();
    }

    public function info($id)
    {
        $info = app(\Modules\Common\Model\VisitorOperate::class)
            ->find($id);

        $params = $info['params'];

        $data = [];
        foreach ($params as $key => $vo) {
            $data[] = [
                'name' => $key,
                'value' => $vo
            ];
        }
        $table = new \Modules\Common\UI\Table(collect($data));
        $table->limit(50);
        $table->column('键', 'name');
        $table->column('值', 'value');
        $table->dialog(true);
        return $table->render();
    }

}
