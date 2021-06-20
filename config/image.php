<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => env('IMAGE_DRIVER', 'gd'),


    /**
     * 上传图片默认配置
     */
    'thumb'             => env('IMAGE_THUMB'),
    'thumb_width'       => env('IMAGE_THUMB_WIDTH'),
    'thumb_height'      => env('IMAGE_THUMB_HEIGHT'),
    'water'       => env('IMAGE_WATER'),
    'water_alpha' => env('IMAGE_WATER_ALPHA', 80),
    'water_image'  => env('IMAGE_WATER_IMAGE'),

];
