<header xmlns="http://www.w3.org/1999/html">
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center"><strong>Главная</strong></a>
            <a href="{{ route('news.index') }}" class="navbar-brand d-flex align-items-center"><strong>Все
                    новости</strong></a>
            <a href="{{ route('categories.index') }}"
               class="navbar-brand d-flex align-items-center"><strong>Категории</strong></a>
            <a href="{{ route('categories.showAll') }}" class="navbar-brand d-flex align-items-center"><strong>Все
                    новости по категориям</strong></a>
            <a href="{{ route('inputforms.feedback.index') }}" class="navbar-brand d-flex align-items-center"><strong>Обратная связь</strong></a>
            <a href="{{ route('inputforms.orderfordata.index') }}" class="navbar-brand d-flex align-items-center"><strong>Заказ выгрузки данных</strong></a>
        </div>
    </div>
</header>
