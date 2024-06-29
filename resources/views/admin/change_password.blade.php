<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- boostrap cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>AdminChangePassword</title>
</head>

<body class="bg-secondary-subtle">

  <!-- Change password & username form -->

  <form action="/admin/update" method="POST" class="w-50 mx-auto my-5">
    @csrf
    @method('PUT')
    <div class="mb-3 mt-3">
        <h1>Change username & password</h1>
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" id="" name="username" value="{{$admin->username}}">
        @error('username')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" id="" name="password">
        @error('password')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password Confirm</label>
        <input type="password" class="form-control" id="" name="password_confirmation">
        @error('password_confirmation')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
    <a href="/admin" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>







  <!-- bootstrap cdn -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

  </script>

</body>

</html>