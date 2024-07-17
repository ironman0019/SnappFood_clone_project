<x-seller_home_layout>
    <!-- Orders table -->
    <section class="m-2">
        <h4 class="my-4 mx-2">Comments</h4>
        <div class="">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Comment Id</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Comment body</th>
                        <th scope="col">Reply</th>
                        <th scope="col">Food title</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($comments as $comment)
                    @php
                    $i++
                    @endphp
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->order->id}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>{{$comment->body}}</td>
                        <td>
                            @if($comment->reply == null)
                            {{'empty'}}
                            @else
                            {{$comment->reply}}
                            @endif
                        </td>
                        <td>
                        @php
                            foreach($foodItems as $foodItem) {
                            if($foodItem->order_id == $comment->order->id) {
                            echo $foodItem->food->name. " * " .$foodItem->quantity_ordered . " ";
                            };
                            };
                            @endphp
                        </td>
                        <td>
                            <div class="d-flex gap-3">
                                <form action="/seller/dashbord/comments/{{$comment->id}}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    @method('put')
                                    <input type="text" class="form-control" name="reply" placeholder="Leave a reply">
                                    @error('reply')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                    <button class="btn btn-warning" type="submit">Add or edit reply</button>
                                </form>
                                <form action="/seller/dashbord/comments/{{$comment->id}}" method="POST" class="d-flex">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete request</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- paginate links -->
            <div class="">
                {{$comments->links()}}
            </div>
        </div>
    </section>
</x-seller_home_layout>