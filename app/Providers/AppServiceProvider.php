<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Contracts\StudentRepository::class,
            \App\Repositories\Eloquents\StudentRepositoryEloquent::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\CourseRepository::class,
            \App\Repositories\Eloquents\CourseRepositoryEloquent::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\DepartmentRepository::class,
            \App\Repositories\Eloquents\DepartmentRepositoryEloquent::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\OppidanRepository::class,
            \App\Repositories\Eloquents\OppidanRepositoryEloquent::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\ViolationRepository::class,
            \App\Repositories\Eloquents\ViolationRepositoryEloquent::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\WedRepository::class,
            \App\Repositories\Eloquents\WedRepositoryEloquent::class
        );
    }
}
