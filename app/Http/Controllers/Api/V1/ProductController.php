<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    // index() - list + paginate + optional filter
    public function index(Request $request): AnonymousResourceCollection
    {
        $products = Product::query()
            ->when($request->boolean('active_only'), fn ($q) => $q->where('is_active', true))
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return ProductResource::collection($products);
    }

    // store() create new data and validate via StoreProductRequest
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    // show() - get single data auto-find by id Gak perlu manual findOrFail
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    // update() - partial update validated via UpdateProductRequest
    public function update(UpdateProductRequest $request, Product $product) : ProductResource
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }

    // destroy() - delete product by id
    public function destroy(Product $product) : JsonResponse
    {
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully'], 200);
    }
}
