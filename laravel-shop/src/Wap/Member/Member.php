<?php
namespace Sunriseqf\LaravelShop\Wap\Member;

use Illuminate\Support\Facades\Auth;

class Member
{
    public function guard()
    {
        return Auth::guard(config('wap.member.auth.guard'));
    }
}