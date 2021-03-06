<aside class="col-md-3 card">

    <div class="col-md-12 mx-auto aside-margin">

        <h5 class="text-center">Bienvenido</h5>
        <h5 class="text-center">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
        <h6 class="text-center aside-title-margin">Directivo</h6>

        <div id="list-example" class="list-group">

            <a class="list-group-item list-group-item-action wo-border" href="{{ route('home') }}">
                <i class="fas fa-home icon-margin"></i>Home
            </a>

            <a class="list-group-item list-group-item-action wo-border" href="{{ route('statistics') }}">
                <i class="fas fa-poll icon-margin"></i>Estadisticas
            </a>

            <a class="list-group-item list-group-item-action wo-border" href="{{ route('reports.index') }}">
                <i class="fas fa-file-alt icon-margin"></i>Reportes
            </a>

            <a class="list-group-item list-group-item-action wo-border" href="{{ route('checkers.index') }}">
                <i class="fas fa-user-friends icon-margin"></i>Checadores
            </a>

            <a class="list-group-item list-group-item-action wo-border" href="{{ route('profile.edit', Auth::user()->id) }}">
                <i class="fas fa-user icon-margin"></i>Perfil
            </a>

            <a class="list-group-item list-group-item-action wo-border" href="{{ route('home') }}">
                <i class="fas fa-question-circle icon-margin"></i>Soporte
            </a>

            <a class="list-group-item list-group-item-action wo-border" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off icon-margin"></i>{{ __('Cerrar sesión') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>

    </div>

</aside>


