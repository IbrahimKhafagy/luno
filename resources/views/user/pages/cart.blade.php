@extends('user.layouts.master')

@section('title')
 Cart
@endsection

@section('content')





<table class="table table-light table-borderless table-hover text-center mb-0">
    <thead class="thead-dark">
        <tr>
            <th>image</th>
            <th>Products</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td><img src="{{ asset('storage/images/products/' . $details['image']) }}" width="100" height="100" class="img-responsive"/></td>
                    <td data-th="Product">
                        <div class="row">

                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td data-th="Subtotal" id="cart-subtotal" class="text-center">${{$details['price'] * $details['quantity'] }}</td>
                    <td class="align-middle"><button class="btn btn-sm btn-danger remove-from-cart"><i class="fa fa-times"></i></button></td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-success">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('javascript')


<script>
$('.quantity').on('click', '.btn-plus, .btn-minus', function(e){
    e.preventDefault();
    var id = $(this).closest('tr').data('id');
    var quantityInput = $(this).closest('.quantity').find('input');
    var newQuantity = parseInt(quantityInput.val());
    if ($(this).hasClass('btn-plus')) {
        newQuantity += 1;
    } else if ($(this).hasClass('btn-minus') && newQuantity > 1) {
        newQuantity -= 1;
    }
    quantityInput.val(newQuantity);

    $.ajax({
        type: "PATCH",
        url: '{{ route('cart.update') }}',
        data: {
            '_token': "{{ csrf_token() }}",
            id: id,
            quantity: newQuantity
        },
        success: function(data) {
            $('#cart-count').html(data.cartCount);

            // Update item total price and quantity
            var itemTotal = data.itemTotal;
            var quantity = data.quantity;
            $('tr[data-id="'+id+'"] .text-center').html('$'+itemTotal);
            $('tr[data-id="'+id+'"] input').val(quantity);


            // Update cart subtotal and total price
            $('#cart-subtotal').html('$'+data.cartSubtotal);
            $('#cart-total').html('$'+data.cartTotal);


            // Update final price and minus buttons
            var finalPrice = 0;
            $('tr').each(function() {
                var quantity = parseInt($(this).find('input').val());
                var price = parseFloat($(this).find('.price').text().replace('$', ''));
                if (!isNaN(quantity) && !isNaN(price)) {
                    finalPrice += quantity * price;
                }
                if (quantity > 1) {
                    $(this).find('.btn-minus').prop('disabled', false);
                } else {
                    $(this).find('.btn-minus').prop('disabled', true);
                }
            });
            $('#final-price').html('$'+finalPrice.toFixed(2));
        }
    });
});
</script>


<script>


$(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {

                    window.location.reload();
                }
            });
        }
    });
</script>



@endsection
