<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderFoodItem;
use App\Models\Resturent;
use App\Models\ResturentTag;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ResturentTag::all();

        return view('index', [
            'categories' => $categories
        ]);
    }

    // Show index page when user logged in!
    public function home()
    {
        $user = auth()->user();
        $resturents = Resturent::where('city', $user->city)->paginate(10);
        $categories = ResturentTag::all();
        $foods = Food::where('food_party', 1)->get();
        $newResturents = Resturent::latest()->paginate(4);

        return view('home', [
            'resturents' => $resturents,
            'categories' => $categories,
            'foods' => $foods,
            'newResturents' => $newResturents,
        ]);
    }

    public function foodOrder($id)
    {
        
        $foods = Food::where('resturent_id', $id)->get();
        return view('food_order', [
            'foods' => $foods,
            'resturentId' => $id
        ]);
    }

    public function addToCart(Request $request)
    {

        // Get the order data from the AJAX request
        $orderData = $request->input('order');
        $resturentId = $request->input('resturentId');
        $totalPrice = $request->input('totalPrice');

        if (!$orderData || count($orderData) === 0) {
            return response()->json(['success' => false, 'message' => 'No items in order']);
        }

        // Find the resturent
        $resturent = Resturent::find($resturentId);

        // Create order
        Order::create([
            'user_id' => auth()->user()->id,
            'resturent_id' => $resturentId,
            'address' => auth()->user()->address,
            'delivary_fee' => $resturent->delivary_price,
            'total_amount' => $totalPrice
        ]);

        // Find the order just created
        $order = Order::where('user_id', auth()->user()->id)->where('created_at', now())->first();

        foreach ($orderData as $item) {
            // You can access $item['id'], $item['name'], $item['price'], and $item['quantity']
            // For example:
            // Order::create(['food_id' => $item['id'], 'quantity' => $item['quantity'], ...]);
            // Crate order_food_item
            OrderFoodItem::create([
                'order_id' => $order->id,
                'food_id' => $item['id'],
                'quantity_ordered' => $item['quantity']
            ]);
        }

        // Respond with success
        return response()->json(['success' => true, 'message' => 'Order Submitted!']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
