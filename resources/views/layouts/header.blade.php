<header class="main-header">
    <div class="logotype-container"><a href="{{route('home')}}" class="logotype-link"><img src="/img/logo.png" alt="Логотип"></a></div>
    <nav class="main-navigation">
        <ul class="nav-list">
            <li class="nav-list__item"><a href="{{route('home')}}" class="nav-list__item__link">Главная</a></li>
            <li class="nav-list__item"><a href="{{route('home')}}" class="nav-list__item__link">Мои заказы</a></li>
            <li class="nav-list__item"><a href="{{route('home')}}" class="nav-list__item__link">Новости</a></li>
            <li class="nav-list__item"><a href="{{route('home')}}" class="nav-list__item__link">О компании</a></li>
        </ul>
    </nav>
    <div class="header-contact">
        <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
    </div>
    <div class="header-container">
        <div class="payment-container">
            <div class="payment-basket__status">
                <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
                <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">0</span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
            </div>
        </div>
        <div class="authorization-block">
            @guest
            <a class="authorization-block__link" href="{{ route('login') }}">Войти</a>
            @if (Route::has('register'))
                <a class="authorization-block__link" href="{{ route('register') }}">Регистрация</a>
            @endif
            @else
                <a class="authorization-block__link">{{ Auth::user()->name }} <span class="caret"></span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="authorization-block__link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">Выйти</a>
                @endguest
        </div>
    </div>
</header>