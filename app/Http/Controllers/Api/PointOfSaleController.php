<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DateTime;

class PointOfSaleController extends Controller
{
    public function getProduct($id)
    {
        $product = Product::where('category_id', $id)->get();

        return response()->json($product);
    }

    public function orderDone(Request $request)
    {
        $validateData = $request->validate([
            'customer_id' => 'required',
            'payment_method' => 'required',
        ]);

        $order = [
            'customer_id' => $request->customer_id,
            'qty' => $request->qty,
            'sub_total' => $request->subtotal,
            'vat' => $request->vat,
            'total' => $request->total,
            'pay' => $request->pay,
            'due' => $request->due,
            'payment_method' => $request->payment_method,
            'order_date' => date('d/m/Y'),
            'order_month' => date('F'),
            'order_year' => date('Y'),
        ];

        $order_insert = DB::table('orders')->insertGetId($order);

        $contents = DB::table('pos')->get();

        foreach ($contents as $content) {
            $order_details = [
                'order_id' => $order_insert,
                'product_id' => $content->pro_id,
                'pro_quantity' => $content->pro_quantity,
                'product_price' => $content->product_price,
                'sub_total' => $content->sub_total,
            ];

            DB::table('order_details')->insert($order_details);

            DB::table('products')
                ->where('id', $content->pro_id)
                ->update(['product_quantity' => DB::raw('product_quantity - ' . $content->pro_quantity)]);
        }

        DB::table('pos')->delete();
        return response('Success');
    }

    public function searchOrder(Request $request)
    {
        $orderdate = $request->date;
        $newdate = new DateTime($orderdate);
        $done = $newdate->format('d/m/Y');

        $order = DB::table('orders')
            ->join('customers', 'orders.customer_id', 'customers.id')
            ->select('customers.name', 'orders.*')
            ->where('orders.order_date', $done)
            ->get();

        return response()->json($order);
    }

    public function todaySell()
    {
        $date = date('d/m/Y');

        $today = DB::table('orders')->where('order_date', $date)->sum('total');
        return response()->json($today);
    }

    public function todayIncome()
    {
        $date = date('d/m/Y');

        $income = DB::table('orders')->where('order_date', $date)->sum('pay');
        return response()->json($income);
    }

    public function todayDue()
    {
        $date = date('d/m/Y');

        $todaydue = DB::table('orders')->where('order_date', $date)->sum('due');
        return response()->json($todaydue);
    }

    public function todayExpense()
    {
        $date = date('Y/m/d');

        $todayexpense = DB::table('expenses')->where('expense_date', $date)->sum('amount');
        return response()->json($todayexpense);
    }

    public function stockOut()
    {
        $product = DB::table('products')->where('product_quantity', '<', '1')->get();

        return response()->json($product);
    }
}
