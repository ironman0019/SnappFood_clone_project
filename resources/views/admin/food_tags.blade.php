<x-admin_layout>

    <!-- flash message -->
    @if(session()->has('delMessage'))
    <div x-data="{show: true}" x-init="setTimeout(() => show= false,3000)" x-show="show" class="alert alert-danger" role="alert">
        {{session('delMessage')}}
    </div>
    @endif

    <!-- Add Food tags form -->
    <section class="container m-5 bg-secondary-subtle py-5 shadow-lg">
        <form action="/admin/foodTagStore" method="POST" class="w-50 mx-auto">
            @csrf
            <h4>Adding food tags</h4>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Tag</label>
                <input type="text" class="form-control" id="" name="tag">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>

    <!-- CRUD tags -->
    <section class="container mt-3 mb-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 0;
                @endphp
                @foreach($tags as $tag)
                @php
                $i++
                @endphp
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$tag->tag}}</td>
                    <td>
                        <form action="food_tags/{{$tag->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

</x-admin_layout>