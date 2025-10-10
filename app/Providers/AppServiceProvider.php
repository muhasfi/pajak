<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::enforceMorphMap([
        'item'      => \App\Models\Item::class,
        'bimbel'    => \App\Models\ItemBimbel::class,
        'paper'    => \App\Models\ItemPaper::class,
    ]);
    }
}
