<?php

namespace Modules\System\Traits;

/**
 * Class Form
 * @package Modules\Common\Model
 */
trait Form
{
    public function form(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(\Modules\System\Model\FormData::class, 'has', 'has_type');
    }

    /**
     * 保存表单
     * @param $formId
     * @param $data
     * @return bool
     */
    public function formSave($formId, $data): bool
    {
        $id = $this->{$this->primaryKey};
        if (!$id || !$formId) {
            return false;
        }
        return \Modules\System\Service\Form::saveForm($formId, $data, $id, get_called_class());
    }

    /**
     * 删除表单
     * @return bool
     */
    public function formDel(): bool
    {
        $id = $this->{$this->primaryKey};
        if (!$id) {
            return false;
        }
        return $this->form()->delete();
    }

}
