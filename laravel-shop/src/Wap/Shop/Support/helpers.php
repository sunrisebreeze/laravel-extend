<?php

if (! function_exists('shop_asset')) {
    /**
     * Generate an shop_asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function shop_asset($path, $secure = null)
    {
        $path = 'vendor/sunrise/laravel-wap-shop/' . $path;
        return app('url')->asset($path, $secure);
    }
}