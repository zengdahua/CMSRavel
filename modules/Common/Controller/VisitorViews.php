<?php

namespace Modules\Common\Controller;

use Illuminate\Support\Facades\DB;

class VisitorViews extends \App\Http\Controllers\Controller
{

    public function info()
    {
        $startTime = strtotime('-1 year');
        $hasType = request()->get('type');
        $hasId = request()->get('id');
        $data = app(\Modules\Common\Model\VisitorViewsData::class)
            ->select(DB::raw('SUM(pv) as pv, SUM(uv) as uv, date as label'))
            ->where('date', '>=', date('Ymd', $startTime))
            ->where('has_type', $hasType)
            ->where('has_id', $hasId)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $pvData = $data->map(function ($item) {
            $item['name'] = '访问量';
            $item['value'] = $item['pv'];
            return $item;
        })->toArray();
        $uvData = $data->map(function ($item) {
            $item['name'] = '访客量';
            $item['value'] = $item['uv'];
            return $item;
        })->toArray();
        $appChart = app(\Modules\Common\Util\ApexCharts::class)->area(array_merge($pvData, $uvData))->type('day', ['start' => date('Y-m-d', $startTime), 'stop' => date('Y-m-d')])->render('app-chart', function ($config) {
            \Arr::set($config, 'chart.height', 300);
            \Arr::set($config, 'chart.sparkline.enabled', false);
            \Arr::set($config, 'chart.zoom.enabled', false);
            \Arr::set($config, 'legend.show', true);
            return $config;
        });
        return dialog_view('', [
            'appChart' => $appChart
        ]);
    }

}
