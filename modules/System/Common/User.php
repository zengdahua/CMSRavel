<?php

namespace Modules\System\Common;

use Illuminate\Validation\Rule;

trait User
{

    protected function table()
    {
        $table = new \Modules\Common\UI\Table(new $this->model());
        $table->title('用户管理');
        $table->action()->button('添加', $this->route . '.page')->type('dialog');

        $table->column('#', 'user_id')->width(80);
        $table->column('用户名', 'username');
        $table->column('昵称', 'nickname');

        $table->column('状态', 'status')->status([
            1 => '正常',
            0 => '禁用'
        ], [
            1 => 'blue',
            0 => 'red'
        ]);

        $column = $table->column('操作')->width(200);
        $column->link('编辑', $this->route .  '.page', ['id' => 'user_id'])->type('dialog');
        $column->link('删除', $this->route .  '.del', ['id' => 'user_id'])->type('ajax')->data(['type' => 'post']);

        $table->filter('用户名', 'username', function ($query, $value) {
            $query->where('username', 'like', '%' . $value . '%');
        })->text('请输入用户名搜索')->quick();


        return $table;
    }

    public function form(int $id = 0)
    {
        $form = new \Modules\Common\UI\Form(new $this->model());
        $form->dialog(true);

        $form->text('用户名', 'username')->verify([
            'required',
            'min:4',
            Rule::unique((new $this->model)->getTable())->ignore($id, 'user_id'),
        ], [
            'required' => '请填写用户名',
            'unique' => '用户名不能重复',
            'min' => '用户名不能少于4位',
        ]);

        $form->text('昵称', 'nickname')->verify('required', [
            'required' => '请填写昵称',
        ]);

        $form->password('密码', 'password')->verify('required|min:4', [
            'required' => '请填写密码',
            'min' => '密码不能少于4位',
        ], 'add')->verify('nullable|min:4', [
            'min' => '密码不能少于4位',
        ], 'edit')->value('')->help($id ? '不修改密码请留空' : '');

        $form->radio('状态', 'status', [
            1 => '启用',
            0 => '禁用',
        ]);

        return $form;
    }

}
