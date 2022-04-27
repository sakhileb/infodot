<?php

namespace App\Providers;

use App\Models\Solutions;
use App\Models\Questions;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        Relation::morphMap([
            'solutions' => Solutions::class,
            'questions' => Questions::class
        ]);
    }
}
