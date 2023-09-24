<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    //
    public function __invoke(){
        $products=Product::available()->get();
        foreach($products as &$product){
          if($product['status']=="available"){
            $product['status']="Доступен";
          }
          else{
            $product['status']="Не доступен";
          }
        }
        return view('main', compact('products'));
       }
}
