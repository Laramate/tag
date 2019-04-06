<?php

namespace Laramate\Tag\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Laramate\Tag\Models\Tag;

class TagServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Relation::morphMap([
            'tag' => Tag::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
            $this->loadMigrationsFrom(__DIR__.'/../Migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/Config.php', 'tag');
    }

    /**
     * Register the package's publishable resources.
     */
    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../Config/Config.php' => config_path('tag.php'),
        ], 'laramate-tag-config');

        $this->publishes(
            [__DIR__.'/../Migrations' => database_path('migrations')],
            'laramate-tag-migrations'
        );
    }
}
