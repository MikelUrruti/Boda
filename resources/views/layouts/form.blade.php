@extends('layouts.template')

@section('assets')
    @vite(['resources/css/formulario.css','resources/js/formulario.js'])
    @yield("assetsFormulario")
@endsection

@section('title')
@yield('tituloPagina')
@endsection

@section('content')

<main class="h-100 mt-5">

    <section class="container-fluid mt-5 g-0">

        <div class="row justify-content-center g-0">
            <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5 g-0">
                <form action="@yield('action')" method="@yield('method')" class="formulario" id="@yield('id')">
    
                    <div id="tituloFormulario" class="text-center">
                        @yield('tituloFormulario')
                    </div>
            
                    @yield('contenidoFormulario')
                
                </form>
                
            </div>
        </div>

    </section>



</main>



@endsection

