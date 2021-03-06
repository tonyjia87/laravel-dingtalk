<?php

namespace cjango\Dingtalk;

use EasyDingTalk\Application;
use Illuminate\Support\ServiceProvider;

class DingtalkProvider extends ServiceProvider
{

    protected $defer = true;

    public function boot()
    {
        // 发布配置
        $source = realpath(__DIR__ . '/config.php');
        $this->publishes([
            $source => config_path('dingtalk.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton('dingtalk', function ($app) {
            $config = config('dingtalk');
            return new Application($config);
        });
    }

    public function provides()
    {
        return ['dingtalk'];
    }
}
