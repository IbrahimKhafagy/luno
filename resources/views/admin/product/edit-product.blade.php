@extends('admin/layouts/master')


@section('title')
    Edit product
@endsection

@section('content')
    <div id="list-item-1" class="card fieldset border border-muted mt-0">

        <span class="fieldset-tile"></span>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h6 class="card-title mb-0">Form Validation</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3 basic-form" id="productFormUpdate" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="text" name="product_id" value={{ $product->id }} style="display : none;" required>
                        {{-- <div class="col-md-3">
                        <label class="form-label">name : </label>
                        <input type="text" value={{ $product->name }} data-validation="required" data-validation-required="required" id="name:en" name="name" class="form-control" >
                    </div> --}}

                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-6">
                                <label class="form-label">الاسم {{ $locale }}</label>
                                <input type="text" name="name:{{ $locale }}" id="name:{{ $locale }}"
                                    data-validation="required" data-validation-required="required"
                                    class="form-control form-control-lg @error('name:{{ $locale }}') is-invalid @enderror"
                                    value="{{ $product->translate($locale)->name }}" placeholder="...">
                            </div>
                            @error('name:{{ $locale }}')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="col-6">
                                <label class="form-label">الوصف {{ $locale }}</label>
                                <input type="text" name="description:{{ $locale }}" id="name:{{ $locale }}"
                                    data-validation="required" data-validation-required="required"
                                    class="form-control form-control-lg @error('name:{{ $locale }}') is-invalid @enderror"
                                    value="{{ $product->translate($locale)->description }}" placeholder="...">
                            </div>
                            @error('name:{{ $locale }}')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        @endforeach


                        <div>
                            <div class="col-md-6">
                                <label class="form-label">category ID: </label>
                                <select name="category_id" class="form-control show-tick ms">
                                    <option value="">{{ $product->category->name }}</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>

                            <div class="card col-12">
                                <div class="card-body form-control form-control-lg">
                                    <h6>Photo:</h6>
                                    <input type="file" name="image" class="dropify"
                                        data-default-file="{{ asset('storage/images/products/' . $product->image) }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">price</label>
                            <input type="text" name="price" id="price" value={{ $product->price }}
                                data-validation="required" data-validation-required="required"
                                class="form-control form-control-lg @error('price') is-invalid @enderror" placeholder="...">
                        </div>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <P>
                        <div class="col-3">
                            <label class="form-label">have offer</label>
                            <select class="form-control show-tick ms select2" id="have_offer" data-validation="required"
                                data-validation-required="required" name="have_offfer">
                                <option value="0"{{ $product->have_offfer == '0' ? 'selected' : '' }}>No</option>
                                <option value="1"{{ $product->have_offfer == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        @error('have_offfer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </P>
                        <div id="offer_fields" style="display: none;">
                            <div class="col-6">
                                <label class="form-label">offer type</label>
                                <select class="form-control show-tick ms select2 @error('offer_type') is-invalid @enderror"
                                    name="offer_type" data-placeholder="Select" id="offer_type" data-validation="required"
                                    data-validation-required="required">

                                    <option value="percentage"
                                        {{ $product->offer_type == 'percentage' ? 'selected' : '' }}>percentage</option>

                                    <option value="value" {{ $product->offer_type == 'value' ? 'selected' : '' }}>value
                                    </option>
                                </select>
                            </div>
                            @error('offer_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="col-6 mt-3">
                                <label class="form-label">offer value</label>
                                <input type="text" name="offer_value" value="{{ $product->offer_value }}"
                                    id="offer_value" data-validation="required" data-validation-required="required"
                                    class="form-control form-control-lg @error('offer_value') is-invalid @enderror"
                                    placeholder="...">
                            </div>
                            @error('offer_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mt-3">
                            <label class="form-label">final price</label>
                            <input type="text" value={{ $product->finally_price }} name="finally_price"
                                id="final_price2" data-validation="required" data-validation-required="required"
                                class="form-control form-control-lg @error('finally_price') is-invalid @enderror"
                                placeholder="...">
                        </div>
                        @error('finally_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <p id="final_price"></p>





                        <div class="col-12">
                            <button type="submit" id="update_product" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        @endsection




        @section('js')
            <script>
                $(document).ready(function() {
                    $("#travel").change(function() {
                        if ($("#travel").val() == 1) {
                            $("#hidden-panel").show()
                        } else {
                            $("#hidden-panel").hide()
                        }
                    })
                });
            </script>

            <script>

                var selectElement = document.getElementById("have_offer");
                var offer_fields = document.getElementById("offer_fields");


                selectElement.onchange = function() {
                    if (selectElement.value === "1") {
                        offer_fields.style.display = "block";
                    } else {
                        $('#offer_value').val(0);
                        calculateFinalPrice();
                        offer_fields.style.display = "none";
                    }



                }

                /* change price */
                var priceInput = document.getElementById("price");
                var offerTypeSelect = document.getElementById("offer_type");
                var offerValueInput = document.getElementById("offer_value");
                var finalPriceParagraph = document.getElementById("final_price");

                function calculateFinalPrice() {

                    var price = priceInput.value;
                    var offerType = offerTypeSelect.value;
                    var offerValue = offerValueInput.value;
                    var finalPrice;
                    if (offerType === "percentage") {
                        finalPrice = price - (price * offerValue / 100);
                    } else {
                        finalPrice = price - offerValue;
                    }
                    finalPriceParagraph.textContent = "Final Price: " + finalPrice;
                    $('#final_price2').val(finalPrice);

                    $("#have_offer").change(function() {
                        calculateFinalPrice();
                    });
                }
                offerTypeSelect.addEventListener("change", calculateFinalPrice);
                priceInput.addEventListener("input", calculateFinalPrice);
                offerValueInput.addEventListener("input", calculateFinalPrice);


                var haveOfferElement = document.getElementById("have_offer");

                haveOfferElement.addEventListener("change", function() {
                    var selectedOption = haveOfferElement.options[haveOfferElement.selectedIndex];
                    if (selectedOption.value === "1") {
                        selectedOption.textContent = "Yes";
                    } else {
                        selectedOption.textContent = "No";
                    }
                });
            </script>



            <script>
                $(document).on('click', '#update_product', function(e) {
                    e.preventDefault();

                    var formData = new FormData($('#productFormUpdate')[0]);

                    $.ajax({
                        type: 'post',
                        enctype: 'multipart/form-data',
                        url: "{{ route('update-product') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data) {

                            swal("Good job!", "Product updated successfuly!", "success");
                            if (data.status == true) {
                                $('#success_msg').show();
                            }


                        },
                        error: function(reject) {}
                    });
                });
            </script>
        @endsection
