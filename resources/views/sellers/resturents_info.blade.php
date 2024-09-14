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


  <!-- Show case -->
  <section class="tw-bg-pink-200">
    <div class="d-flex">
      <div class="m-3">
        <div class="tw-ml-8 tw-mt-5">
          <h4>Complete your resturent info seller boy!</h4>
        </div>
        <img src="https://snappfood.ir/campaign/images_273781185/Artwork.png" class="tw-mt-10 tw-h-96" style="width: 40rem;" alt="...">

      </div>
      <div class="m-3 mx-5 w-50 bg-white shadow">
        <div class="tw-m-5">
          <h5 class="tw-text-gray-600 tw-font-bold tw-font-sans">Resturent info</h5>
          <p class="tw-text-sm tw-text-gray-500">Join emad food by completeing your resturent info</p>
        </div>
        <div class="tw-m-5">
          <form action="/seller/complete_res_info" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
              <label for="" class="form-label">Resturent's Name</label>
              <input type="text" class="form-control" id="" placeholder="" name="name">
              @error('name')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Resturent type</label>
                <select class="form-select" name="tag">
                    <option selected value="0">Choose</option>
                    @foreach($tags as $tag)
                    <option value="{{$tag->tag}}">{{$tag->tag}}</option>
                    @endforeach
                </select>
              @error('tag')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Telephone</label>
              <input type="text" class="form-control" id="" name="phone">
              @error('phone')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Address</label>
              <input type="text" class="form-control" id="" name="address">
              @error('address')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">City</label>
              <input type="text" class="form-control" id="" name="city">
              @error('city')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Bank info</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">IR-</span>
                <input type="text" class="form-control" id="" name="bank">
              </div>
              <div id="" class="form-text">Shaba number on your creadit card</div>
              @error('bank')
              <div class="form-text text-danger">{{$message}}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-outline-danger tw-mx-60 px-5 ">Submit</button>
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