<?php
namespace Sunriseqf\LaravelShop\Wap\Member\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Sunriseqf\LaravelShop\Wap\Member\Models\User;
use Sunriseqf\LaravelShop\Wap\Member\Facades\Member;
class AuthorizationsController extends Controller
{

    public function wechatStore()
    {
        $wechatUser = session('wechat.oauth_user.default');
        $user = User::where(['wechat_openid'=>$wechatUser->id])->first();
        if (!$user)
        {
            $user = User::create([
                'nick_name' => $wechatUser->name,
                'wechat_openid' => $wechatUser->id,
                'image_head' => $wechatUser->avatar
            ]);
        }
        Member::guard()->login($user);
        var_dump( Member::guard()->check());
        return '通过';
    }
}