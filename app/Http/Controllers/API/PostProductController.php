<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Jobs\SendProductCreatedNotificationJob;

class PostProductController extends Controller
{

    public function __invoke(ProductRequest $request)
    {
        $adminRole = config('products.role');

        if ($request->user()->role === $adminRole) {
            $data = $request->validated();
            $product = Product::create($data);
            $product->data = $data['data'];
            $product->save();
            $product->update(['data' => $data['data']]);
            SendProductCreatedNotificationJob::dispatch();
        } else {
            return response()->json(['error' => 'Доступ запрещен'], 403);
        }
    }
}
