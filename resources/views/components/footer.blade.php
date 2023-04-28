<footer class="text-muted bg-dark">
    <div class="container text-light">
        <p class="float-right">
            <a href="#">Наверх</a>
        </p>
        @php $footer = fake()->realText(200) @endphp
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

        @if(Auth::user() && Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">Переход в админку</a>
        @endif

    </div>
</footer>
