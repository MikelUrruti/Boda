@extends('layouts.template')

@section('assets')
    @vite(['resources/css/inicio.css','resources/js/inicio.js'])
    
@endsection

@section('title',__("inicio.titulo"))

@section("bodyClass",'h-100')

@section('content')

    <div id="fondoInicio" class="h-100 w-100 position-absolute">
        
    </div>
    <div class="position-relative container-fluid g-0 h-100">
        <div class="row align-items-center justify-content-center mx-auto h-100">
            <div class="col-10 col-lg-8 col-xl-6 col-xxl-5 text-center g-0">
                <a href="/login" class="btn botonInicio">{{ __("inicio.mensajeBoton") }} &#128521;</a>
            </div>
        </div>
    </div>

    {{-- <div class="h-100 d-flex ">
        <a href="/login" class="btn d-flex align-items-center justify-content-center botonInicio">FORMA PARTE DE LA BODA &#128521;</a>
    </div> --}}
@endsection