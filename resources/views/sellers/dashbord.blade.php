<x-seller_home_layout>
    <!-- Orders table -->
    <section class="m-2">
        <h5 class="">Orders</h5>
        <div class="container">
            <table class="table table-striped">
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
                                <form action="/seller/dashbord/order_status/{{$order->id}}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    @method('put')
                                    <select class="form-select mb-3" name="order_status">
                                        <option selected value="0">Choose</option>
                                        <option value="preparing">Preparing</option>
                                        <option value="send">Send</option>
                                        <option value="resived">Resived</option>
                                    </select>
                                    @error('order_status')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                    <button class="btn btn-warning align-self-start" type="submit">Edit</button>
                                </form>
                            </div>
                        </td>
                        <td class="fw-bold">{{$order->total_amount}} Toman</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- paginate links -->
            <div class="">
                {{$orders->links()}}
            </div>
        </div>
    </section>


</x-seller_home_layout>