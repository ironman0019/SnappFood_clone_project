<x-seller_home_layout>
    <section class="m-3">
        <div class="d-flex justify-content-between">
            <h4 class="">Sell Reports</h4>
            <p class="fw-bold">Total orders : {{$orders->count()}}</p>
            <p class="fw-bold">
                Total income : 
                @php
                    $amountArray = [];
                    foreach($orders as $order) {
                        array_push($amountArray, $order->total_amount);
                    }
                    $totalAmount = array_sum($amountArray);
                @endphp
                {{number_format($totalAmount)}} Toman
            </p>
            <form action="/seller/dashbord/sell_report" class="d-flex gap-2">
                <select class="form-select" name="search">
                    <option selected>Sort by :</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                </select>
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
        <h5 class="mt-3">All orders :</h5>
        <div class="container">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Time</th>
                        <th scope="col">Food title</th>
                        <th scope="col">status</th>
                        <th scope="col">Total_amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($orders as $order)
                    @php
                    $i++
                    @endphp
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$order->id}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            @php
                            foreach($foodItems as $foodItem) {
                            if($foodItem->order_id == $order->id) {
                            echo $foodItem->food->name. " * " .$foodItem->quantity_ordered . " ";
                            };
                            };
                            @endphp
                        </td>
                        <td>
                            <div class="container d-flex gap-3">
                                {{$order->order_status}}
                            </div>
                        </td>
                        <td class="fw-bold">{{number_format($order->total_amount)}} Toman</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-seller_home_layout>