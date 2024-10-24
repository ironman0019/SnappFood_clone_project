<x-home_layout>

    <!-- flash message -->
    <x-flash-message />

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
                        <th scope="col">Action</th>
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
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#comment-modal">Leave a comment</button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#rate-modal">Rate this resturent</button>
                            </div>
                        </td>
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


    <!-- Comment Modal -->
    <div class="modal fade" id="comment-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="comment-modal">Create comment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/create_comment/{{$order->id}}" method="POST" id="create-comment">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Comment</label>
                            <input type="text" class="form-control" id="" name="body">
                            @error('body')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="create-comment" class="btn btn-primary px-5">Submit<i class="fa-solid fa-check mx-2"></i></button>
                </div>
            </div>
        </div>
    </div>


    <!-- Rate Modal -->
    <div class="modal fade" id="rate-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="rate-modal">Rate the resturent</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/rate_resturent/{{$order->resturent_id}}/{{$order->id}}" method="POST" id="create-rate">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Rate</label>
                            <select class="form-select" name="rate">
                                <option selected>Rate the resturent</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                                <option value="5">Five</option>
                            </select>
                            @error('rate')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="create-rate" class="btn btn-primary px-5">Submit<i class="fa-solid fa-pen-to-square mx-2"></i></button>
                </div>
            </div>
        </div>
    </div>



</x-home_layout>