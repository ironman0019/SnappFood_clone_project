<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderFoodItem;
use App\Models\Resturent;
use App\Models\ResturentTag;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\form;

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
        $orders = Order::where('user_id', $user->id)->latest()->get();

        return view('home', [
            'resturents' => $resturents,
            'categories' => $categories,
            'foods' => $foods,
            'newResturents' => $newResturents,
            'orders' => $orders,
        ]);
    }

    public function foodOrder($id)
    {
        
        $foods = Food::where('resturent_id', $id)->get();
        $resturent = Resturent::find($id);

        if(!$resturent) {
            return redirect('/home');
        }

        return view('food_order', [
            'foods' => $foods,
            'resturent' => $resturent,
            'resturentId' => $id
        ]);
    }

    public function foodOrderStore(Request $request)
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

        if($resturent->status === 'closed') {
            return response()->json(['success' => false, 'message' => 'Sorry! Resturent is closed!']);
        }

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


    // Show categories page
    public function categories($cat_id)
    {
        $category = ResturentTag::find($cat_id);
        if(!$category) {
            return redirect('/home');
        }

        $resturents = Resturent::where('tag', $category->tag)->get();
        return view('category', ['resturents' => $resturents, 'category' => $category]);
    }


    // Show all foods in food party
    public function allFoodParty()
    {
        $foods = Food::where('food_party', 1)->get();
        return view('see_all_foodparty', ['foods' => $foods]);
    }

    // Update user address
    public function updateUserAddress(Request $request)
    {
        $formFields = $request->validate([
            'address' => 'required|string|min:8'
        ]);

        // Update user
        $userId = auth()->user()->id;
        $user = User::where('id', $userId);
        $user->update($formFields);

        // Redirect user
        return redirect('/home')->with('message', 'User info updated!');
    }


    // Delete user address
    public function deleteUserAddress()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId);
        $user->update(['address' => '']);

        return redirect('/home')->with('delMessage', 'user address deleted!');
    }

    // Show order detaile
    public function orderDetaile($id)
    {
        $order = Order::find($id);
        if(!$order) {
            return redirect('/home');
        }

        // Food items for order
        $foodItems = OrderFoodItem::where('order_id', $id)->get();

        return view('order_detaile', ['order' => $order, 'foodItems' => $foodItems]);
    }


    // Repeat order
    public function reOrder($order_id)
    {
        $order = Order::find($order_id);
        if(!$order) {
            return redirect('/home');
            exit;
        }

        $resturent = Resturent::find($order->resturent_id);
        $foodItems = OrderFoodItem::where('order_id', $order_id)->get();
        $totalPrice = 0;

        foreach ($foodItems as $foodItem) {
            $totalPrice = $foodItem->food->price * $foodItem->quantity_ordered + $totalPrice;
        }

        // Create order
        Order::create([
            'user_id' => $order->user_id,
            'resturent_id' => $order->resturent_id,
            'address' => $order->address,
            'delivary_fee' => $resturent->delivary_price,
            'total_amount' => $totalPrice
        ]);

        // Find the order just created
        $order = Order::where('user_id', auth()->user()->id)->where('created_at', now())->first();

        // Create order_items
        foreach($foodItems as $foodItem) {
            OrderFoodItem::create([
                'order_id' => $order->id,
                'food_id' => $foodItem->food_id,
                'quantity_ordered' => $foodItem->quantity_ordered
            ]);
        }

        return redirect('/home')->with('message', 'Your order submited successfully!');

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
