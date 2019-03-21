<div class="sidebar-item">
    <div class="sidebar-item__title">Последние новости</div>
    <div class="sidebar-item__content">
        <div class="sidebar-news">
            @foreach($lastNews as $lastNew)
            <div class="sidebar-news__item">
                <div class="sidebar-news__item__preview-news"><img src="/imagesNews/{{$lastNew->photo}}" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                <div class="sidebar-news__item__title-news"><a href="{{route('game.showNew', ['new' => $lastNew])}}" class="sidebar-news__item__title-news__link">{{$lastNew->name}}</a></div>
            </div>
            @endforeach
        </div>
    </div>
</div>