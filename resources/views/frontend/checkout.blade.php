@extends('frontend.layout.main')
@section('content')
      <div class="breadcumb-wrapper overflow-hidden" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">Checkout</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="index.html">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="th-checkout-wrapper space-top space-extra-bottom">
        <div class="container checkout">
            {{-- <div class="woocommerce-form-login-toggle"> --}}
            {{-- Sirf guest users ko show karo --}}
          
                <div class="woocommerce-info checkout">
                    Returning customer? <a href="#" class="showlogin">Click here to login</a>
                </div>
            </div>
            <div class="row checkout">
                <div class="col-12">
                    <form action="#" method="POST" class="woocommerce-form-login mb-3">
                        @csrf
                        <div class="form-group">
                            <label>Username or email *</label>
                            <input type="text" name="email" class="form-control" placeholder="Username or email" required>
                        </div>
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="remembermylogin" name="remember">
                                <label for="remembermylogin">Remember Me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="th-btn style2 style-radius">Login</button>
                            <p class="mt-3 mb-0">
                                <a class="text-reset" href="#">Lost your password?</a>
                            </p>
                        </div>
                    </form>
                
      
        </div>
        </div>
        <h4 class="mt-4 pt-lg-2 fw-semibold checkout">Your Order</h4>
        <form action="#" class="woocommerce-cart-form checkout">
            <table class="cart_table mb-20">
                <thead>
                    <tr>
                        <th class="cart-col-image">Image</th>
                        <th class="cart-col-productname">Product Name</th>
                        <th class="cart-col-price">Price</th>
                        <th class="cart-col-quantity">Quantity</th>
                        <th class="cart-col-total">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $subtotal = 0; @endphp
                    @foreach ($cart as $item)
                        @php
                            $lineTotal = $item['price'] * $item['quantity'];
                            $subtotal += $lineTotal;
                        @endphp
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="#">
                                    <img width="91" height="91" src="{{ asset('storage/' . $item['image']) }}"
                                        alt="{{ $item['name'] }}">
                                </a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="#">{{ $item['name'] }}</a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span>{{ number_format($item['price'], 2) }}</bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <strong class="product-quantity">{{ $item['quantity'] }}</strong>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span>{{ number_format($lineTotal, 2) }}</bdi></span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

                <tfoot class="checkout-ordertable">
                    <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td data-title="Subtotal" colspan="4">
                            <span
                                class="woocommerce-Price-amount amount"><bdi><span>$</span>{{ number_format($subtotal, 2) }}</bdi></span>
                        </td>
                    </tr>
                    <tr class="woocommerce-shipping-totals shipping">
                        <th>Shipping</th>
                        <td data-title="Shipping" colspan="4">Enter your address to view shipping options.</td>
                    </tr>
                    <tr class="order-total">
                        <th>Total</th>
                        <td data-title="Total" colspan="4">
                            <strong>
                                <span
                                    class="woocommerce-Price-amount amount"><bdi><span>$</span>{{ number_format($subtotal, 2) }}</bdi></span>
                            </strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
        <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form" class="woocommerce-checkout mt-40 checkout">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="h4 fw-semibold">Billing Details</h2>
                    <div class="row">
                        <div class="col-12 form-group"><select name="country" id="billing_country" class="form-select">
                                <option value="UK">United Kingdom (UK)</option>
                                <option value="US">United States (US)</option>
                                <option value="GQ">Equatorial Guinea (GQ)</option>
                                <option value="AU">Australia (AU)</option>
                                <option value="DE">Germany (DE)</option>
                                <option value="CA">Canada (CA)</option>
                                <option value="FR">France (FR)</option>
                                <option value="IN">India (IN)</option>
                                <option value="PK">Pakistan (PK)</option>
                                <option value="BD">Bangladesh (BD)</option>
                                <option value="CN">China (CN)</option>
                                <option value="JP">Japan (JP)</option>
                                <option value="SA">Saudi Arabia (SA)</option>
                                <option value="AE">United Arab Emirates (AE)</option>
                                <option value="ZA">South Africa (ZA)</option>
                                <option value="NG">Nigeria (NG)</option>
                                <option value="BR">Brazil (BR)</option>
                                <option value="RU">Russia (RU)</option>
                                <option value="IT">Italy (IT)</option>
                                <option value="ES">Spain (ES)</option>
                            </select>
                            {{-- <span class="text-danger error-message" data-error-for="country"></span> --}}
                        </div>
                        <div class="col-md-6 form-group">
                            <span class="text-danger error-message" data-error-for="first_name"></span>
                            <input type="text" name="first_name" id="billing_first_name" class="form-control"
                                placeholder="First Name">

                        </div>
                        <div class="col-md-6 form-group">
                            <span class="text-danger error-message" data-error-for="last_name"></span>
                            <input type="text" name="last_name" id="billing_last_name" class="form-control"
                                placeholder="Last Name">

                        </div>
                        <div class="col-12 form-group">
                            <span class="text-danger error-message" data-error-for="company_name"></span>
                            <input type="text" name="company_name" id="billing_company" class="form-control"
                                placeholder="Your Company Name">

                        </div>
                        <div class="col-12 form-group">
                            <span class="text-danger error-message" data-error-for="street_address"></span>
                            <input type="text" name="street_address" id="billing_address" class="form-control"
                                placeholder="Street Address">
                            <span class="text-danger error-message" data-error-for="apartment_suite_unit"></span>
                            <input type="text" name="apartment_suite_unit" id="billing_apartment_suite_unit"
                                class="form-control" placeholder="Apartment, suite, unit etc. (optional)">

                        </div>
                        <div class="col-12 form-group">
                            <span class="text-danger error-message" data-error-for="city"></span>
                            <input type="text" name="city" class="form-control" id="billing_city"
                                placeholder="Town / City">

                        </div>

                        <div class="col-12 form-group">
                            <span class="text-danger error-message" data-error-for="postcode_zip"></span>
                            <input type="text" name="postcode_zip" class="form-control" id="billing_postcode"
                                placeholder="Postcode / Zip">

                        </div>
                        <div class="col-12 form-group">
                            <span class="text-danger error-message" data-error-for="email_address"></span>
                            <input type="text" name="email_address" class="form-control" id="billing_email"
                                placeholder="Email Address">
                            <span class="text-danger error-message" data-error-for="phone_number"></span>
                            <input type="text" name="phone_number" class="form-control" id="billing_phone"
                                placeholder="Phone number">

                        </div>
                        <div class="col-12 form-group">
                            <input type="checkbox" id="accountNewCreate">
                            <label for="accountNewCreate">Create An Account?</label>
                        </div>
                    </div>


                </div>
                
                <div class="col-lg-6">
                    <p id="ship-to-different-address"><input id="ship-to-different-address-checkbox" type="checkbox"
                            name="ship_to_different_address" value="1"> <label
                            for="ship-to-different-address-checkbox">Ship to a different address? <span
                                class="checkmark"></span></label>
                    </p>
                    <div class="shipping_address" style="display: none;">
                        <div class="row">
                            <div class="col-12 form-group"><select id="shipping_country" name="shipping_country"
                                    class="form-select">
                                    <option>United Kingdom (UK)</option>
                                    <option>United State (US)</option>
                                    <option>Equatorial Guinea (GQ)</option>
                                    <option>Australia (AU)</option>
                                    <option>Germany (DE)</option>
                                </select></div>
                            <div class="col-md-6 form-group">
                                <span class="text-danger error-message" data-error-for="shipping_first_name"></span>
                                <input type="text" class="form-control" id="shipping_first_name"
                                    name="shipping_first_name" placeholder="First Name">

                            </div>
                            <div class="col-md-6 form-group">
                                <span class="text-danger error-message" data-error-for="shipping_last_name"></span>
                                <input type="text" class="form-control" id="shipping_last_name"
                                    name="shipping_last_name" placeholder="Last Name">

                            </div>
                            <div class="col-12 form-group">
                                <span class="text-danger error-message" data-error-for="shipping_company_name"></span>
                                <input type="text" class="form-control" id="shipping_company_name"
                                    name="shipping_company_name" placeholder="Your Company Name">
                            </div>
                            <div class="col-12 form-group">
                                <span class="text-danger error-message" data-error-for="shipping_street_address"></span>
                                <input type="text" class="form-control" id="shipping_street_address"
                                    name="shipping_street_address" placeholder="Street Address">
                                <span class="text-danger error-message"
                                    data-error-for="shipping_apartment_suite_unit"></span>
                                <input type="text" class="form-control" id="shipping_apartment_suite_unit"
                                    name="shipping_apartment_suite_unit"
                                    placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                            <div class="col-12 form-group">
                                <span class="text-danger error-message" data-error-for="shipping_city"></span>
                                <input type="text" class="form-control" id="shipping_city" name="shipping_city"
                                    placeholder="Town / City">
                            </div>
                            {{-- <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="country" placeholder="Country">
                                </div> --}}
                            <div class="col-md-6 form-group" class="form-control">
                                <span class="text-danger error-message" data-error-for="shipping_postcode_zip"></span>
                                <input type="text" class="form-control" id="shipping_postcode_zip"
                                    name="shipping_postcode_zip" placeholder="Postcode / Zip">
                            </div>
                            <div class="col-12 form-group">
                                <span class="text-danger error-message" data-error-for="shipping_email_address"></span>
                                <input type="text" class="form-control" id="shipping_email_address"
                                    name="shipping_email_address" placeholder="Email Address">
                                <span class="text-danger error-message" data-error-for="shipping_phone_number"></span>
                                <input type="text" class="form-control" id="shipping_phone_number"
                                    name="shipping_phone_number" placeholder="Phone number">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <textarea cols="20" rows="5" class="form-control"
                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                </div>
                </div>
            


            <div class="mt-lg-3 mb-30">
                <div class="woocommerce-checkout-payment">
                    <ul class="wc_payment_methods payment_methods methods">
                        <li class="wc_payment_method payment_method_stripe">
                            <input id="payment_method_stripe" type="radio" name="payment_method" value="stripe">
                            <label for="payment_method_stripe">Stripe</label>
                        </li>
                        <!-- Stripe Payment Form (hidden by default) -->
                        <div id="stripe-form-container" style="display:none; margin-top:20px;">
                            <div id="card-element"><!-- Stripe injects card form here --></div>
                            <div id="card-errors" style="color:red; margin-top:10px;"></div>
                            {{-- <button type="button" id="pay-with-stripe" class="th-btn style-radius style2 mt-3">
                                Pay with Stripe
                            </button> --}}
                        </div>
                        <!-- PayPal -->
                        <li class="wc_payment_method payment_method_paypal">
                            <input id="payment_method_paypal" type="radio" name="payment_method" value="paypal">
                            <label for="payment_method_paypal">PayPal</label>
                        </li>
                    </ul>
                    <div class="form-row place-order">
                        <button type="submit" id="pay-with-stripe" class="th-btn style-radius style2">Place
                            order</button>
                    </div>
                </div>
            </div>
        </form>



        <script src="https://js.stripe.com/v3/"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const form = document.getElementById("checkout-form");
                const billingFields = [
                    "first_name", "last_name", "street_address", "city",
                    "country", "postcode_zip", "email_address", "phone_number", "company_name",
                    "apartment_suite_unit"
                ];
                const shippingCheckbox = document.getElementById("ship-to-different-address-checkbox");

                form.addEventListener("submit", function(e) {
                    let valid = true;

                    // ✅ Saare purane errors hatao
                    document.querySelectorAll(".error-message").forEach(span => {
                        span.textContent = "";
                    });

                    // ✅ Billing fields check
                    billingFields.forEach(function(field) {
                        const input = document.querySelector(`[name="${field}"]`);
                        if (input && input.value.trim() === "") {
                            valid = false;
                            const errorSpan = document.querySelector(`[data-error-for="${field}"]`);
                            if (errorSpan) errorSpan.textContent =
                                `${field.replace("_", " ")} is required`;
                        }
                    });

                    // ✅ Shipping fields check only if checkbox is ticked
                    if (shippingCheckbox.checked) {
                        const shippingFields = [
                            "shipping_first_name", "shipping_last_name",
                            "shipping_street_address", "shipping_city",
                            "shipping_country", "shipping_postcode_zip",
                            "shipping_email_address", "shipping_phone_number"
                        ];

                        shippingFields.forEach(function(field) {
                            const input = document.querySelector(`[name="${field}"]`);
                            if (input && input.value.trim() === "") {
                                valid = false;
                                const errorSpan = document.querySelector(`[data-error-for="${field}"]`);
                                if (errorSpan) errorSpan.textContent =
                                    `${field.replace("shipping_", "").replace("_", " ")} is required (Shipping)`;
                            }
                        });
                    }

                    // ❌ Agar invalid hai to form submit roko
                    if (!valid) {
                        e.preventDefault();
                    }
                });
            });
        </script>








        {{-- <script src="https://js.stripe.com/v3/"></script> --}}

        <script>
            // Publishable key (pk_test se start hoti hai)
            const stripe = Stripe("{{ config('services.stripe.key') }}");
            const elements = stripe.elements();
            const card = elements.create("card");

            // Radio button toggle
            document.querySelectorAll('input[name="payment_method"]').forEach(el => {
                el.addEventListener("change", function(e) {
                    if (e.target.value === "stripe") {
                        document.getElementById("stripe-form-container").style.display = "block";
                        card.mount("#card-element");
                    } else {
                        document.getElementById("stripe-form-container").style.display = "none";
                        card.unmount();
                    }
                });
            });

            // Pay button
            document.getElementById("pay-with-stripe").addEventListener("click", async function() {
                let response = await fetch("{{ url('/create-payment-intent') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        amount: {{ $subtotal * 100 }} // cents me bhejna
                    })
                });

                let {
                    clientSecret
                } = await response.json();

                const {
                    error,
                    paymentIntent
                } = await stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: card
                    }
                });

                if (error) {
                    document.getElementById("card-errors").textContent = error.message;
                } else if (paymentIntent.status === "succeeded") {
                    document.getElementById("card-errors").textContent = "✅ Payment successful!";
                    let form = document.getElementById("checkout-form");
                    let hidden = document.createElement("input");
                    hidden.setAttribute("type", "hidden");
                    hidden.setAttribute("name", "payment_intent_id");
                    hidden.setAttribute("value", paymentIntent.id);
                    form.appendChild(hidden);
                    form.submit();
                }
            });
        </script>

    </div>
    </div>
@endsection
