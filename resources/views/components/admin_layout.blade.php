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
                <a class="nav-link active" aria-current="page" href="/admin">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/resturents_tags">Resturents tags</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/food_tags">Foods tags</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./comment_delete_req.html">Commets Delete req</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/change_password">Change password</a>
              </li>
            </ul>
            <form class="d-flex" method="POST" action="/admin/logout">
              @csrf
              <button class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-door-closed"></i> Logout</button>
            </form>
          </div>
        </div>
      </nav>

      <!-- flash message -->
       <x-flash-message/>

       <main>
        {{$slot}}
       </main>


 



    <!-- Bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">

    </script>
</body>
</html>