<header>
    <style>
    .custom-dropdown {
        position: relative;
        width: 200px;
        /* Adjust as needed */
    }

    .custom-dropdown-selected {
        display: flex;
        align-items: center;
        cursor: pointer;
        border: 1px solid #ccc;
        padding: 5px;
    }

    .selected-flag {
        width: 20px;
        /* Adjust size as needed */
        height: auto;
        margin-right: 8px;
    }

    .custom-dropdown-options {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        border: 1px solid #ccc;
        background-color: white;
        z-index: 1;
    }

    .custom-dropdown-option {
        padding: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .custom-dropdown-option:hover {
        background-color: #f0f0f0;
    }

    .custom-dropdown-option .option-flag {
        width: 20px;
        /* Adjust size as needed */
        height: auto;
        margin-right: 8px;
    }
    </style>
    <div class="topBar">
        <div class="wrapper">
            <div class="topBarInner">
                <div class="currencyChange">{{ GoogleTranslate::trans('Currency:', app()->getLocale()) }}
                    <label>
                        <input type="checkbox" />
                        <span>{{ GoogleTranslate::trans('EURO', app()->getLocale()) }}</span>
                    </label>
                    <label>
                        <input type="checkbox" />
                        <span>{{ GoogleTranslate::trans('DKK', app()->getLocale()) }}</span>
                    </label>
                </div>
                <p>{{ GoogleTranslate::trans('Average discount (Not required for now)', app()->getLocale()) }}</p>
                <section> {{ GoogleTranslate::trans('Country:', app()->getLocale()) }}
                    <div class="currencyList">
                        <div class="custom-dropdown">
                            <div class="custom-dropdown-selected">
                                <img src="{{ asset('public/front/images/flag.png') }}" alt="Country Flag"
                                    class="selected-flag">
                                <span class="selected-text">{{ session()->get('selected_country', 'United States') }}</span>
                            </div>
                            <div class="custom-dropdown-options">
                            @if(isset($countries) && $countries->isNotEmpty())
                                @foreach($countries as $country)
                                <div class="custom-dropdown-option" data-value="{{ $country->code }}"
                                    data-flag="{{ asset('public/front/images/' . $country->flag) }}">
                                    <img src="{{ asset('public/front/images/' . $country->flag) }}" alt="{{ $country->lang }}" class="option-flag">
                                    {{ $country->lang }}
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
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
            <div class="logoNavInner">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('public/front/images/logo.png') }}" alt="logo" />
                </a>
                <nav>
                    <a href="{{ route('login') }}" class="login">{{ GoogleTranslate::trans('Login', app()->getLocale()) }}</a>
                    <a href="{{ route('register') }}">{{ GoogleTranslate::trans('Sign Up', app()->getLocale()) }}</a>
                    <a href="">{{ GoogleTranslate::trans('Wishlist', app()->getLocale()) }}</a>
                    <a href="">{{ GoogleTranslate::trans('€0.00', app()->getLocale()) }}</a>
                    <a href="" class="cart">
                        <img src="{{ asset('public/front/images/cart.png') }}" alt="cart" /><span>3</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
    <div class="productsCategories">
        <div class="wrapper">
            <div class="productsCategoriesInner">
                <div class="allLeftCategories">
                    <div class="categorySet">
                        <span>
                            <img src="{{ asset('public/front/images/categoryMenu.png') }}" alt="menu" />
                            <b>{{ GoogleTranslate::trans('All Products', app()->getLocale()) }}</b>
                            <label>{{ GoogleTranslate::trans('New', app()->getLocale()) }}</label>
                        </span>
                        <ul>
                            <!-- List items -->
                            @foreach(['Jeans', 'Tops', 'Shirts', 'Shoes', 'Caps', 'Eye Glasses', 'Helmets', 'Cycles', 'Tools', 'Machines', 'Toys', 'Wheels', 'Tyres', 'Landscape Items', 'Computers', 'Phones', 'Television', 'Audio', 'Bluetooth Devices', 'Mirrors', 'Wood Items', 'Polishing', 'Books', 'Cards'] as $item)
                            <li><a href="">{{ $item }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="miniNav">
                        <a href="">Today's best deal</a>
                        <a href="">Latest viewed</a>
                        <a href="">Shops</a>
                        <a href="">Order list</a>
                    </div>
                </div>
                @if(Route::has('login'))
                @auth
                <div class="profile">
                    <span>Welcome <b>{{ session()->get('email') }}</b></span>
                    <ul>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                        <li><a href="{{ route('verification.notice') }}">Verify Email</a></li>
                    </ul>
                </div>
                @else
                <div class="profile">
                    <span></span>
                    <ul>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
                @endauth
                @endif
            </div>
        </div>
    </div>
</header>

<!-- Google Translate Widget -->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en', // Default language
            includedLanguages: 'en,es,fr,de,it', // Languages you want to include
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropdown = document.querySelector('.custom-dropdown');
        const selected = dropdown.querySelector('.custom-dropdown-selected');
        const options = dropdown.querySelector('.custom-dropdown-options');

        selected.addEventListener('click', () => {
            options.style.display = options.style.display === 'block' ? 'none' : 'block';
        });

        options.querySelectorAll('.custom-dropdown-option').forEach(option => {
            option.addEventListener('click', () => {
                const lang = option.getAttribute('data-value');
                const flagUrl = option.getAttribute('data-flag');
                const text = option.textContent;

                selected.querySelector('.selected-flag').src = flagUrl;
                selected.querySelector('.selected-text').textContent = text;
                options.style.display = 'none';

                // Redirect to change language
                window.location.href = "{{ route('changeLang') }}?lang=" + lang;
            });
        });

        document.addEventListener('click', (event) => {
            if (!dropdown.contains(event.target)) {
                options.style.display = 'none';
            }
        });
    });
</script>
