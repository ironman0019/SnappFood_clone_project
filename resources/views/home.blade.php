<x-home_layout>
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="offcanvas" data-bs-target="#offcanvas">Orders <i class="fa-solid fa-list mx-1"></i></button>
                    </li>
                    <li class="nav-item dropdown mx-5">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-user"></i>
                        </a>
                        <ul class="dropdown-menu shadow">
                            <li><a class="dropdown-item mb-3" href="#"><i class="fa-regular fa-user tw-mr-2"></i>{{auth()->user()->name}}</a></li>
                            <a href="#" class="tw-text-xs tw-no-underline tw-text-green-500 tw-absolute tw-left-9 tw-top-8">View user account</a>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-wallet tw-mr-2"></i>wallet <span class="tw-ml-8 tw-text-xs tw-text-gray-400">50 dollar</span></a></li>
                            <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-arrow-right-from-bracket tw-mr-2"></i>Log out</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search &#xF002; " style="font-family:Arial, FontAwesome" aria-label="Search">
                    <button class="btn btn-outline-success me-5 " type="submit">Search</button>
                </form>
                <ul class="navbar-nav me-auto  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <button data-bs-toggle="modal" data-bs-target="#Modal" class="tw-text-sm tw-text-gray-400"><i class="fa-solid fa-location-dot mx-1 "></i> {{auth()->user()->address ? auth()->user()->address : 'Location'}} <i class="fa-solid fa-chevron-down mx-2 tw-text-pink-600"></i></button>
                    </li>
                </ul>
                <a class="navbar-brand" href="login_index.html"><img src="./images/SnappFood_logo.png" class="tw-w-20" alt=""></a>
            </div>
        </div>
    </nav>

    <!-- flash message -->
    <x-flash-message />

    <!-- first catagory cards -->
    <section class="m-5">
        <div class="d-flex gap-3">
            <a href="#" class="tw-no-underline" data-bs-toggle="tooltip" data-bs-title="Resturant">
                <div class="card rounded-4" style="width: 7rem; height: 9rem; background-color: rgb(243, 244, 246) ;">
                    <div class="card-body">
                        <img src="https://cdn.snappfood.ir/uploads/images/review-app/icons/count/restaurant-desktop.png" alt=""
                            class="tw-w-24 tw-h-20">
                        <h5 class="tw-text-gray-600 tw-text-sm tw-font-sans tw-text-center">Resturent</h5>
                    </div>
                </div>
            </a>
            @foreach($resturents as $resturent)
            <a href="#" class="tw-no-underline" data-bs-toggle="tooltip" data-bs-title="{{$resturent->name}}">
                <div class="card rounded-4" style="width: 7rem; height: 9rem; background-color: rgb(243, 244, 246) ;">
                    <div class="card-body">
                        <img src="{{$resturent->photo ? asset('storage/' . $resturent->photo) : asset('/images/snappFood_logo.png')}}" alt="logo"
                            class="tw-w-24 tw-h-20">
                        <h5 class="tw-text-gray-600 tw-text-sm tw-font-sans tw-text-center tw-mt-3">{{$resturent->name}}</h5>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    <!-- secound catagory cards -->
    <h3 class="tw-text-gray-600 tw-m-5 ">Catagories</h3>
    <section class="mt-3 mx-3 d-flex flex-wrap shadow-lg bg-white">
        @foreach($categories as $category)
        <div class="card-img m-3 mb-4 col-12 col-md-6 col-lg-3" style="width: 11rem;">
            <div class="position-relative hover:tw-animate-pulse tw-transition tw-ease-in-out tw-delay-150 hover:tw-translate-y-1 hover:tw-scale-110 tw-duration-300">
                <a href="#" data-bs-toggle="tooltip" data-bs-title="{{$category['tag']}}"><img src="{{$category['picture'] ? asset('storage/' . $category['picture']) : asset('/images/snappFood_logo.png')}}" class="rounded " alt="..."></a>
                <a href="#" data-bs-toggle="tooltip" data-bs-title="{{$category['tag']}}" class="btn position-absolute mx-4 px-2 top-100 start-0 translate-middle rounded-end-3 text-bg-light text-secondary-emphasis">{{$category['tag']}} <i class="fa-solid fa-chevron-right tw-text-pink-600"></i></a>
            </div>
        </div>
        @endforeach
    </section>

    <!-- Food party -->
    <section class="m-4 py-3 tw-bg-pink-600 tw-rounded-xl tw-rounded-bl-3xl">
        <div class="m-4 d-flex">
            <div class="flex-column justify-content-center">
                <div class="tw-ml-4">
                    <img class="tw-w-28" src="https://cdn.snappfood.ir/uploads/images/review-app/icons/count/jek/1_jek_non_active.png" alt="">
                </div>
                <div class="">
                    <p class="tw-font-semibold tw-text-xl tw-text-white"><i class="fa-solid fa-champagne-glasses tw-mx-1"></i>Food Party</p>
                    <p class="tw-text-sm tw-text-white">Special instant discounts for you</p>
                    <a href="#" class="tw-mb-2 tw-ml-4">
                        <button class="tw-bg-white tw-text-gray-700 tw-py-1 tw-px-8 tw-rounded-xl">
                            See All <i class="fa-solid fa-chevron-right mx-2"></i>
                        </button>
                    </a>
                </div>
            </div>

            @php
            $counter = 0;
            $totalFoods = count($foods);
            @endphp

            <!-- Cards -->
            @foreach($foods as $food)
            @php
            $counter++;
            @endphp
            @if($counter <= 3)
                <div class="flex-row justify-content-center mx-4">
                <a href="#" class="tw-no-underline">
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
        </div>
        @endif
        @endforeach

        <!-- Show "..." if there are more than 3 items -->
        @if($totalFoods > 3)

        <p class="tw-text-lg tw-font-bold tw-text-white tw-flex tw-items-center">And more ...</p>

        @endif

        </div>
    </section>


    <!-- New in EmadFood cards  -->
    <section class="m-4">
        <div class="tw-flex">
            <h3 class="tw-text-gray-600 tw-m-5">Newest in EmadFood</h3>
            <a href="#" class="tw-text-green-600 tw-font-semibold tw-text-2xl tw-no-underline tw-mt-5 tw-ml-auto">See All<i class="fa-solid fa-chevron-right tw-mx-3"></i></a>
        </div>
        <div class="d-flex gap-3">
            @foreach($newResturents as $newResturent)
            <a href="#" class="tw-no-underline">
                <div class="card shadow hover:tw-animate-pulse" style="width: 18rem;">
                    <img src="{{$newResturent->photo ? asset('storage/' . $newResturent->photo) : 'https://cdn.snappfood.ir/300x200/uploads/images/vendor-cover-app-review/4/05.jpg' }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center text-secondary-emphasis">{{$newResturent->name}}</h5>
                        <!-- score -->
                        <p class="tw-text-center tw-text-xs tw-text-gray-500">
                            @php
                                $rates = $newResturent->rateings;
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
                        <p class="tw-text-center tw-text-xs tw-text-gray-400">{{$newResturent->tag}}</p>
                        <!-- Delivary -->
                        <p class="tw-text-center tw-text-xs tw-text-gray-500"><i class="fa-solid fa-motorcycle tw-mx-2"></i>Seller Delivary<span class="tw-font-bold tw-mx-1">{{$newResturent->delivary_price ? number_format($newResturent->delivary_price) : '0'}}</span>Toman</p>
                        <p class="tw-text-center"><a href="#" class="btn btn-outline-secondary rounded-5">Go somewhere</a></p>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        <div>
            {{$newResturents->links()}}
        </div>
    </section>

    <!-- Show case -->
    <section class="mt-5 m-4 bg-secondary-subtle d-flex tw-rounded-bl-3xl">
        <div class="d-flex flex-column flex-wrap">
            <h2 class="m-3 pt-4">Emad Food App</h2>
            <p class="lead w-50 mx-3 ">With the Emadfood application, you can easily search for restaurants, cafes, pastry shops
                and supermarkets near you with a few simple clicks and enjoy the easy experience of ordering from Emadfood.

            </p>
            <form action="#">
                <p class="m-3 tw-font-bold">Enter your mobile number to get the link to download the application</p>
                <div class="input-group mt-3 mx-3 w-50 ">
                    <button class="btn btn-outline-danger" type="submit">Receive Link</button>
                    <input type="text" class="form-control" placeholder="09*********"
                        aria-label="Example text with two button addons">
                </div>
            </form>
        </div>
        <div class="">
            <img src="https://snappfood.ir/static/images/img_app_mockup@2x.png" class="w-75" alt="">
        </div>
    </section>

    <section class="mt-5 m-4 bg-secondary-subtle d-flex tw-rounded-3xl">
        <div class="d-flex flex-column flex-wrap">
            <h2 class="m-3 pt-4">Are you a business owner?</h2>
            <p class="lead w-100 mx-3 ">
                Bring your business online with Emadfood and increase your sales.
            </p>
            <button class="tw-bg-pink-600 tw-m-3 hover:tw-bg-pink-500 tw-w-40 tw-text-white tw-font-sans tw-py-2 tw-rounded">
                <a href="#" class="tw-text-sm tw-text-white tw-no-underline"><i class="fa-solid fa-shop tw-mr-1"></i> Register for
                    sellers</a>
            </button>
        </div>
        <div class="tw-mx-48">
            <img src="https://snappfood.ir/static/images/vendor_pic.png" class="w-100" alt="">
        </div>
    </section>

    <hr>


    <!-- Cities Catagory -->
    <h5 class="tw-text-gray-700 tw-m-5">Emadfood in Iranian cities</h5>
    <section class="m-3 row">
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>
        <div class="col-4 col-md-2 col-lg-1">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-body-secondary">Lorem</a></li>
            </ul>
        </div>

    </section>


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


















    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">Orders history</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container shadow border-1">
                <div class="tw-m-3 tw-mb-10">
                    <div class="d-flex">
                        <a href="#"><img src="./images/SnappFood_logo.png" alt="Restoran Logo!" class="tw-w-14"></a>
                        <a href="#" class="tw-text-gray-700 tw-no-underline">
                            <p class="tw-font-bold tw-ml-3">Chiken Family</p>
                        </a>
                        <p class="tw-text-sm tw-text-gray-500 tw-ml-3 tw-mt-1"> H:H DD/MM/MM</p>
                    </div>
                    <!-- <p class="tw-text-xs tw-text-gray-500 tw-absolute tw-left-24 tw-top-28 tw-ml-2"> H:H DD/MM/MM</p> -->

                    <div class="d-flex justify-content-between mt-3">
                        <a href="#">
                            <button class="tw-bg-gray-200 tw-text-gray-700 tw-font-semibold tw-px-7 tw-py-1 tw-rounded-lg hover:tw-bg-gray-300">SEE factor<i class="fa-solid fa-circle-info tw-ml-1"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button class="tw-bg-gray-200 tw-text-gray-700 tw-font-semibold tw-px-7 tw-py-1 tw-rounded-lg hover:tw-bg-gray-300">Order again<i class="fa-solid fa-arrows-rotate tw-ml-1"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="tw-m-3 tw-mb-10">
                    <div class="d-flex">
                        <a href="#"><img src="./images/SnappFood_logo.png" alt="Restoran Logo!" class="tw-w-14"></a>
                        <a href="#" class="tw-text-gray-700 tw-no-underline">
                            <p class="tw-font-bold tw-ml-3">Chiken Family</p>
                        </a>
                        <p class="tw-text-sm tw-text-gray-500 tw-ml-3 tw-mt-1"> H:H DD/MM/MM</p>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="#">
                            <button class="tw-bg-gray-200 tw-text-gray-700 tw-font-semibold tw-px-7 tw-py-1 tw-rounded-lg hover:tw-bg-gray-300">SEE factor<i class="fa-solid fa-circle-info tw-ml-1"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button class="tw-bg-gray-200 tw-text-gray-700 tw-font-semibold tw-px-7 tw-py-1 tw-rounded-lg hover:tw-bg-gray-300">Order again<i class="fa-solid fa-arrows-rotate tw-ml-1"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="tw-m-3 tw-mb-10">
                    <div class="d-flex">
                        <a href="#"><img src="./images/SnappFood_logo.png" alt="Restoran Logo!" class="tw-w-14"></a>
                        <a href="#" class="tw-text-gray-700 tw-no-underline">
                            <p class="tw-font-bold tw-ml-3">Chiken Family</p>
                        </a>
                        <p class="tw-text-sm tw-text-gray-500 tw-ml-3 tw-mt-1"> H:H DD/MM/MM</p>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="#">
                            <button class="tw-bg-gray-200 tw-text-gray-700 tw-font-semibold tw-px-7 tw-py-1 tw-rounded-lg hover:tw-bg-gray-300">SEE factor<i class="fa-solid fa-circle-info tw-ml-1"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button class="tw-bg-gray-200 tw-text-gray-700 tw-font-semibold tw-px-7 tw-py-1 tw-rounded-lg hover:tw-bg-gray-300">Order again<i class="fa-solid fa-arrows-rotate tw-ml-1"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="tw-m-3 tw-mb-10">
                    <div class="d-flex">
                        <a href="#"><img src="./images/SnappFood_logo.png" alt="Restoran Logo!" class="tw-w-14"></a>
                        <a href="#" class="tw-text-gray-700 tw-no-underline">
                            <p class="tw-font-bold tw-ml-3">Chiken Family</p>
                        </a>
                        <p class="tw-text-sm tw-text-gray-500 tw-ml-3 tw-mt-1"> H:H DD/MM/MM</p>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="#">
                            <button class="tw-bg-gray-200 tw-text-gray-700 tw-font-semibold tw-px-7 tw-py-1 tw-rounded-lg hover:tw-bg-gray-300">SEE factor<i class="fa-solid fa-circle-info tw-ml-1"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button class="tw-bg-gray-200 tw-text-gray-700 tw-font-semibold tw-px-7 tw-py-1 tw-rounded-lg hover:tw-bg-gray-300">Order again<i class="fa-solid fa-arrows-rotate tw-ml-1"></i>
                            </button>
                        </a>
                    </div>
                </div>




            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="Modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Choose Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border-1 mb-2">
                        <h5 class="tw-text-sm m-2">Title</h5>
                        <div class="d-flex m-2">
                            <input class="form-check-input mx-1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label mx-2" for="flexRadioDefault1">
                                Default radio adffw wfvdsafgdh thbgfdsdgbfn bd
                            </label>
                            <div class="">
                                <a href="#" class="mx-2 text-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="#" class="text-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="border-1 mb-2">
                        <h5 class="tw-text-sm m-2">Title</h5>
                        <div class="d-flex m-2">
                            <input class="form-check-input mx-1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label mx-2" for="flexRadioDefault1">
                                Default radio adffw wfvdsafgdh thbgfdsdgbfn bd
                            </label>
                            <div class="">
                                <a href="#" class="mx-2 text-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="#" class="text-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="border-1 mb-2">
                        <h5 class="tw-text-sm m-2">Title</h5>
                        <div class="d-flex m-2">
                            <input class="form-check-input mx-1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label mx-2" for="flexRadioDefault1">
                                Default radio adffw wfvdsafgdh thbgfdsdgbfn bd
                            </label>
                            <div class="">
                                <a href="#" class="mx-2 text-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="#" class="text-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="border-1 mb-2">
                        <h5 class="tw-text-sm m-2">Title</h5>
                        <div class="d-flex m-2">
                            <input class="form-check-input mx-1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label mx-2" for="flexRadioDefault1">
                                Default radio adffw wfvdsafgdh thbgfdsdgbfn bd
                            </label>
                            <div class="">
                                <a href="#" class="mx-2 text-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="#" class="text-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success px-5">New Address<i class="fa-solid fa-plus mx-2"></i></button>
                </div>
            </div>
        </div>
    </div>
</x-home_layout>