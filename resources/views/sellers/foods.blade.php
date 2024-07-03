<x-seller_home_layout>
    <!-- Foods table -->
    <section class="m-2">
        <div class="d-flex mt-3 gap-4">
            <h2 class="">Foods</h2>
            <button class="btn btn-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#createModal">
                Create food
            </button>
        </div>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Food Name</th>
                        <th scope="col">material</th>
                        <th scope="col">Price</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Action</th>
                        <th scope="col">Add to food party</th>
                        <th scope="col">Discount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($foods as $food)
                    @php
                    $i++
                    @endphp
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$food->name}}</td>
                        <td>{{$food->material}}</td>
                        <td>{{$food->price}}</td>
                        <td>image</td>
                        <td>{{$food->tags}}</td>
                        <td>
                            <a class="btn btn-warning mb-3" href="/seller/dashbord/foods/edit/{{$food->id}}">
                                Edit
                            </a>
                            <form action="/seller/dashbord/foods/delete/{{$food->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <form action="/seller/dashbord/foods/food_party/{{$food->id}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="">
                                    <select class="form-select mb-3" name="food_party">
                                        <option selected value="11">
                                            @if($food->food_party == false)
                                            {{'Item is not in food party'}}
                                            @else {{'Item is in food party'}}
                                            @endif
                                        </option>
                                        <option value="1">Add to food party</option>
                                        <option value="0">Remove from food party</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary mx-5 mt-2" type="submit">Submit</button>
                            </form>
                        </td>
                        <td>
                            @if($food->discount == null)
                            {{"no discount"}}
                            @else
                            <div class="d-flex gap-2">
                                <p>{{$food->discount. " %"}}</p>
                                <form action="/seller/dashbord/foods/discount/{{$food->id}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="discount" value="{{null}}">
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Create food modal  -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-body-secondary">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Food</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/seller/dashbord/foods" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Food name</label>
                            <input type="text" class="form-control" id="" placeholder="" name="name" value="">
                            @error('name')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Materials</label>
                            <input type="text" class="form-control" id="" placeholder="" name="material" value="">
                            @error('material')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="text" class="form-control" id="" placeholder="" name="price" value="">
                            @error('price')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                            <div id="emailHelp" class="form-text">Toman</div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">
                                Resturent logo
                            </label>
                            <input type="file" class="form-control" name="picture" value="" />
                            @error('picture')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex flex-wrap gap-3">
                            <label for="" class="form-label">Food tags</label>
                            @foreach($food_tags as $food_tag)
                            <input class="form-check-input" type="checkbox" value="{{$food_tag->tag}}" id="flexCheckDefault" name="tags[]">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$food_tag->tag}}
                            </label>
                            @endforeach
                            @error('tags')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary mx-3 px-4" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-seller_home_layout>