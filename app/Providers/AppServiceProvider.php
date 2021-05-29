<?php

namespace App\Providers;

use App\groupe;
use App\Personnel;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $groupe = groupe::all();
        view()->share('groupe', $groupe);

        $groupes = groupe::all();
        view()->share('groupes', $groupes);

        $contactUpdate = groupe::all();
        view()->share('item', $contactUpdate);

        $contact = Personnel::all();
        view()->share('contact', $contact);

        $favoriss = Personnel::where('favoris', '=', '1')->get();
        view()->share('favoriss', $favoriss);

    }
}
