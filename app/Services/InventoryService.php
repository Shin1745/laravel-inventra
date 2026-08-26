<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

class InventoryService
{
    public function createItem(array $data): Item
    {
        return DB::transaction(function () use ($data) {
            $data['item_code'] = strtoupper($data['item_code']);
            return Item::create($data);
        });
    }

    public function updateStock(Item $item, int $quantity): Item
    {
        return DB::transaction(function () use ($item, $quantity) {
            $item->increment('stock', $quantity);
            return $item;
        });
    }
}