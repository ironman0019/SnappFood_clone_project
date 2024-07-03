<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind output css vite -->
    @vite('resources/css/app.css')
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- alpine js cdn -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Document</title>
</head>

<body class="tw-bg-pink-300">

    <section class="container mt-5">
    <form action="/seller/dashbord/foods/update/{{$food->id}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="" class="form-label">Food name</label>
            <input type="text" class="form-control" id="" placeholder="" name="name" value="{{$food->name}}">
            @error('name')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Materials</label>
            <input type="text" class="form-control" id="" placeholder="" name="material" value="{{$food->material}}">
            @error('material')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="text" class="form-control" id="" placeholder="" name="price" value="{{$food->price}}">
            @error('price')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
            <div id="" class="form-text">Toman</div>
        </div>
        <div class="input-group mb-3">
            <label for="" class="form-label">Add discount</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">%</span>
                <input type="text" class="form-control" name="discount" value="{{$food->discount}}">
            </div>
            @error('discount')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                Resturent logo
            </label>
            <input type="file" class="form-control" name="photo" value="" />
            @error('photo')
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
        <a class="btn btn-secondary px-4" href="/seller/dashbord/foods">Back</a>
        <button class="btn btn-primary mx-3 px-4" type="submit">Submit</button>
    </form>
    </section>
</body>

</html>