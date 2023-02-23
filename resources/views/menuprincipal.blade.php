@extends('layouts.template')

@section('assets')
    @vite(['resources/css/menuprincipal.css','resources/js/menuprincipal.js'])
@endsection

@section('title','Menu principal')

@section("bodyClass",'h-100')

@section('content')

    <div id="imagenFondo" class="h-100 w-100 position-absolute">
        
    </div>
    <div class="position-relative container-fluid g-0 h-100" id="containerTexto">
        <div class="row align-items-center justify-content-center mx-auto h-100" id="rowTexto">
            <div class="col-10 text-center g-0" id="texto"></div>
        </div>
    </div>
    <div class="position-relative h-100" id="containerOpciones">
        <div class="container-fluid d-flex flex-column align-items-center justify-content-center g-0 h-100">
            <div class="row align-items-center justify-content-center my-5 w-100">
                <div class="col-10 col-md-8 col-lg-5 col-xl-4">
                    <a href="/informacion" class="btn w-100 text-center botonAzulTurquesa"><i class="fa fa-circle-info text-dark"></i> {{ __("menuprincipal.informacionRelevante") }}</a>
                </div>
            </div>
            <div class="row align-items-center justify-content-center my-5 w-100">
                <div class="col-10 col-md-8 col-lg-5 col-xl-4">
                    {{-- <div class="col-6 col-md-4"> --}}

                        {{-- {{ session("user") }} --}}

                    @if (isset($user) && $user->tipo == "Admin")
                    
                        <a href="/admin" class="btn w-100 text-center botonAzulOscuro">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="">
                                {{ __("menuprincipal.panelAdministracion") }}
                            </span>
                            
                        </a>

                    @else

                        <a href="/confirmar" class="btn w-100 text-center botonVerdeClaro">
                            <i class="fa fa-check iconoCheck" aria-hidden="true"></i>
                            <span class="">
                                {{ __("menuprincipal.confirmarInvitacion") }}
                            </span>
                            
                        </a>

                    @endif


                </div>
                
            </div>
            <div class="row align-items-center justify-content-center my-5 w-100">
                <div class="col-8 col-md-6 col-lg-4 col-xl-3">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn w-100 text-center botonRojo">
                            <i class="fa fa-sign-out"></i> 
                            <span>{{ __("auth.logout") }}</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@if (str_replace(url('/'), '', url()->previous()) === "/login")

    <script>

        window.translations = {!! Cache::get('translations') !!};
        window.afterLogin = true;

    </script>

@else

    <script>

        window.translations = {!! Cache::get('translations') !!};
        window.afterLogin = false;

    </script>

@endif
