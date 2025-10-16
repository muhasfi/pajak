<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\ItemDetail;

class ItemDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::factory(10)->create()->each(function ($item) {
        ItemDetail::factory()->create([
            'item_id' => $item->id,
        ]);
    });
    }
}
