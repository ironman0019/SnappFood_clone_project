<x-home_layout>

    <!-- flash message -->
    <x-flash-message />

    <!-- Food party -->
    <section class="m-4 py-3 tw-bg-pink-600 tw-rounded-xl tw-rounded-bl-3xl">

        <!-- Cards -->
        @foreach($foods as $food)
        <div class="d-flex justify-content-center mx-4">
            <a href="/food_order/{{$food->resturent_id}}" class="tw-no-underline">
                <div class="card shadow" style="width: 16rem;">
                    <p class="tw-text-xs tw-text-gray-400 tw-text-center tw-mt-2">{{$food->resturent->name}}</p>
                    @if($food->resturent->delivary_price == null)
                    <p class="tw-text-xs tw-text-gray-400 tw-text-center">Free Delivary</p>
                    @endif
                    <div class="tw-w-44 tw-ml-12">
                        <img src="{{$food->picture ? asset('storage/' . $food->picture) : asset('/images/snappFood_logo.png')}}" class="card-img mb-4" alt="...">
                    </div>
                    <h5 class="tw-text-gray-600 tw-font-semibold tw-text-center">{{$food->name}}</h5>
                    <div class="d-flex justify-content-evenly mt-4">
                        <p class="tw-text-xs tw-text-gray-400">
                            <span class="tw-line-through">{{ number_format($food->price) }}</span>
                            <span class="tw-bg-pink-600 tw-text-white tw-px-1 tw-py-1 tw-rounded-full tw-mx-1">{{$food->discount}}%</span>
                        </p>
                        <p class="tw-text-gray-600 tw-text-xs"><i class="fa-solid fa-star tw-mx-1 tw-text-yellow-500"></i>3.8</p>
                    </div>
                    <div class="d-flex justify-content-evenly mt-1">
                        <p class="tw-text-xs tw-text-gray-600 tw-font-bold">{{number_format($food->price - ($food->price * $food->discount / 100))}}<span class="tw-text-gray-500 tw-mx-1">Toman</span></p>
                        <p class="tw-text-xs tw-text-gray-600 tw-font-bold">10<span class="tw-text-gray-500 tw-mx-1">Left</span></p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

    </section>

    <div class="m-2">
        <a href="/home" class="btn btn-primary">Back</a>
    </div>


    <!-- Footer -->
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 border-top bg-secondary-subtle">
        <!-- License or Certification Image -->
        <div class="col mb-3 text-center text-md-start">
            <img src="https://snappfood.ir/static/images/senf.png" alt="Certification" class="img-fluid">
        </div>

        <!-- First Column Links -->
        <div class="col mb-3">
            <h5 class="text-secondary">Category 1</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 1</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 2</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 3</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 4</a></li>
            </ul>
        </div>

        <!-- Second Column Links -->
        <div class="col mb-3">
            <h5 class="text-secondary">Category 2</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 1</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 2</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 3</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 4</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 5</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Lorem 6</a></li>
            </ul>
        </div>

        <!-- Brand Description and Social Media Links -->
        <div class="col mb-3">
            <h5 class="tw-text-pink-600">EmadFood</h5>
            <p class="text-secondary">Food ordering experience, from fast food to snap food.</p>
            <div class="d-flex gap-3">
                <a href="#" class="text-secondary"><i class="fa-brands fa-instagram fa-2xl"></i></a>
                <a href="#" class="text-secondary"><i class="fa-brands fa-linkedin fa-2xl"></i></a>
                <a href="#" class="text-secondary"><i class="fa-brands fa-telegram fa-2xl"></i></a>
                <a href="#" class="text-secondary"><i class="fa-brands fa-twitter fa-2xl"></i></a>
            </div>
        </div>

        <!-- Logo Section -->
        <div class="col mb-3 text-center text-md-end">
            <a href="index.html">
                <img src="{{asset('/images/snappFood_logo.png')}}" alt="SnappFood Logo" class="img-fluid w-50">
            </a>
        </div>
    </footer>

</x-home_layout>