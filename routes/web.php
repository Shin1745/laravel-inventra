<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Services\InventoryService;

Route::get('/', function () {
    // Buat/ambil kategori 'General Electronics'
    Category::firstOrCreate(['name' => 'General Electronics']);
    
    $items = Item::with('category')->latest()->get();
    return view('inventory', compact('items'));
});

Route::post('/items', function (StoreItemRequest $request, InventoryService $service) {
    $service->createItem($request->validated());
    return redirect('/');
});