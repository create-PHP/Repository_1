<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 
use think\Route;
Route::rule('admin/product/index','admin/product/index');
Route::rule('admin/product/type','admin/product/type','POST');
Route::rule('admin/product/list','admin/product/list');
Route::rule('admin/product/ajax_type','admin/product/ajax_type');
//================================================================
Route::rule('admin/goods/index','admin/goods/index');
Route::rule('admin/goods/list','admin/goods/list');
Route::rule('admin/goods/add','admin/goods/add');
Route::rule('api/upload/index','api/upload/index');


return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
];
