<x-admin_layout>

    <!-- Add resturents tags form -->
    <section class="container m-5 bg-secondary-subtle py-5 shadow-lg">
        <form action="/admin/resturentTagStore" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
            @csrf
            <h4>Adding resturents tags</h4>
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Tag</label>
                <input type="text" class="form-control" id="" name="tag">
                @error('tag')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Picture</label>
                <input type="file" class="form-control" id="" name="picture">
                @error('picture')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
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
                    <th scope="col">pic</th>
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
                        @if($tag->picture)
                        <img src="{{asset('storage/' . $tag->picture)}}" alt="" class="w-25 h-25">
                        @else
                        {{'Null'}}
                        @endif
                    </td>
                    <td>
                        <form action="resturents_tags/{{$tag->id}}" method="POST">
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