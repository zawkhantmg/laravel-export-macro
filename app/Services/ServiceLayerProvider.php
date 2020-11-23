<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

class ServiceLayerProvider extends ServiceProvider
{
    /**
     * register
     *
     * @return void
     */
    public function register()
    {
        // Student
        $this->app->bind(
            'App\Services\Student\StudentServiceInterface',
            'App\Services\Student\StudentService'
        );
    }
}
