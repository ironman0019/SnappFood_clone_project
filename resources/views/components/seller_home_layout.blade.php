<!DOCTYPE html>
<html lang="en">

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

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <p class="navbar-brand">Welcome {{auth()->guard('seller')->user()->name}}</p>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/seller/dashbord">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/seller/dashbord/foods">Foods</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/seller/dashbord/sell_report">Sell Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/seller/dashbord/comments">Comments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/seller/dashbord/resturent_setting">Resturent setting</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/seller/dashbord/order_archive">Orders archive</a>
          </li>
        </ul>
      </div>
      <div class="">
        <form method="POST" action="/seller/logout">
          @csrf
          <button class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-door-closed"></i> Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- flash message -->
  <x-flash-message />

  <main>
    {{$slot}}
  </main>



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