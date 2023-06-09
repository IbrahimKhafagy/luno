@extends('user.layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="container-fluid mb-6">

        <div class="row px-xl-8">
            <div class="col-lg-9">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">

                        @foreach ($sliders as $key => $slider)
                            <div class="carousel-item position-relative {{ $key == 0 ? ' active' : '' }}"
                                style="height: 430px;">
                                <img class="position-absolute w-100 h-70"
                                    src="{{ url("storage/images/sliders/$slider->image") }}">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                            {{ $slider->name }}
                                        </h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                            {{ $slider->description }}</p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                            href="{{ Route('shop-page') }}">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->





    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            @foreach ($categories as $cat)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="{{ Route('shop-page') }}">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid" src="{{ url("storage/images/categories/$cat->image") }}"
                                    alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>{{ $cat->name }}</h6>
                                <small
                                    class="text-body">{{ $cat->parent_id == null ? 'Main Category' : $cat->parent?->name }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    {{-- <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
                Products</span></h2>
        <div class="row px-xl-5 product-item">
            <?php $countP = 0; ?>
            @foreach ($product as $pro)
            <input type="hidden" id="pro_id<?php echo $countP++; ?>" value="{{$pro ->id}}"/>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1 ">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ url("storage/images/products/$pro->image")}}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square add-to-cart" id="cartbtn<?php echo $countP++; ?>"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4 ">
                        <a class="h6 text-decoration-none text-truncate" href="">{{$pro->name}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{$pro->finally_price}}</h5>
                            @if ($pro->have_offfer == 1)
                            <h6 class="text-muted ml-2"><del>
                                {{$pro->price }}</del></h6>
                            @endif

                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $countP++; ?>
            @endforeach

        </div>
    </div> --}}


    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
                Products</span></h2>
        <div class="row px-xl-5 product-item">
            <?php $countP = 0; ?>
            @foreach ($product as $pro)
                <input type="hidden" id="pro_id<?php echo $countP; ?>" value="{{ $pro->id }}" />
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ url("storage/images/products/$pro->image") }}"
                                alt="">
                            <div class="product-action">
                                <p class="btn-holder"><a href="{{ route('add-cart', $pro->id)}}"  class="btn btn-outline-dark btn-square" role="button"><i class="fa fa-shopping-cart"></i></a></p>
                                <p class="btn-holder"><a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a></p>
                                <p class="btn-holder"><a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a></p>
                                <p class="btn-holder"><a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a></p>
                            </div>
                        </div>
                        <div class="text-center py-4">

                            <a class="h6 text-decoration-none text-truncate" href="{{ route('details-page', $pro->id) }}">{{ $pro->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ $pro->finally_price }}</h5>
                                @if ($pro->have_offfer == 1)
                                    <h6 class="text-muted ml-2"><del>{{ $pro->price }}</del></h6>
                                @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $countP++; ?>
            @endforeach
        </div>
    </div>
    <!-- Products End -->






    {{-- ***********--}}








    {{-- *********** --}}







    <div class="container-fluid p-5">
        <div class="row px-xl-5">
            <div class="col">

                @foreach ($brands as $brand)
                    <div class="owl-carousel vendor-carousel">

                        <div class="bg-light p-4">
                            <img src="{{ url("storage/images/brands/$brand->image") }}" alt="">
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>







    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection

@section('javascript')

@endsection
