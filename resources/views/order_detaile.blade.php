<x-home_layout>

    <section class="tw-h-screen tw-bg-pink-600 tw-pt-5">
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
                        <th scope="col">Resturent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
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
                        <td>{{$order->order_status}}</td>
                        <td class="fw-bold">{{number_format($order->total_amount)}} Toman</td>
                        <td>{{$order->resturent->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex align-items-center gap-2 m-3">
            <a href="/home" class="btn btn-primary">Back</a>
            <a href="/reorder/{{$order->id}}">
                <button class="tw-bg-gray-200 tw-text-gray-700 tw-font-semibold tw-px-7 tw-py-2 tw-rounded-lg hover:tw-bg-gray-300">Order again<i class="fa-solid fa-arrows-rotate tw-ml-1"></i>
                </button>
            </a>
        </div>
    </section>



</x-home_layout>