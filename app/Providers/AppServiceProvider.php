<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Setting;
use App\Film;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Cố định dữ liệu ở tất cả các view
     *
     * @return void
     */
    public function boot()  //khởi động cùng hệ thống
    {
        //
        View::composer('*', function ($view) {
            $slide = Film::where('is_slide', 1)->get();
            $topRate = Film::where('disable', 0)->orderBy('total_vote', 'DESC')->limit(10)->get();
            $view->with(['slide' => $slide, 'setting' => Setting::find(1), 'topRate' => $topRate]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
