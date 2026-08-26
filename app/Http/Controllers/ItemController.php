<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use App\Services\InventoryService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    // Eager loading 'category' untuk mencegah N+1 Query Problem
    public function index(): JsonResponse
    {
        $items = Item::with('category')->latest()->paginate(15);

        return response()->json([
            'status' => 'success',
            'data'   => $items
        ], Response::HTTP_OK);
    }

    public function store(StoreItemRequest $request): JsonResponse
    {
        $item = $this->inventoryService->createItem($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'Barang berhasil ditambahkan.',
            'data'    => $item
        ], Response::HTTP_CREATED);
    }
}