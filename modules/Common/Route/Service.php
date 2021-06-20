<?php
// 占位图
Route::get('image/placeholder/{w}/{h}/{t}', [Modules\Common\Web\Image::class, 'placeholder'])->name('service.image.placeholder');

// 省市区街道数据
Route::get('area', [Modules\Common\Web\Area::class, 'index'])->name('service.area');
