<nav class="container-fluid bg-primary g-0">
    <div class="row align-items-center g-0">
        
            @if (Route::currentRouteName() == "admin.index")
                <div class="col-1 text-center bg-info g-0">
                    <a href="{{ route("admin.index") }}" class="text-dark text-decoration-none p-2 d-block">{{ __("administracion.menu.usuarios") }}</a>
                </div>
            @else
                <div class="col-1 text-center">
                    <a href="{{ route("admin.index") }}" class="text-light text-decoration-none p-2 d-block">{{ __("administracion.menu.usuarios") }}</a>
                </div>
            @endif

            @if (Route::currentRouteName() == "alergias.index")
                <div class="col-1 text-center bg-info">
                    <a href="{{ route("alergias.index") }}" class="text-dark text-decoration-none p-2 d-block">{{ __("administracion.menu.alergias") }}</a>
                </div>
            @else
                <div class="col-1 text-center">
                    <a href="{{ route("alergias.index") }}" class="text-light text-decoration-none p-2 d-block">{{ __("administracion.menu.alergias") }}</a>
                </div>
            @endif

            <div class="col-10">
                <div class="row justify-content-end">
                    <div class="col-2 bg-danger text-center">
                        <a href="{{ route("inicio") }}" class="text-light text-decoration-none p-2 d-block">{{ __("administracion.menu.salir") }}</a>
                    </div>
                </div>
            </div>

    </div>
</nav>