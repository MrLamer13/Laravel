<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Наверх</a>
        </p>
        @php $footer = fake('ru_RU')->realText(200) @endphp
        <p>{{ $footer }} <span style="
   -webkit-transform: scaleX(-1);
      -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
    -khtml-transform: scaleX(-1);
       -ms-transform: scaleX(-1);
           transform: scaleX(-1);
   display: inline-block;
">
	&copy;
</span> {{ date('Y') }}</p>
        <a href="{{ route('admin.index') }}">Переход в админку</a>
    </div>
</footer>
