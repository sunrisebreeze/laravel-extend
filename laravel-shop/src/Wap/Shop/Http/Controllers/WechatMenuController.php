<?php
namespace Sunriseqf\LaravelShop\Wap\Shop\Http\Controllers;

class WechatMenuController extends Controller
{
    public function index()
    {
//        dd(config());
        return app('wechat.official_account')->menu->create(config('wap.shop.wechat.buttons'));
    }
}