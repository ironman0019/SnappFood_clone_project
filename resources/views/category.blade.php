<x-home_layout>

    <!-- flash message -->
    <x-flash-message />

    <!-- category resturents cards  -->
    <section class="m-4">
        <div class="tw-flex">
            <h3 class="tw-text-gray-600 tw-m-5">{{$category->tag}}</h3>
        </div>
        <div class="d-flex gap-3">
            @foreach($resturents as $resturent)
            <a href="#" class="tw-no-underline">
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
                                    echo $sumRate / $count ;
                                }
                            @endphp
                            <i class="fa-solid fa-star tw-mx-1 tw-text-yellow-500"></i>
                        </p>
                        <!-- Tags -->
                        <p class="tw-text-center tw-text-xs tw-text-gray-400">{{$resturent->tag}}</p>
                        <!-- Delivary -->
                        <p class="tw-text-center tw-text-xs tw-text-gray-500"><i class="fa-solid fa-motorcycle tw-mx-2"></i>Seller Delivary<span class="tw-font-bold tw-mx-1">{{$resturent->delivary_price ? number_format($resturent->delivary_price) : '0'}}</span>Toman</p>
                        <p class="tw-text-center"><a href="#" class="btn btn-outline-secondary rounded-5">Go somewhere</a></p>
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
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-6 py-5 border-top bg-secondary-subtle">
        <div class="col m-3">
            <img src="https://snappfood.ir/static/images/senf.png" alt="">
        </div>
        <div class="col mb-3">
            <ul class="nav flex-column ">
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col mb-3">
            <ul class="nav flex-column ">
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col mb-3">
            <div class="">
                <h5 class="tw-text-pink-600">EmadFood</h5>
                <p class="tw-text-sm text-secondary">Food ordering experience, from fast food to snap food</p>
                <div class="d-flex gap-3">
                    <a href="#" class=""><i class="fa-brands fa-instagram tw-text-2xl tw-text-gray-500"></i></a>
                    <a href="#" class=""><i class="fa-brands fa-linkedin tw-text-2xl tw-text-gray-500"></i></a>
                    <a href="#" class=""><i class="fa-brands fa-telegram tw-text-2xl tw-text-gray-500"></i></a>
                    <a href="#" class=""><i class="fa-brands fa-twitter tw-text-2xl tw-text-gray-500"></i></a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <a href="index.html"><img src="./images/SnappFood_logo.png" alt="" class="w-50"></a>
        </div>
    </footer>

</x-home_layout>