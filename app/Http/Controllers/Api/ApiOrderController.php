<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order as ResourcesOrder;
use App\Http\Resources\OrderCollection;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderFoodItem;
use App\Models\Resturent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new OrderCollection(Order::all()->where('user_id', auth()->user()->id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get the id of resturent based on the cart user select sending data in url
        $resturentId = $request->input('resturent_id');

        $delivaryFee = Resturent::find($resturentId);
        $carts =  Cart::where('user_id', auth()->user()->id)->where('resturent_id', $resturentId)->get();
        $totalAmount = 0;
        foreach($carts as $cart) {
            $foodPrice = Food::find($cart->food_id);
            $totalAmount = $foodPrice->price * $cart->quantity + $totalAmount;
        }

        // Create order
        Order::create([
            'user_id' => auth()->user()->id,
            'resturent_id' => $resturentId,
            'address' => auth()->user()->address,
            'delivary_fee' => $delivaryFee->delivary_price,
            'total_amount' => $totalAmount
        ]);

        $order = Order::where('user_id', auth()->user()->id)->where('created_at', now())->first();
        foreach($carts as $cart) {
            // Crate order_food_item
            OrderFoodItem::create([
                'order_id' => $order->id,
                'food_id' => $cart->food_id,
                'quantity_ordered' => $cart->quantity
            ]);
        }

        // Delete cart
        $carts =  Cart::where('user_id', auth()->user()->id)->where('resturent_id', $resturentId)->delete();
        

        return response([
            'message' => 'order created!'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
