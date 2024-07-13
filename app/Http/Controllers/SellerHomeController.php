<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodTag;
use App\Models\Order;
use App\Models\OrderFoodItem;
use App\Models\OrderStatus;
use App\Models\Resturent;
use App\Models\ResturentTag;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SellerHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Resturent id
        $resturentId = Seller::find(auth()->guard('seller')->id())->resturent->id;

        // Food items for our resturent orders
        $foodItems = OrderFoodItem::whereRelation('order', 'resturent_id', '=', $resturentId)->get();

        return view('sellers.dashbord',[
            'orders' => Order::latest()->where('resturent_id', $resturentId)->where('order_status','!=','resived')->paginate(4),
            'foodItems' => $foodItems,
        ]);
    }

    // Update order status
    public function orderStatusUpdate(Request $request, Order $order)
    {
        // validation rules
        $formFields = $request->validate([
            'order_status' => 'required|not_in:0|in:preparing,send,resived'
        ]);

        // Update order_status in order table
        $order->update($formFields);

        // Redirect user
        return back()->with('message', 'Order status updated!');
    }

    // Show order archive page
    public function orderArchive()
    {
        // Resturent id
        $resturentId = Seller::find(auth()->guard('seller')->id())->resturent->id;

        // Food items for our resturent orders
        $foodItems = OrderFoodItem::whereRelation('order', 'resturent_id', '=', $resturentId)->get();

        return view('sellers.order_archive', [
            'orders' => Order::latest()->where('resturent_id', $resturentId)->where('order_status', 'resived')->paginate(5),
            'foodItems' => $foodItems,
        ]);
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

    // Show resturent setting page
    public function resturentSetting()
    {
        // Get seller resturent data
        $seller_id = auth()->guard('seller')->id();
        $resturents = Resturent::where('seller_id', $seller_id)->get();
        foreach($resturents as $resturent) {
            $resturent;
        }

        return view('sellers.resturent_setting', ['resturent' => $resturent, 'tags' => ResturentTag::all()]);
    }

    // Update resturent setting
    public function updateResturentSetting(Request $request)
    {  
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'tag' => 'required|not_in:0',
            'phone' => 'required',
            'address' => 'required',
            'delivary_price' => ['required', 'numeric'],
            'work_hours' => 'required|not_in:0',
            'work_hours2' => 'required|not_in:0',
        ]);

        $formFields['work_hours'] = $formFields['work_hours']. '-'. $formFields['work_hours2'];
        array_pop($formFields); // deleting work_hours2

        // Update resturent setting
        $seller_id = auth()->guard('seller')->id();
        $resturent = Resturent::where('seller_id', $seller_id);
        $resturent->update($formFields);

        // redirect
        return back()->with('message', 'Resturent setting updated!');
    }

    // Update resturent status
    public function updateResturentStatus(Request $request)
    {
        $formFields = $request->validate([
            'status' => 'required|in:closed,open',
        ]);

        // Update resturent setting
        $seller_id = auth()->guard('seller')->id();
        $resturent = Resturent::where('seller_id', $seller_id);
        $resturent->update($formFields);

        // redirect
        return back()->with('message', 'Resturent status updated!');
    }

    // Show foods page
    public function foods()
    {
        // Resturent id
        $resturentId = Seller::find(auth()->guard('seller')->id())->resturent->id;

        return view('sellers.foods', [
            'food_tags' => FoodTag::all(),
            'foods' => Food::latest()->where('resturent_id', $resturentId)->filter(request(['search']))->paginate(3),
        ]);
    }

    // Create food & store in database
    public function foodsStore(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'tags' => 'required',
            'material' => ''
        ]);


        // Seperate tags array by comma
        $formFields['tags'] = implode(",", $formFields['tags']);


        // Find seller resturent id
        $resturentId = Seller::find(auth()->guard('seller')->id())->resturent->id;
        $formFields['resturent_id'] = $resturentId;

        // Create food
        Food::create($formFields);

        // Redirect user(seller)
        return back()->with('message', 'Food created!');
    }
    
    // Add or remove food from food party
    public function foodsFoodParty(Request $request, Food $food)
    {
        $formFields = $request->validate([
            'food_party' => 'required|not_in:11|in:1,0'
        ]);

        // Update value of food_party
        $food->update($formFields);

        // Create proper session message
        $message = "";
        if($food->food_party == false) 
        {
            $message = "Item removed from food party!";
        } else 
        {
            $message = "Item added in food party!";
        }

        // Redirect user
        return back()->with('message', $message);
    }

    // Show edit food form
    public function foodsEdit(Food $food)
    {
        return view('sellers.foods_edit',['food' => $food, 'food_tags' => FoodTag::all()]);
    }

    // Update foods
    public function foodsUpdate(Request $request, Food $food)
    {
        // Validation
        $formFields = $request->validate([
            'name' => 'required',
            'material' => '',
            'price' => 'required|numeric',
            'discount' => 'nullable|integer|between:1,99',
            'tags' => 'required'
        ]);

        // Seperate tags array by comma
        $formFields['tags'] = implode(",", $formFields['tags']);

        // Update food
        $food->update($formFields);

        // redirect user
        return redirect('/seller/dashbord/foods')->with('message', 'food updated successfully!');
    }

    // Remove food discount
    public function foodsRemoveDiscount(Request $request, Food $food)
    {
        // get null value from input form
        $formFields = $request->all('discount');

        // Update value of discount column in to null
        $food->update($formFields);

        // redirect user
        return redirect('/seller/dashbord/foods')->with('delMessage', 'Discount removed!');
    }

    // Delete food
    public function foodsDestroy(Food $food)
    {
        $food->delete();
        return redirect('/seller/dashbord/foods')->with('delMessage', 'Food Deleted!');
    }
}
