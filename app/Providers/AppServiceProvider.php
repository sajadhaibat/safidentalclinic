<?php

namespace App\Providers;

use App\Appointment;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        \Illuminate\Support\Facades\Schema::defaultStringLength('191');

        view()->composer('*', function ($view)
        {
            $today_appointmentss = Appointment::whereHas('patient',function($query){
                $query->where('new_appointment',date("Y-m-d"));
                $query->where('status',1);
            })->get();
            $today_appointments_count = Appointment::whereHas('patient',function($query){
                $query->where('new_appointment',date("Y-m-d"));
                $query->where('status',1);
            })->count();

                $view->with('today_appointments', $today_appointmentss);
            $view->with('today_appointments_count', $today_appointments_count);
            if (Auth::check()) {
                $profile = Profile::where('user_id', Auth::user()->id)->latest()->get()->first();
                $view->with('profile', $profile);
            }

        });


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
