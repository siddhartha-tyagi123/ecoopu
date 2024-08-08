<header>
  <!-- <style>
    .currencyList {
    display: flex;
    align-items: center;
    gap: 10px; /* Adjust as needed for spacing */
} -->

  </style>
    <div class="topBar">
        <div class="wrapper">
            <div class="topBarInner">
                <div class="currencyChange">Currency:
                    <label>
                        <input type="checkbox" />
                        <span>EURO</span></label>
                    <label>
                        <input type="checkbox" />
                        <span>DKK</span></label>
                </div>
                <!-- <p>{{ __('message.Average discount (Not required for now)') }}</p> -->
                <p>Average discount (Not required for now)</p>
                <section> Country:
                    <div class="currencyList"><span><img src="{{ asset('public/front/images/flag.png') }}" alt="Country"/></span>
              <ul>
                <li><img src="{{ asset('public/front/images/flag1.png') }}" alt="Country"/></li>
                <li><img src="{{ asset('public/front/images/flag2.png') }}" alt="Country"/></li>
                <li><img src="{{ asset('public/front/images/flag3.png') }}" alt="Country"/></li>
              </ul>
            </div>


                </section>
            </div>
        </div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-error">
        {{ session()->get('error') }}
    </div>
    @endif
    <div class="logoNav">
        <div class="wrapper">
            <div class="logoNavInner"> <a href="{{ route('home') }}" class="logo"><img
                        src="{{ asset('public/front/images/logo.png') }}" alt="logo" /></a>
                <nav>
                    <a href="{{ route('login') }}" class="login">Login</a> <a href="{{ route('register') }}">Sign Up</a>
                    <a href="">Wishlist</a> <a href="">€0.00</a> <a href="" class="cart"><img
                            src="{{ asset('public/front/images/cart.png') }}" alt="cart" /><span>3</span></a>
                </nav>
            </div>
        </div>
    </div>
    <div class="productsCategories">
        <div class="wrapper">
            <div class="productsCategoriesInner">
                <div class="allLeftCategories">
                    <div class="categorySet"> <span><img src="{{ asset('public/front/images/categoryMenu.png') }}"
                                alt="menu" /><b>All Products</b>
                            <label>New</label>
                        </span>
                        <ul>
                            <li><a href="">Jeans</a></li>
                            <li><a href="">Tops</a></li>
                            <li><a href="">Shirts</a></li>
                            <li><a href="">Shoes</a></li>
                            <li><a href="">Caps</a></li>
                            <li><a href="">Eye Glasses</a></li>
                            <li><a href="">Helmets</a></li>
                            <li><a href="">Cycles</a></li>
                            <li><a href="">Tools</a></li>
                            <li><a href="">Machines</a></li>
                            <li><a href="">Toys</a></li>
                            <li><a href="">Wheels</a></li>
                            <li><a href="">Tyres</a></li>
                            <li><a href="">Landscape Items</a></li>
                            <li><a href="">Computers</a></li>
                            <li><a href="">Phones</a></li>
                            <li><a href="">Television</a></li>
                            <li><a href="">Audio</a></li>
                            <li><a href="">Bluetooth Devices</a></li>
                            <li><a href="">Mirrors</a></li>
                            <li><a href="">Wood Items</a></li>
                            <li><a href="">Polishing</a></li>
                            <li><a href="">Books</a></li>
                            <li><a href="">Cards</a></li>
                        </ul>
                    </div>
                    <div class="miniNav"> <a href="">Today's best deal</a> <a href="">Latest viewed</a> <a
                            href="">Shops</a> <a href="">Order list</a> </div>
                </div>
                @if(Route::has('login'))
                @auth
                <div class="profile"><span>Welcome <b>{{ session()->get('email') }}</b></span>
                    <ul>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                        <li><a href="{{ route('verification.notice') }}">Verify Email</a></li>
                    </ul>
                </div>
                @else
                <div class="profile"><span></b></span>
                    <ul>
                        <li><a href="">Login</a></li>
                    </ul>
                </div>
                @endauth
                @endif
            </div>
        </div>
    </div>
</header>
<!-- <script>
document.addEventListener('DOMContentLoaded', (event) => {
    const countryDropdown = document.getElementById('countryDropdown');
    const currentFlag = document.getElementById('currentFlag');

    countryDropdown.addEventListener('change', (event) => {
        const selectedOption = event.target.options[event.target.selectedIndex];
        const flagUrl = selectedOption.getAttribute('data-flag');
        currentFlag.src = flagUrl;
    });
});
</script> -->



<!-- <script>
document.addEventListener('DOMContentLoaded', () => {
    const countryDropdown = document.getElementById('countryDropdown');
    const currentFlag = document.getElementById('currentFlag');
    const languageForm = document.getElementById('languageForm');

    // Function to set the flag image based on the selected option
    function updateFlagImage() {
        const selectedOption = countryDropdown.options[countryDropdown.selectedIndex];
        const flagUrl = selectedOption.getAttribute('data-flag');
        currentFlag.src = flagUrl;
    }

    // Set initial flag image based on the currently selected language
    updateFlagImage();

    countryDropdown.addEventListener('change', () => {
        updateFlagImage();
        // Submit the form to change the language
        languageForm.submit();
    });
});
</script> -->