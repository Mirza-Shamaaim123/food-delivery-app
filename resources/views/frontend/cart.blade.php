@extends('frontend.layout.main')

@section('content')
    <div class="breadcumb-wrapper overflow-hidden" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">Cart Page</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="{{ route('frontend.shop') }}">Home</a></li>
                            <li>Cart Page</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="th-cart-wrapper space-top space-extra-bottom">
        <div class="container">
            <form action="#" class="woocommerce-cart-form">
                <table class="cart_table table table-bordered">
                    <thead>
                        <tr>
                            <th class="cart-col-image">Image</th>
                            <th class="cart-col-productname">Product Name</th>
                            <th class="cart-col-price">Price</th>
                            <th class="cart-col-quantity">Quantity</th>
                            <th class="cart-col-total">Total</th>
                            <th class="cart-col-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cart as $id => $item)
                            <tr data-id="{{ $id }}">
                                <td><img src="{{ asset('storage/' . $item['image']) }}" width="91" height="91"></td>
                                <td>{{ $item['name'] }}</td>
                                <td class="item-price" data-price="{{ $item['price'] }}">
                                    ${{ number_format($item['price'], 2) }}
                                </td>
                                <td>
                                    <div class="quantity d-flex align-items-center">
                                        <button type="button" class="btn btn-light update-cart"
                                            data-action="decrease">-</button>
                                        <input type="text" value="{{ $item['quantity'] }}"
                                            class="form-control text-center mx-1 qty-input" style="width:60px;" readonly>
                                        <button type="button" class="btn btn-danger update-cart"
                                            data-action="increase">+</button>
                                    </div>
                                </td>
                                <td class="item-total">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td>
                                    <a href="{{ route('frontend.removeFromCart', $id) }}"
                                        class="btn btn-sm btn-danger">Remove</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Your cart is empty.</td>
                            </tr>
                        @endforelse

                        <td colspan="6" class="actions">
                            {{-- <div class="th-cart-coupon mb-3">
                                    <form action="{{ route('frontend.applyCoupon') }}" method="POST" class="d-flex gap-2">
                                        @csrf
                                        <input type="text" name="coupon_code" class="form-control"
                                            placeholder="Coupon Code..." required>
                                        <button type="submit" class="th-btn style2 style-radius">Apply Coupon</button>
                                    </form>
                                </div> --}}
                            <button type="submit" class="th-btn style2 style-radius">Update cart</button>
                            <a href="{{ route('frontend.shop') }}" class="th-btn style3 style-radius">Continue
                                Shopping</a>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <form action="{{ route('frontend.applyCoupon') }}" method="POST" class="th-cart-coupon d-flex gap-2">
                @csrf
                <input type="text" name="coupon_code" class="form-control" placeholder="Coupon Code..." required>
                <button type="submit" class="th-btn style2 style-radius">Apply Coupon</button>
            </form>


            <div class="row justify-content-end mt-4">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <h2 class="h4 summary-title">Cart Totals</h2>
                    <table class="cart_totals table table-bordered">
                        <tbody>
                            <tr>
                            <tr>
                                <td>Cart Subtotal</td>
                                <td>
                                    <span class="amount cart-subtotal">
                                        <bdi>${{ number_format($subtotal, 2) }}</bdi>
                                    </span>
                                </td>
                            </tr>
                            @if (session('coupon'))
                                <tr>
                                    <td>Coupon ({{ session('coupon.code') }})</td>
                                    <td>
                                        <span class="amount text-success">
                                            - ${{ number_format(session('coupon.discount'), 2) }}
                                        </span>
                                    </td>
                                </tr>
                            @endif

                            <tr class="order-total">
                                <td>Order Total</td>
                                <td>
                                    <strong>
                                        <span class="amount">
                                            <bdi class="order-total-amount">
                                                ${{ number_format($subtotal - (session('coupon.discount') ?? 0), 2) }}
                                            </bdi>
                                        </span>
                                    </strong>
                                </td>
                            </tr>

                            </tr>
                            <tr class="shipping">
                                <th>Shipping and Handling</th>
                                <td data-title="Shipping and Handling">
                                    <ul class="woocommerce-shipping-methods list-unstyled d-flex gap-4">
                                        <li>
                                            <input type="radio" id="free_shipping" name="shipping_method"
                                                class="shipping_method">
                                            <label for="free_shipping">Free shipping</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="flat_rate" name="shipping_method"
                                                class="shipping_method" checked>
                                            <label for="flat_rate">Flat rate</label>
                                        </li>
                                    </ul>
                                    <p class="woocommerce-shipping-destination mt-2">
                                        Shipping options will be updated during checkout.
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="wc-proceed-to-checkout mb-30">
                        <a href="{{ route('frontend.checkout') }}" class="th-btn style2 style-radius">Proceed to
                            checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        $(document).on('click', '.update-cart', function() {
            let action = $(this).data('action');
            let row = $(this).closest('tr');
            let id = row.data('id');

            $.ajax({
                url: "/update-cart/" + id,
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    action: action
                },
                success: function(response) {
                    if (response.success) {
                        row.find('.qty-input').val(response.quantity);
                        row.find('.item-total').text("$" + response.item_total);

                        $(".cart-subtotal bdi").text("$" + response.subtotal);
                        $(".order-total bdi").text("$" + response.order_total);

                        if ($(".coupon-discount").length) {
                            $(".coupon-discount").text("- $" + response.coupon_discount);
                        }

                        $(".shipping-amount").text("$" + response.shipping_cost);

                    }
                }
            });
        });
    </script> --}}



    <script>
        let updateTimeout;

        $(document).on('click', '.update-cart', function() {
            let row = $(this).closest('tr');
            let id = row.data('id');
            let qtyInput = row.find('.qty-input');

            // Local quantity update
            let currentQty = parseInt(qtyInput.val());
            let action = $(this).data('action');

            if (action === "increase") {
                currentQty++;
            } else if (action === "decrease" && currentQty > 1) {
                currentQty--;
            }

            qtyInput.val(currentQty); // UI me turant dikh jaye

            // Delay: 0.6 sec
            clearTimeout(updateTimeout);
            updateTimeout = setTimeout(() => {
                $.ajax({
                    url: "/update-cart/" + id,
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        quantity: currentQty // 👈 action ke bajaye final quantity
                    },
                    success: function(res) {
                        if (res.success) {
                            // Quantity aur product total update
                            row.find('.item-total').text("$" + res.item_total);
                            $(".cart-subtotal bdi").text("$" + res.subtotal);
                            $(".order-total bdi").text("$" + res.order_total);

                            // Coupon discount update agar exist karta ho
                            if ($(".coupon-discount").length) {
                                $(".coupon-discount").text("- $" + res.coupon_discount);
                            }

                            // Shipping cost update
                            $(".shipping-amount").text("$" + res.shipping_cost);
                        }
                    }
                });
            }, 600); // 0.6 sec delay
        });
    </script>
@endpush
