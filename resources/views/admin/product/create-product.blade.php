@extends('admin/layouts/master')

@section('title')
    Add Product
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
                    <form class="row g-3 basic-form" id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-3">
                            <label class="form-label">name en: </label>
                            <input type="text" data-validation="required" data-validation-required="required"
                                id="name:en" name="name:en" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">name ar: </label>
                            <input type="text" data-validation="required" data-validation-required="required"
                                id="name:ar" name="name:ar" class="form-control">
                        </div>
                        <p>
                        <div class="col-md-3">
                            <label class="form-label">description en: </label>
                            <input type="text" data-validation="required" data-validation-required="required"
                                id="description:en" name="description:en" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">description ar: </label>
                            <input type="text" data-validation="required" data-validation-required="required"
                                id="description:ar" name="description:ar" class="form-control">
                        </div>
                        <div>
                            <div class="col-md-6">
                                <label class="form-label">category ID: </label>
                                <select id="cat_id" name="category_id" class="form-control show-tick ms">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 d-none" id="child_cat_div">
                                <label class="form-label">Sup Category </label>
                                <select id="child_cat_id" name="category_id" class="form-control show-tick ms">
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-body">
                                        <h6>Photo :</h6>
                                        <input type="file" name="image" class="dropify">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">price</label>
                                <input type="text" name="price" id="price" data-validation="required"
                                    data-validation-required="required"
                                    class="form-control form-control-lg @error('price') is-invalid @enderror"
                                    placeholder="Enter Price">
                            </div>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="col-6">
                                <label class="form-label">have offer</label>
                                <select class="form-control show-tick ms select2 @error('have_offfer') is-invalid @enderror"
                                    id="have_offer" data-validation="required" data-validation-required="required"
                                    name="have_offfer" data-placeholder="Select">
                                    <option></option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            @error('have_offfer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="offer_fields" style="display: none;">
                                <div class="col-6">
                                    <label class="form-label">offer type</label>
                                    <select
                                        class="form-control show-tick ms select2 @error('offer_type') is-invalid @enderror"
                                        name="offer_type" data-placeholder="Select" id="offer_type"
                                        data-validation="required" data-validation-required="required">
                                        <option></option>
                                        <option value="percentage">percentage</option>
                                        <option value="value" selected>value</option>
                                    </select>
                                </div>
                                @error('offer_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="col-6 mt-3">
                                    <label class="form-label">offer value</label>
                                    <input type="text" name="offer_value" id="offer_value" data-validation="required"
                                        data-validation-required="required"
                                        class="form-control form-control-lg @error('offer_value') is-invalid @enderror"
                                        placeholder="...">
                                </div>
                                @error('offer_value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">final price</label>
                                <input type="text" name="finally_price" id="final_price2" data-validation="required"
                                    data-validation-required="required"
                                    class="form-control form-control-lg @error('finally_price') is-invalid @enderror"
                                    placeholder="final price">
                            </div>
                            @error('finally_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <p id="final_price"></p>


                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                    </form>
                </div>

            </div>
        @endsection


        @section('js')
            <script>
            $('#cat_id').change(function(){
            var cat_id =$(this).val();
            if(cat_id != null){
                $.ajax({
                    url:"/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{ csrf_token() }}",
                        cat_id:cat_id,
                    },
                    success: function(response) {
                        if(response.status){
                            var html_option ="<option value=''> Sup Category </option>";
                            $('#child_cat_div').removeClass('d-none');
                            $.each(response.data,function(id,name){

                                html_option +="<option value='"+id+"'>"+name+"</option>"
                            });

                        }else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal("Error!", errorText, "error");
                    }
                })
            }


            });
            </script>

            <script type="text/javascript">
                $.validate({
                    form: 'form'
                });
                $(document).ready(function() {
                    $("#form").submit(function(e) {
                        e.preventDefault();

                        let formData = new FormData(this);
                        // alert('jj');
                        $.ajax({
                            url: '{{ route('store.product') }}',
                            type: 'POST',
                            dataType: "json",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                if ($.isEmptyObject(data.error)) {
                                    swal("Good job!", "created succsessfuly!", "success");

                                    $('#form')[0].reset();
                                    console.log(response);
                                } else {
                                    printErrorMsg(data.error);
                                }

                            },
                            error: function(data) {
                                var errorText = '';
                                if (data.responseJSON.hasOwnProperty('errors')) {
                                    $.each(data.responseJSON.errors, function(key, value) {
                                        errorText += value + '\n';
                                    });
                                } else {
                                    errorText = 'An error occurred.';
                                }
                                swal("Error!", errorText, "error");
                            }
                        });

                    });

                });
            </script>


            <script>
                function showHide() {
                    let travelhistory = document.getElementById('travel')
                    if (travelhistory.value == 1) {
                        document.getElementById('hidden-panel').style.display = 'block'
                    } else {
                        document.getElementById('hidden-panel').style.display = 'none'
                    }
                }
            </script>

            {{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" > </script> --}}

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
            </script>








            <script>
                const name = document.getElementById('name:en')
                const description = document.getElementById('description:en')
                // const description = document.getElementById('price')
                // const description = document.getElementById('finally_price')
                // const password = document.getElementById('image')
                const form = document.getElementById('form')
                const errorElement = document.getElementById('error')

                form.addEventListener('submit', (e) => {
                            let messages = []
                            if (name: en.value === '' || name: en.value == null) {
                                messages.push('Name is required')
                            }

                            // if (password.value.length <= 6) { messages.push('Password must be longer than 6 characters') } if
                            //     (password.value.length>= 20) {
                            //     messages.push('Password must be less than 20 characters')
                            //     }

                            // if (password.value === 'password') {
                            // messages.push('Password cannot be password')
                            // }

                            // if (messages.length > 0) {
                            // e.preventDefault()
                            // errorElement.innerText = messages.join(', ')
                            // }
                            // })


                            <script >
                            @endsection
