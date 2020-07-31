<?php

Route::get('/authTest', function () {
//    dd(Auth::guard('member'));
//     dd(config());
     dd(config('wap.member.auth.guard'));
});
Route::get('/wechatStore','AuthorizationsController@wechatStore')->middleware('wechat.oauth');

