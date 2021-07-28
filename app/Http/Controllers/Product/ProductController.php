<?php

namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $products = Product::query()->get();

        return response()->json($products, 200);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        DB::transaction(function () use ($request) {
            $this->service
                ->setAttrs($request->only('title', 'description', 'price', 'image'))
                ->store();
        });

        return response()->json('Product has been created successfully', 200);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json($product, 200);
    }

    public function update(ProductRequest $request, Product $product): JsonResponse
    {
        DB::transaction(function () use ($request, $product) {
            $this->service
                ->setAttrs($request->only('title', 'description', 'price', 'image'))
                ->setModel($product)
                ->save();
        });

        return response()->json('Product has been updated successfully', 200);
    }

    public function delete(Product $product): JsonResponse
    {
        $this->service ->setModel($product)->delete();

        return response()->json('Product has been deleted successfully', 200);
    }

}
