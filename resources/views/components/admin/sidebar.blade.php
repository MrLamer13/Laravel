<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page"
                   href="{{ route('admin.index') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Управление
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif"
                   href="{{ route('admin.categories.index') }}">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif"
                   href="{{ route('admin.news.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.feedback.*')) active @endif"
                   href="{{ route('admin.feedback.index') }}">
                    <span data-feather="message-square" class="align-text-bottom"></span>
                    Комментарии обратной связи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.orderfordata.*')) active @endif"
                   href="{{ route('admin.orderfordata.index') }}">
                    <span data-feather="package" class="align-text-bottom"></span>
                    Заказы на получение выгрузки данных
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.profile.*')) active @endif"
                   href="{{ route('admin.profile.edit') }}">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Изменение данных профиля
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif"
                   href="{{ route('admin.users.index') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Пользователи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.resources.*')) active @endif"
                   href="{{ route('admin.resources.index') }}">
                    <span data-feather="rss" class="align-text-bottom"></span>
                    Ресурсы
                </a>
            </li>
        </ul>
    </div>
</nav>
