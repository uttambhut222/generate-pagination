<?php

namespace TheOpenEyes\GeneratePagination;

use Illuminate\Support\ServiceProvider;

class GeneratePaginationServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton(GeneratePagination::class, function () {
            return new GeneratePagination();
        });
    }
}
