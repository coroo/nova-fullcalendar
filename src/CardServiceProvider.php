<?php

namespace Coroowicaksono\NovaFullCalendar;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Route;

class CardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        $this->publishes([
            __DIR__ . '/../resources/db/migrations/create_nova_full_calendar_events_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_nova_full_calendar_events_table.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../resources/db/models/nfc_events.php.stub' => 'App\Models\Event.php',
        ], 'models');

        Nova::serving(function (ServingNova $event) {
            Nova::script('full-calendar-script', __DIR__ . '/../dist/js/full-calendar.js');
        });
    }

    /**
     * Register the card's routes.
     *
     * @return void
     */
    protected function routes()
    {
        // Route::middleware(['nova'])
        //         ->prefix('coroowicaksono/check-data')
        //         ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
