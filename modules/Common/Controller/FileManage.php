<?php

namespace Modules\Common\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileManage extends \App\Http\Controllers\Controller
{

    protected $hasType = 'admin';

    public function handle(Request $request)
    {
        $type = $request->get('type');
        $id = $request->get('id');
        $name = $request->get('name');
        $query = $request->get('query');
        $filter = $request->get('filter');

        $data = [];
        if ($type == 'folder') {
            $data = $this->getFolder();
        }
        if ($type == 'files') {
            $data = $this->getFile($id, $query, $filter);
        }
        if ($type == 'files-delete') {
            $data = $this->deleteFile($id);
        }
        if ($type == 'folder-create') {
            $data = $this->createFolder($name);
        }
        if ($type == 'folder-delete') {
            $data = $this->deleteFolder($id);
        }
        return app_success('ok', $data);
    }

    private function getFile($dirId, $query = '', $filter = 'all')
    {
        $totalPage = 1;
        $page = 1;
        $format = [
            'image' => 'jpg,png,bmp,jpeg,gif',
            'audio' => 'wav,mp3,acc,ogg',
            'video' => 'mp4,ogv,webm,ogm',
            'document' => 'doc,docx,xls,xlsx,pptx,ppt,csv,pdf',
        ];
        if ($dirId) {
            $data = module('Common.Model.File')->where('has_type', $this->hasType)->where('dir_id', $dirId);
            if ($query) {
                $data = $data->where('title', 'like', '%' . $query . '%');
            }
            if ($filter <> 'all') {
                if ($filter == 'other') {
                    $exts = implode(',', $format);
                    $data->whereNotIn('ext', explode(',', $exts));
                } else {
                    $filterData = explode(',', $filter);
                    $exts = [];
                    foreach ($filterData as $vo) {
                        $exts[] = $format[$vo];
                    }
                    $exts = implode(',', $exts);
                    $data->whereIn('ext', explode(',', $exts));
                }
            }
            $data = $data->orderBy('file_id', 'desc')->paginate(16, [
                'file_id', 'dir_id', 'url', 'title', 'ext', 'size', 'create_time'
            ]);
            $totalPage = $data->lastPage();
            $page = $data->currentPage();
            $data = $data->map(function ($item) use ($format) {
                $item->size = app_filesize($item['size']);
                $item->time = $item->create_time->format('Y-m-d H:i:s');
                if (in_array($item->ext, explode(',', $format['image']))) {
                    $item->cover = $item->url;
                } else {
                    $type = 'other';
                    foreach ($format as $key => $vo) {
                        if (in_array($item->ext, explode(',', $vo))) {
                            $type = $key;
                            break;
                        }
                    }
                    switch ($type) {
                        case 'audio':
                            $item->cover = '/static/system/img/icon/audio.svg';
                            break;
                        case 'video':
                            $item->cover = '/static/system/img/icon/video.svg';
                            break;
                        case 'document':
                            $item->cover = '/static/system/img/icon/doc.svg';
                            break;
                        default:
                            $item->cover = '/static/system/img/icon/other.svg';
                            break;
                    }
                }
                return $item;
            })->toArray();
        } else {
            $data = [];
        }
        return [
            'data' => $data,
            'total' => $totalPage,
            'page' => $page
        ];
    }

    private function getFolder()
    {
        return module('Common.Model.FileDir')->where('has_type', $this->hasType)->get()->toArray();
    }

    private function createFolder($name)
    {
        if (empty($name)) {
            trigger_error('请输入目录名称');
        }
        $file = module('Common.Model.FileDir');
        $file->name = $name;
        $file->has_type = $this->hasType;
        $file->save();
        return [
            'id' => $file->dir_id,
            'name' => $name,
        ];
    }

    private function deleteFolder(int $id)
    {
        if (empty($id)) {
            trigger_error('请选择目录');
        }

        $files = module('Common.Model.File')->where('has_type', $this->hasType)->where('dir_id', $id)->get([
            'driver', 'path'
        ]);
        $files->map(function ($vo) {
            Storage::disk($vo->driver)->delete($vo->path);
        });
        module('Common.Model.File')->where('file_id', $id)->delete();
        module('Common.Model.FileDir')->where('dir_id', $id)->delete();
        return [];
    }

    private function deleteFile($ids)
    {
        $ids = array_filter(explode(',', $ids));
        if (empty($ids)) {
            trigger_error('请选择删除文件');
        }
        $files = module('Common.Model.File')->where('has_type', $this->hasType)->whereIn('dir_id', $ids)->get([
            'driver', 'path'
        ]);
        $files->map(function ($vo) {
            Storage::disk($vo->driver)->delete($vo->path);
        });
        module('Common.Model.File')->whereIn('file_id', $ids)->delete();
        return [];
    }

}
