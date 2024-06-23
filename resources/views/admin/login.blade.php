<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- boostrap cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- alpine js cdn -->
  <script src="//unpkg.com/alpinejs" defer></script>
  <title>AdminLogin</title>
</head>

<body class="bg-secondary-subtle">

  <!-- Login form -->

  <form action="/admin/auth" method="POST" class="w-50 mx-auto my-5">
    <h1>Admin Login</h1>
    @csrf
    <!-- flash message -->
    @if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show= false,3000)" x-show="show" class="alert alert-success" role="alert">
      {{session('message')}}
    </div>
    @endif
    <div class="mb-3 mt-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" id="" name="username">
        <div id="emailHelp" class="form-text">Default username is admin. please change username after login!</div>
        @error('username')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" id="" name="password">
        <div id="emailHelp" class="form-text">Default password is admin1234. please change username after login!</div>
        @error('password')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>






  <!-- bootstrap cdn -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

  </script>

</body>

</html>