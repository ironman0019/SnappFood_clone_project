<x-home_layout>

    <!-- flash message -->
    <x-flash-message />

    <!-- category resturents cards  -->
    <section class="m-4">
        <div class="tw-flex">
            <h3 class="tw-text-gray-600 tw-m-5">{{request()->search}}</h3>
        </div>
        <div class="d-flex gap-3">
            @foreach($resturents as $resturent)
            <a href="/food_order/{{$resturent->id}}" class="tw-no-underline">
                <div class="card shadow hover:tw-animate-pulse" style="width: 18rem;">
                    <img src="{{$resturent->photo ? asset('storage/' . $resturent->photo) : 'https://cdn.snappfood.ir/300x200/uploads/images/vendor-cover-app-review/4/05.jpg' }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center text-secondary-emphasis">{{$resturent->name}}</h5>
                        <!-- score -->
                        <p class="tw-text-center tw-text-xs tw-text-gray-500">
                            @php
                            $rates = $resturent->rateings;
                            $sumRate = 0;
                            $count = 0;

                            foreach($rates as $rate) {
                            $sumRate = $rate->rate + $sumRate;
                            $count++;
                            }
                            if($sumRate == 0) {
                            echo 'no reviews';
                            } else {
                            echo number_format($sumRate / $count, 2);
                            }
                            @endphp
                            <i class="fa-solid fa-star tw-mx-1 tw-text-yellow-500"></i>
                        </p>
                        <!-- Tags -->
                        <p class="tw-text-center tw-text-xs tw-text-gray-400">{{$resturent->tag}}</p>
                        <!-- Delivary -->
                        <p class="tw-text-center tw-text-xs tw-text-gray-500"><i class="fa-solid fa-motorcycle tw-mx-2"></i>Seller Delivary<span class="tw-font-bold tw-mx-1">{{$resturent->delivary_price ? number_format($resturent->delivary_price) : '0'}}</span>Toman</p>
                        <p class="tw-text-center"><a href="/food_order/{{$resturent->id}}" class="btn btn-outline-secondary rounded-5">Place order</a></p>
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