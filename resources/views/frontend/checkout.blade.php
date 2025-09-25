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
        <div class="container">
            <div class="woocommerce-form-login-toggle">
                {{-- Sirf guest users ko show karo --}}
                @guest
                    <div class="woocommerce-info">
                        Returning customer? <a href="#" class="showlogin">Click here to login</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="#" method="POST" class="woocommerce-form-login mb-3">
                            @csrf
                            <div class="form-group">
                                <label>Username or email *</label>
                                <input type="text" name="email" class="form-control" placeholder="Username or email"
                                    required>
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
            @endguest
             <h4 class="mt-4 pt-lg-2 fw-semibold">Your Order</h4>
            <form action="#" class="woocommerce-cart-form">
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
                        <tr class="cart_item">
                            <td data-title="Product"><a class="cart-productimage" href="shop-details.html"><img
                                        width="91" height="91" src="assets/img/product/product_1_1.png"
                                        alt="Image"></a>
                            </td>
                            <td data-title="Name"><a class="cart-productname" href="shop-details.html">Dumbbells</a>
                            </td>
                            <td data-title="Price"><span class="amount"><bdi><span>$</span>18</bdi></span></td>
                            <td data-title="Quantity"><strong class="product-quantity">01</strong></td>
                            <td data-title="Total"><span class="amount"><bdi><span>$</span>18</bdi></span></td>
                        </tr>
                    </tbody>
                    <tfoot class="checkout-ordertable">
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td data-title="Subtotal" colspan="4"><span
                                    class="woocommerce-Price-amount amount"><bdi><span
                                            class="woocommerce-Price-currencySymbol">$</span>281.05</bdi></span></td>
                        </tr>
                        <tr class="woocommerce-shipping-totals shipping">
                            <th>Shipping</th>
                            <td data-title="Shipping" colspan="4">Enter your address to view shipping options.</td>
                        </tr>
                        <tr class="order-total">
                            <th>Total</th>
                            <td data-title="Total" colspan="4"><strong><span
                                        class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>281.05</bdi></span></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>

            <form action="{{ route('checkout.store') }}" method="POST" class="woocommerce-checkout mt-40">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="h4 fw-semibold">Billing Details</h2>
                        <div class="row">
                            <div class="col-12 form-group"><select name="country" class="form-select">
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
                                </select></div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" name="company_name" class="form-control"
                                    placeholder="Your Company Name">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" name="street_address" class="form-control"
                                    placeholder="Street Address">
                                <input type="text" name="apartment_suite_unit	" class="form-control"
                                    placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" name="city" class="form-control" placeholder="Town / City">
                            </div>

                            <div class="col-12 form-group">
                                <input type="text" name="postcode_zip" class="form-control"
                                    placeholder="Postcode / Zip">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" name="email_address" class="form-control"
                                    placeholder="Email Address">
                                <input type="text" name="phone_number" class="form-control"
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
                                name="ship_to_different_address" value="1" checked="checked"> <label
                                for="ship-to-different-address-checkbox">Ship to a different address? <span
                                    class="checkmark"></span></label></p>
                        <div class="shipping_address">
                            <div class="row">
                                <div class="col-12 form-group"><select class="form-select">
                                        <option>United Kingdom (UK)</option>
                                        <option>United State (US)</option>
                                        <option>Equatorial Guinea (GQ)</option>
                                        <option>Australia (AU)</option>
                                        <option>Germany (DE)</option>
                                    </select></div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" name="company_name" placeholder="Your Company Name">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" name="street_address" placeholder="Street Address">
                                     <input type="text" class="form-control" name="apartment_suite_unit" placeholder="Apartment, suite, unit etc. (optional)">
                                    </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control"  name="city" placeholder="Town / City">
                                </div>
                                {{-- <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="country" placeholder="Country">
                                </div> --}}
                                <div class="col-md-6 form-group"  class="form-control">
                                    <input type="text" class="form-control" name="postcode_zip" placeholder="Postcode / Zip">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" name="email_address"  placeholder="Email Address">
                                    <input type="text" class="form-control" name="phone_number" placeholder="Phone number">
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
                        <li class="wc_payment_method payment_method_bacs"><input id="payment_method_bacs" type="radio"
                                class="input-radio" name="payment_method" value="bacs" checked="checked"> <label
                                for="payment_method_bacs">Stripe</label>
                            {{-- <div class="payment_box payment_method_bacs">
                                <p>Make your payment directly into our bank account. Please use your Order ID as the
                                    payment reference. Your order will not be shipped until the funds have cleared in
                                    our account.</p>
                            </div> --}}
                        </li>
                       
                        <li class="wc_payment_method payment_method_paypal"><input id="payment_method_paypal"
                                type="radio" class="input-radio" name="payment_method" value="paypal"> <label
                                for="payment_method_paypal">Paypal</label>
                            <div class="payment_box payment_method_paypal">
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                                </p>
                            </div>
                        </li>
                    </ul> 
                    <div class="form-row place-order">
                        <button type="submit" class="th-btn style-radius style2">Place
                            order</button></div>
                </div>
            </div>
            </form>
            
           
        </div>
    </div>
@endsection
