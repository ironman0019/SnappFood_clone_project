<x-home_layout>
    <!-- Hero section -->
    <section class="bg-secondary-subtle p-5 p-lg-0 pt-lg-5">
        <div class="container">
            <!-- flash message -->
            <x-flash-message />
            
            <div class="row row-cols-1 row-cols-sm-2">
                <div class="col">
                    <img src="https://snappfood.ir/static/images/hero-image.png" class="img-fluid w-30 d-sm-block d-none mb-3 rounded-4  " alt="This is a image">
                </div>
                <div class="col pt-5">
                    <h1 class="tw-text-pink-600 tw-font-serif">Emad! <span class="tw-text-pink-600 d-block">Food</span></h1>
                    <h2 class="text-dark">
                        Order Online <span class="tw-text-pink-600">Food and ...</span>
                    </h2>
                    <p class="text-dark lead">Order online Food, Fruites, Bread, Cakes and...</p>
                    <div class="input-group mt-5 mb-5">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" class="form-control" placeholder="Chose your location" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <a class="tw-bg-pink-600 hover:tw-bg-pink-500 tw-text-white tw-font-mono tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-no-underline" href="/login">
                        Login Or Register
                    </a>
                    <a class="btn" href="seller/register">
                        <i class="fa-solid fa-shop tw-mr-1"></i> Register for sellers
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Catagory cards -->
    <h3 class="tw-text-gray-600 tw-m-5 ">Catagories</h3>
    <section class="mt-3 mx-3 d-flex flex-wrap shadow-lg bg-white">
        <div class="card-img m-3 mb-4 col-12 col-md-6 col-lg-3" style="width: 12rem;">
            <div class="position-relative hover:tw-animate-pulse tw-transition tw-ease-in-out tw-delay-150 hover:tw-translate-y-1 hover:tw-scale-110 tw-duration-300">
                <a href="#" data-bs-toggle="tooltip" data-bs-title="Persian"><img src="https://cdn.snappfood.ir/uploads/images/tags/website_image_irani_1.jpg" class="rounded " alt="..."></a>
                <a href="#" data-bs-toggle="tooltip" data-bs-title="Persian" class="btn position-absolute mx-4 px-2 top-100 start-0 translate-middle rounded-end-3 text-bg-light text-secondary-emphasis">Persian <i class="fa-solid fa-chevron-right tw-text-pink-600"></i></a>
            </div>
        </div>
        @foreach($categories as $category)
        <div class="card-img m-3 mb-4 col-12 col-md-6 col-lg-3" style="width: 12rem;">
            <div class="position-relative hover:tw-animate-pulse tw-transition tw-ease-in-out tw-delay-150 hover:tw-translate-y-1 hover:tw-scale-110 tw-duration-300">
                <a href="#" data-bs-toggle="tooltip" data-bs-title="{{$category['tag']}}"><img src="{{$category['picture'] ? asset('storage/' . $category['picture']) : asset('/images/snappFood_logo.png')}}" class="rounded " alt="..."></a>
                <a href="#" data-bs-toggle="tooltip" data-bs-title="{{$category['tag']}}" class="btn position-absolute mx-4 px-2 top-100 start-0 translate-middle rounded-end-3 text-bg-light text-secondary-emphasis">{{$category['tag']}} <i class="fa-solid fa-chevron-right tw-text-pink-600"></i></a>
            </div>
        </div>
        @endforeach


    </section>

    <!-- Show case -->
    <section class="mt-5 m-4 bg-secondary-subtle d-flex tw-rounded-bl-3xl">
        <div class="d-flex flex-column flex-wrap">
            <h2 class="m-3 pt-4">Emad Food App</h2>
            <p class="lead w-50 mx-3 ">With the Emadfood application, you can easily search for restaurants, cafes, pastry shops and supermarkets near you with a few simple clicks and enjoy the easy experience of ordering from Emadfood.

            </p>
            <form action="#">
                <p class="m-3 tw-font-bold">Enter your mobile number to get the link to download the application</p>
                <div class="input-group mt-3 mx-3 w-50 ">
                    <button class="btn btn-outline-danger" type="submit">Receive Link</button>
                    <input type="text" class="form-control" placeholder="09*********" aria-label="Example text with two button addons">
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
                <a href="seller/register" class="tw-text-sm tw-text-white tw-no-underline"><i class="fa-solid fa-shop tw-mr-1"></i> Register for sellers</a>
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








    <!-- Modal -->
    <!-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login or Register</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text mb-3">Phone number starts with 09</div>
                            <button type="submit" class="btn btn-primary">Continue</button>
                          </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->
</x-home_layout>