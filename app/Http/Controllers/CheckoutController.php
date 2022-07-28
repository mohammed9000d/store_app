<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Http\Traits\CartTrait;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //
    use CartTrait;

    public function create()
    {
        return view('front.checkout', [
            'user' => Auth::user(),
            'cart' => $this->all(),
            'total' => $this->total()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'billing_name' => 'required|string',
            'billing_email' => 'required|email',
            'billing_phone' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_country' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $request->merge([
                'total' => $this->total(),
            ]);
//            dd($request->all());
            $order = Order::create($request->all());

            $items = [];
            foreach($this->all() as $item) {
                $items[] = [
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ];
            }
            DB::table('order_items')->insert($items);
            DB::commit();
            event(new OrderCreated($order));
            return redirect()->route('orders')->with('success', 'Order created successfully');
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }
    }
}
