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
        'paper'     => \App\Models\ItemPaper::class,
        'brevetab'  => \App\Models\ItemBrevetAB::class,
        'brevetc'  => \App\Models\ItemBrevetC::class,
        'webinar'   => \App\Models\ItemWebinar::class,
        'seminar'   => \App\Models\ItemSeminar::class,
        'training'  => \App\Models\ItemTraining::class,
        'accountingservice'  => \App\Models\ItemAccountingService::class,
        'itemlayananpt'  => \App\Models\ItemLayananPT::class,
        'itempajak'  => \App\Models\ItemPajak::class,
        'itemlitagasi'  => \App\Models\ItemLitigasi::class,
        'itemaudit'  => \App\Models\ItemAudit::class,
        'itemtransfer'  => \App\Models\ItemTransfer::class,
        'itemkonsultasi'  => \App\Models\ItemKonsultasi::class,
    ]);
    }
}
