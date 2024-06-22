<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- alpine js cdn -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>AdminDashbord</title>
</head>
<body>

    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Admin Panel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./dashbord.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./resturent_tags.html">Resturents tags</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./food_tags.html">Foods tags</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./comment_delete_req.html">Commets Delete req</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <!-- flash message -->
       @if(session()->has('message'))
       <div x-data="{show: true}" x-init="setTimeout(() => show= false,3000)" x-show="show" class="alert alert-success" role="alert">
          {{session('message')}}
       </div>
       @endif

      <!-- Add baner form -->
       <section class="container m-5 bg-secondary-subtle py-5 shadow-lg">
        <form class="w-50 mx-auto">
            <h4>Adding Banner To website</h4>
            <div class="mb-3 mt-3">
              <label for="" class="form-label">Title</label>
              <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Body</label>
              <input type="text" class="form-control" id="">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
       </section>


            <!-- CRUD banners -->
            <section class="container mt-3 mb-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td><i class="fa-solid fa-square-pen text-warning"></i></td>
                            <td><i class="fa-solid fa-trash text-danger"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td><i class="fa-solid fa-square-pen text-warning"></i></td>
                            <td><i class="fa-solid fa-trash text-danger"></i></td>
                        </tr>
                    </tbody>
                </table>
            </section>








    <!-- Bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">

    </script>
</body>
</html>