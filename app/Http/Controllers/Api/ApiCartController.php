<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cart as ResourcesCart;
use App\Http\Resources\CartCollection;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Http\Request;

class ApiCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CartCollection(Cart::all()->where('user_id', auth()->user()->id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foodsId = $request->input('food_id');
        $quantities = $request->input('quantities');
        $i = 0;

        foreach($foodsId as $foodId) {
            $food = Food::find($foodId);
            if(!$food) {
                return response([
                    'message' => 'page not found!'
                ],404);
            }
            $resturentId = $food->resturent_id;
            // Create cart
            Cart::create([
                'user_id' => auth()->user()->id,
                'food_id' => $food->id,
                'resturent_id' => $resturentId,
                'quantity' => $quantities[$i]
            ]);
            $i++;
        }
        return response([
            'message' => 'cart created!'
        ],201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cart = Cart::findOrfail($id);
        if($cart->user_id !== auth()->user()->id) {
            return response('Unauthtenticated!', 401);
        }
        return new ResourcesCart(Cart::findOrfail($id));
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
        $cart = Cart::findOrfail($id);
        if($cart->user_id !== auth()->user()->id) {
            return response('Unauthtenticated!', 401);
        }

        $cart->delete();

        return response([
            'message' => 'cart deleted!'
        ],200);

    }
}
