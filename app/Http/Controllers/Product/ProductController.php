<?php

namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Services\Product\ProductService;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function store(ProductRequest $request): JsonResponse
    {
        try {
            DB::transaction(function () use ($request) {
                $this->service
                    ->setAttrs($request->only('title', 'description', 'price', 'image'))
                    ->store();
            });
            return response()->json('Product has been created successfully', 200);

        }catch (\Exception $exception) {

            return response()->json($exception, 200);
        }

    }
}
