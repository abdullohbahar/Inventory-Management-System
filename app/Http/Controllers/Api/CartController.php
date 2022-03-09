<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        $data = [
            'pro_id' => $id,
            'pro_name' => $product->product_name,
            'pro_quantity' => 1,
            'product_price' => $product->selling_price,
            'sub_total' => $product->selling_price,
        ];

        DB::table('pos')->insert($data);
    }

    public function CartProduct()
    {
        $cart = DB::table('pos')->get();
        return response()->json($cart);
    }

    public function removeCart($id)
    {
        DB::table('pos')->where('id', $id)->delete();
    }
}
