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

        $check = DB::table('pos')->where('pro_id', $id)->first();

        if ($check) {
            DB::table('pos')->where('pro_id', $id)->increment('pro_quantity');

            $product = DB::table('pos')->where('pro_id', $id)->first();

            $subtotal = $product->pro_quantity * $product->product_price;

            DB::table('pos')->where('pro_id', $id)->update(['sub_total' => $subtotal]);
        } else {
            $data = [
                'pro_id' => $id,
                'pro_name' => $product->product_name,
                'pro_quantity' => 1,
                'product_price' => $product->selling_price,
                'sub_total' => $product->selling_price,
            ];

            DB::table('pos')->insert($data);
        }
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

    public function increment($id)
    {
        $increment = DB::table('pos')->where('id', $id)->increment('pro_quantity');

        $product = DB::table('pos')->where('id', $id)->first();

        $subtotal = $product->pro_quantity * $product->product_price;

        DB::table('pos')->where('id', $id)->update(['sub_total' => $subtotal]);

        return response('Success');
    }

    public function decrement($id)
    {
        $increment = DB::table('pos')->where('id', $id)->decrement('pro_quantity');

        $product = DB::table('pos')->where('id', $id)->first();

        $subtotal = $product->pro_quantity * $product->product_price;

        DB::table('pos')->where('id', $id)->update(['sub_total' => $subtotal]);

        return response('Success');
    }

    public function vat()
    {
        $vat = DB::table('extra')->first();

        return response()->json($vat);
    }
}
