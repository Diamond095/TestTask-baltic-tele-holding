<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateProductController extends Controller
{
    public function __invoke(ProductRequest $request, $id)
    {
        $adminRole = config('products.role');
        if ($request->user()->role === $adminRole) {
            $data = $request->validated();
            $product = Product::find($id)->update($data);
            $product2 = Product::find($id);
            $product2->data = $data['data'];
            $product2->save();
            return json_encode($product);
        } else {
            return response()->json(['error' => 'Доступ запрещен'], 403);
        }
    }
}
