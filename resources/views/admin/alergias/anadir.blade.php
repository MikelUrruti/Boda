@extends('layouts.form')


@section("assetsFormulario")
    @vite(['resources/css/anadirAlergia.css','resources/js/anadirAlergia.js'])
@endsection

@section('action',route("alergias.store"))
@section('method','POST')

@section('tituloPagina',__("anadirAlergia.titulo"))
@section('tituloFormulario',__("anadirAlergia.tituloFormulario"))


@section('contenidoFormulario')

    @csrf

    @if (session('mensaje'))
        
    <div class="row justify-content-center mt-4 g-0">
        <h3 class="col-12 col-md-11 col-lg-10 text-success text-center fw-bold">
            {{ __("anadirAlergia.exito") }}
        </h3>
    </div>

    @endif

    <div class="mx-5 mt-4">
        <div class="row g-0">
            <div class="col col-sm-9 col-md-8 col-lg-7 my-2">
                <label for="">{{ __("anadirAlergia.nombre") }}</label>
                <input type="text" name="nombre" id="" class="d-block my-2 w-100 px-3 cajaTexto">
            </div>
        </div>
        
    </div>
    {{-- {{ $errors }} --}}



    <div class="row justify-content-center pb-4 g-0 mt-4">
            <div class="col-11 col-sm-9 col-md-8 col-lg-7 g-0 text-center">
                <input id="botonAcceder" type="submit" value="{{ __("anadirAlergia.registrar") }}" class="btn w-100 botonBlanco">
            </div>
    </div>
    <div class="row justify-content-center pb-4 g-0">
        <div class="col-11 col-sm-9 col-md-8 col-lg-7 g-0 text-center">
            {{-- <input id="" type="submit" value="{{ __("anadirAlergia.volver") }}" class="btn w-100 botonRojo"> --}}
            <a href="{{ route("alergias.index") }}" class="btn w-100 botonRojo" >{{ __("anadirAlergia.volver") }}</a>
        </div>
    </div>

    @if (count($errors) > 0)
        
    <div class="row justify-content-center pb-4 g-0">

        <div class="col-11 col-md-10 col-lg-9 text-danger text-center fw-bold text-decoration-underline fs-5">

            {{ $errors->first() }}

        </div>

    </div>

@endif



@endsection