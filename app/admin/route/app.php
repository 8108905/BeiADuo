<?php
/**
 * Name：莱奥坚果
 * Author: Andy
 * 官网：https://www.LAJG.com
 * @date 1/10/21 9:18 PM
 * 漫画 小说 动漫 APP一体化商用解决方案
 */

use think\facade\Route;

Route::get('/','Index/index');
Route::get('welcome','Index/welcome');
Route::get('dashboard','Index/dashboard');
Route::get('setting','Index/setting');
Route::get('website_setting','Index/website_setting');
Route::post('website_setting','Index/website_setting_save');

Route::get('theme_setting','Index/theme_setting');
Route::post('theme_setting','Index/theme_setting_save');

Route::get('alertSkin','Index/alertSkin');
Route::rule('login','Index/login','GET|POST');
Route::get('logout','Index/logout');

Route::delete('users/batchDel','Users/batchDel');
Route::get('users/getAll','Users/getAll');
Route::get('users/:id/loginLogData','Users/loginLogData'); //获取单个用户登陆记录data
Route::get('users/:id/loginLogPage','Users/loginLogPage'); //获取单个用户登陆记录页面
Route::resource('users','Users');

Route::delete('userLoginLogs/batchDel','userLoginLogs/batchDel');
Route::get('userLoginLogs/getAll','UserLoginLogs/getAll');
Route::resource('userLoginLogs','UserLoginLogs');

Route::get('categories/getAll','Categories/getAll');
Route::resource('categories','Categories');

Route::get('themes/getAll','Themes/getAll');
Route::resource('themes','Themes');

Route::get('booths/getAll','Booths/getAll');
Route::resource('booths','Booths');

Route::get('links/getAll','Links/getAll');
Route::resource('links','Links');

Route::get('banners/getAll','Banners/getAll');
Route::resource('banners','Banners');

Route::post('common/upload','Common/uploadImage');

Route::get('cards/getAll','Cards/getAll');
Route::get('cards/recharge','Cards/recharge');
Route::post('cards/recharge','Cards/rechargePost');
Route::delete('cards/batchDel','Cards/batchDel');
Route::resource('cards','Cards');

Route::get('comments/getAll','Comments/getAll');
Route::resource('comments','Comments');

Route::get('whiteboards/getAll','Whiteboards/getAll');
Route::resource('whiteboards','Whiteboards');

Route::get('comics/getAll','Comics/getAll');
Route::delete('comics/batchDel','Comics/batchDel'); //批量删除
Route::put('comics/batchUnLock','Comics/batchUnLock'); //批量上架
Route::put('comics/batchLock','Comics/batchLock'); //批量下架
Route::get('comics/addChapter/:id','Comics/addChapter'); //新建章节
Route::get('comics/editChapter/:id','Comics/editChapter'); //新建章节

Route::get('comics/:id/getAllChapters','Comics/getAllChapters');
Route::get('comics/getAllReview','Comics/getAllReview');
Route::get('comics/review','Comics/review'); //审核章节
Route::get('comics/getAllReject','Comics/getAllReject');
Route::get('comics/reject','Comics/reject'); //拒绝章节漫画

Route::delete('chapters/batchDel','Chapters/batchDel'); //批量删除
Route::put('chapters/batchUnLock','Chapters/batchUnLock'); //批量上架
Route::put('chapters/batchLock','Chapters/batchLock'); //批量下架
Route::get('chapters/:id/images','Chapters/images'); //新建章节


Route::get('chapters/getAllReview','Chapters/getAllReview');
Route::get('chapters/review','Chapters/review'); //审核漫画


Route::get('chapters/getAllReject','Chapters/getAllReject');
Route::get('chapters/reject','Chapters/reject'); //拒绝审核漫画

Route::post('images/saveImage/:id','Images/saveImage'); //新建章节图片

Route::resource('comics','Comics');
Route::resource('chapters','Chapters');
Route::resource('images','Images');


