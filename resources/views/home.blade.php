@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="content-top">
            <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
            <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
        </div>
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
                </div>
                <div class="content-head__search-block">
                    <div class="search-container">
                        <form class="search-container__form" action="{{route('game.search')}}" method="POST">
                            @csrf
                            <input type="text" class="search-container__form__input" name="search">
                            <button class="search-container__form__btn">search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="products-columns">
                    @foreach($games as $game)
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product">
                                <a href="#" class="products-columns__item__title-product__link">{{$game->name}}</a>
                            </div>
                            <div class="products-columns__item__thumbnail">
                                <a href="#" class="products-columns__item__thumbnail__link">
                                    <img src="/images/{{$game->photo}}" alt="Preview-image" class="products-columns__item__thumbnail__img">
                                </a>
                            </div>
                            <div class="products-columns__item__description">
                                <span class="products-price">{{$game->price}} руб</span>
                                <a href="{{route('game.show', ['product' => $game])}}" class="btn btn-blue">Купить</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($admin_id == $current_id)
                    <div class="card">
                        <div class="card-header">{{ __('Создание товара') }}</div>

                        <div class="card-body">
                            <form enctype="multipart/form-data" method="POST" action="{{ route('create') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Название товара') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Введите название товара" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Цена товара') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="price" placeholder="Введите цену товара" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Описание товара') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="name" class="form-control" name="desc" placeholder="Введите описание товара" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Добавить фото') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="file" class="form-control" name="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Категория</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category_id">
                                        <option selected>Выберите категорию...</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Создать товар') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-header">{{ __('Создание категории') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('createCat') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Название категории') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Введите название категории" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Описание категории') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="name" class="form-control" name="desc" placeholder="Введите описание категории" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Создать категорию') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">{{ __('Создание новости') }}</div>

                            <div class="card-body">
                                <form enctype="multipart/form-data" method="POST" action="{{ route('createNew') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Название новости') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Введите название новости" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Описание новости') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="name" class="form-control" name="desc" placeholder="Введите описание новости" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Добавить фото') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="file" class="form-control" name="file">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Создать категорию') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="content-footer__container">
                <ul class="page-nav">
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection