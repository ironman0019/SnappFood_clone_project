<x-admin_layout>

    <!-- flash message -->
    @if(session()->has('delMessage'))
    <div x-data="{show: true}" x-init="setTimeout(() => show= false,3000)" x-show="show" class="alert alert-danger" role="alert">
        {{session('delMessage')}}
    </div>
    @endif



    <!-- Show comments that thire delete request is true -->
    <section class="container mt-3 mb-3">
        <h2>Sellers comments delete requests</h2>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Comment</th>
                    <th scope="col">CommentId</th>
                    <th scope="col">OrderId</th>
                    <th scope="col">Action</th>
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
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->order_id}}</td>
                    <td class="d-flex">
                        <form action="/admin/comment_deleteing/{{$comment->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn"><i class="fa-solid fa-trash text-danger"></i> Delete</button>
                        </form>
                        <form action="/admin/comment_keep/{{$comment->id}}" method="POST">
                            @csrf
                            <button class="btn"><i class="fa-solid fa-check text-success"></i> Keep</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

</x-admin_layout>