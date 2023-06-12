@extends('user.layouts.master')

@section('title')
    Shop
@endsection



@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">



                <!-- Price Start -->

                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">

                    <form>

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="all" class="custom-control-input" id="price-all" name="price[]" checked>
                            <label class="custom-control-label" for="price-all">All Price</label>
                        </div>

                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input " id="price-1" name="prices[]" value="0 - 100" min="0" max="100">
                      <label class="custom-control-label " for="price-1">$0 - $100</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-2" name="prices[]" value="100 - 200" min="100" max="200">
                      <label class="custom-control-label" for="price-2">$100 - $200</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-3" name="prices[]" value="200 - 300" min="200" max="300">
                      <label class="custom-control-label" for="price-3">$200 - $300</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-4" name="prices[]" value="300 - 400" min="300" max="400">
                      <label class="custom-control-label" for="price-4">$300 - $400</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                      <input type="checkbox" class="custom-control-input" id="price-5" name="prices[]" value="400 - 500" min="400" max="500">
                      <label class="custom-control-label" for="price-5">$400 - $500</label>
                    </div>
                </form>
            </div>






                        {{-- <div class="bg-light p-4 mb-30">
                            <form>

                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" value="" class="custom-control-input" id="price-all" name="price[]"
                                        value="all">
                                    <label class="custom-control-label" for="price-all">All Price</label>
                                </div>


                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" class="custom-control-input " id="price-1" name="prices[]"
                                        value="0 - 100" min="0" max="100">
                                    <label class="custom-control-label " for="price-1">$0 - $100</label>
                                </div>
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" class="custom-control-input" id="price-2" name="prices[]"
                                        value="100 - 200" min="100" max="200">
                                    <label class="custom-control-label" for="price-2">$100 - $200</label>
                                </div>
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" class="custom-control-input" id="price-3" name="prices[]"
                                    value="200 - 300" min="200" max="300">
                                    <label class="custom-control-label" for="price-3">$200 - $300</label>
                                </div>
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" class="custom-control-input" id="price-4" name="prices[]"
                                        value="300 - 400" min="300" max="400">
                                    <label class="custom-control-label" for="price-4">$300 - $400</label>
                                </div>
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                    <input type="checkbox" class="custom-control-input" id="price-5" name="prices[]"
                                        value="400 - 500" min="400" max="500">
                                    <label class="custom-control-label" for="price-5">$400 - $500</label>
                                </div>

                            </form>
                        </div> --}}
                <!-- Price End -->

















            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($product as $pro)

                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product bg-light mb-4">

                            <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ url("storage/images/products/$pro->image") }}"
                                        alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate"
                                        href="">{{ $pro->name }}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>{{ $pro->finally_price }}</h5>
                                        @if ($pro->have_offfer == 1)
                                            <h6 class="text-muted ml-2"><del>
                                                    {{ $pro->price }}</del></h6>
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


                    @endforeach

                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection


@section('javascript')

<script>
   $('input[name="prices[]"]').change(function() {
    // استدعاء دالة AJAX للتفاعل مع الخادم
    $.ajax({
        url: "{{ route('shop-page') }}",
        type: "GET",
        data: $("form").serialize(), // إرسال بيانات النموذج
        success: function(result) {
            // عرض النتائج في الصفحة
            $("#products-list").html(result);
        },
        error: function(error) {
            console.log(error);
        }
    });
});
    </script>
@endsection
