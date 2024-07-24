<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- tailwind vite css -->
  @vite('resources/css/app.css')
  <!-- Bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- icon cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
</head>

<body>

  <!-- nav bar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <img src="{{asset('images/SnappFood_logo.png')}}" alt="brand" class="tw-w-20">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mx-5  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Show case -->
  <section class="tw-bg-pink-200">
    <div class="d-flex">
      <div class="m-3">
        <div class="tw-ml-8 tw-mt-5">
          <h4>Register and join Emadfood in less than 10 minutes!</h4>
          <p class="tw-text-gray-500 tw-text-sm">You can complete whole registration steps online, without the need to visit in person.
          </p>
        </div>
        <img src="https://snappfood.ir/campaign/images_273781185/Artwork.png" class="tw-mt-10 tw-h-96" style="width: 50rem;" alt="...">

      </div>
      <div class="m-3 w-25 bg-white shadow">
        <div class="tw-m-5">
          <h5 class="tw-text-gray-600 tw-font-bold tw-font-sans">Sellers register form</h5>
          <p class="tw-text-sm tw-text-gray-500">Register right now!</p>
        </div>
        <div class="tw-m-5">
          <form action="/seller/store" method="POST">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Owner's name</label>
              <input type="text" class="form-control" id="" placeholder="Full name" name="name" value="{{old('name')}}">
              @error('name')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email')}}">
              @error('email')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Phone number</label>
              <input type="text" class="form-control" id="" name="phone" value="{{old('phone')}}">
              @error('phone')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
              <div id="emailHelp" class="form-text">Start with 09</div>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password" class="form-control" id="" name="password" value="{{old('password')}}">
              @error('password')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Password repeat</label>
              <input type="password" class="form-control" id="" name="password_confirmation">
              @error('password_confirmation')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-outline-danger tw-mx-20 px-5 ">Submit</button>
          </form>

        </div>

      </div>

    </div>

  </section>












  <!-- Bootstrap cdn -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

  <!-- Booystrap Tooltips -->
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>


</body>

</html>