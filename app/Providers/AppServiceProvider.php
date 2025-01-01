<?php

namespace App\Providers;

use App\Faker\FakerImageProvider;
use Carbon\CarbonInterval;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new FakerImageProvider($faker));

            return $faker;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(! app()->isProduction());

        if (app()->isProduction()) {
            DB::listen(function (QueryExecuted $query) {
                if ($query->time > 100) {
                    logger()->channel('telegram')->debug('query longer than 1ms: '.$query->sql, $query->bindings);
                }
            });

            app()->whenRequestLifecycleIsLongerThan(CarbonInterval::seconds(4), function () {
                logger()->channel('telegram')->debug('whenRequestLifecycleIsLongerThan: '.request()->url());
            });
        }
    }
}
