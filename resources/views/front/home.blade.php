@extends('front.layouts.app')
@section('content')
<div class="container">
    <section class="lazy slider" data-sizes="50vw">
        <div class="innerSlider"><img src="{{ asset('public/front/images/silders/1.jpg') }}" alt="1"/></div>
        <div class="innerSlider"><img src="{{ asset('public/front/images/silders/2.jpg') }}" alt="1"/></div>
        <div class="innerSlider"><img src="{{ asset('public/front/images/silders/1.jpg') }}" alt="1"/></div>
        <div class="innerSlider"><img src="{{ asset('public/front/images/silders/2.jpg') }}" alt="1"/></div>
    </section>
    <!--slide close-->
    <div class="timerQuality">
        <div class="wrapper">
            <div class="timerQualityInner">
                <div class="timer">
                    <div class="timerLeft">
                        <h6>The prices are</h6>
                        <p>update on the order list in</p>
                    </div>
                    <div class="timerRight">
                        <ul>
                            <li>02<b>Days</b></li>
                            : 
                            <li>12<b>Hours</b></li>
                            : 
                            <li>40<b>Minutes</b></li>
                            : 
                            <li>23<b>Seconds</b></li>
                        </ul>
                    </div>
                </div>
                <div class="quantity">
                    <ul>
                        <li><span><img src="{{ asset('public/front/images/q1.png') }}" alt="icon"/></span> <b>Secure Payment</b></li>
                        <li><span><img src="{{ asset('public/front/images/q2.png') }}" alt="icon"/></span> <b>Good Offers</b></li>
                        <li><span><img src="{{ asset('public/front/images/q3.png') }}" alt="icon"/></span> <b>Fun System</b></li>
                        <li><span><img src="{{ asset('public/front/images/q4.png') }}" alt="icon"/></span> <b>Free Return</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--time quality close-->
    <div class="productListing">
        <div class="wrapper">
            <div class="productListingInner">
                <div class="productHeader">
                    <h4>TOP 4<b>Order lists</b></h4>
                    <p>Awesome products addd rescently</p>
                    <img src="{{ asset('public/front/images/frame.png')}}" alt="frame"/>
                </div>
                <ul>
                    <li>
                        <span>
                            <img src="{{ asset('public/front/images/products/1.jpg')}}" alt="product"/>
                            <div class="discount">45% OFF</div>
                        </span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>
                                $29.00 <label>$49.00</label> 
                                <div class="shopLogo"><img src="{{ asset('public/front/images/shopname/sn1.png')}}" alt="shop name"/></div>
                            </h5>
                        </section>
                    </li>
                    <li>
                        <span>
                            <img src="{{ asset('public/front/images/products/2.jpg')}}" alt="product"/>
                            <div class="discount">45% OFF</div>
                        </span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>
                                $29.00 <label>$49.00</label> 
                                <div class="shopLogo"><img src="{{ asset('public/front/images/shopname/sn2.png')}}" alt="shop name"/></div>
                            </h5>
                        </section>
                    </li>
                    <li>
                        <span><img src="{{ asset('public/front/images/products/3.jpg')}}" alt="product"/></span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>
                                $29.00 
                                <div class="shopLogo"><img src="{{ asset('public/front/images/shopname/sn1.png')}}" alt="shop name"/></div>
                            </h5>
                        </section>
                    </li>
                    <li>
                        <span><img src="{{ asset('public/front/images/products/4.jpg')}}" alt="product"/></span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>
                                $29.00 <label>$49.00</label> 
                                <div class="shopLogo"><img src="{{ asset('public/front/images/shopname/sn2.png')}}" alt="shop name"/></div>
                            </h5>
                        </section>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--product listing close-->
    <div class="productListing featuredProducts">
        <div class="wrapper">
            <div class="productListingInner">
                <div class="productHeader">
                    <h4>Featured<b>Products</b></h4>
                    <p>Awesome products addd rescently</p>
                    <img src="{{ asset('public/front/images/frameW.png')}}" alt="frame"/>
                </div>
                <ul>
                    <li>
                        <span>
                            <img src="{{ asset('public/front/images/products/1.jpg')}}" alt="product"/>
                            <div class="discount">45% OFF</div>
                        </span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>$29.00 <label>$49.00</label></h5>
                        </section>
                    </li>
                    <li>
                        <span>
                            <img src="{{ asset('public/front/images/products/2.jpg')}}" alt="product"/>
                            <div class="discount">45% OFF</div>
                        </span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>$29.00 <label>$49.00</label></h5>
                        </section>
                    </li>
                    <li>
                        <span><img src="{{ asset('public/front/images/products/3.jpg')}}" alt="product"/></span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>$29.00</h5>
                        </section>
                    </li>
                    <li>
                        <span><img src="{{ asset('public/front/images/products/4.jpg')}}" alt="product"/></span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>$29.00 <label>$49.00</label></h5>
                        </section>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--product listing featured close-->
    <div class="addsBanner">
        <div class="wrapper">
            <div class="addsBannerInner">
                <div class="adsLeft">
                    <p><b>Rose</b> Lee's Products</p>
                    <h4>WEDDING<br>DRESSES</h4>
                    <h3>THIS 50% FALL</h3>
                </div>
                <div class="adsRight">
                    <span>
                        Offer Ends
                        <section>15:40</section>
                        Hrs
                    </span>
                    <img src="{{ asset('public/front/images/ads.jpg')}}" alt="ads"/>
                </div>
            </div>
        </div>
    </div>
    <!--add banner close-->
    <div class="productListing">
        <div class="wrapper">
            <div class="productListingInner">
                <div class="productHeader">
                    <h4>TODAY'S<b>Best deals</b></h4>
                    <p>Buy with most discount</p>
                    <img src="{{ asset('public/front/images/frame.png')}}" alt="frame"/>
                </div>
                <ul>
                    <li>
                        <span>
                            <img src="{{ asset('public/front/images/products/1.jpg')}}" alt="product"/>
                            <div class="discount">45% OFF</div>
                        </span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>$29.00 <label>$49.00</label></h5>
                        </section>
                    </li>
                    <li>
                        <span>
                            <img src="{{ asset('public/front/images/products/2.jpg')}}" alt="product"/>
                            <div class="discount">45% OFF</div>
                        </span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>$29.00 <label>$49.00</label></h5>
                        </section>
                    </li>
                    <li>
                        <span><img src="{{ asset('public/front/images/products/3.jpg')}}" alt="product"/></span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>$29.00</h5>
                        </section>
                    </li>
                    <li>
                        <span><img src="{{ asset('public/front/images/products/4.jpg')}}" alt="product"/></span>
                        <section>
                            <h6>Voyage</h6>
                            <p>Women Brown Square Sunglasses Best In class For Females</p>
                            <b>Sold By:- <label>Kurans.LTD Company</label></b>
                            <h5>$29.00 <label>$49.00</label></h5>
                        </section>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--product listing close-->
    <div class="SHopLogos">
        <div class="wrapper">
            <section class="variable slider">
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn1.jpg')}}" alt="logo"/>
                </div>
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn2.jpg')}}" alt="logo"/>
                </div>
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn3.jpg')}}" alt="logo"/>
                </div>
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn4.jpg')}}" alt="logo"/>
                </div>
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn5.jpg')}}" alt="logo"/>
                </div>
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn1.jpg')}}" alt="logo"/>
                </div>
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn2.jpg')}}" alt="logo"/>
                </div>
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn3.jpg')}}" alt="logo"/>
                </div>
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn4.jpg')}}" alt="logo"/>
                </div>
                <div>
                    <img src="{{ asset('public/front/images/shoplogos/sn5.jpg')}}" alt="logo"/>
                </div>
            </section>
        </div>
    </div>
    <!--shop logos close-->
</div>
@endsection