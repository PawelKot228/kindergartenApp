<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Filament::registerNavigationGroups([
            'School',
            'People',
            'Settings',
        ]);
    }
}
