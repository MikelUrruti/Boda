@extends('layouts.form')


@section("assetsFormulario")
    @vite(['resources/css/login.css'])
@endsection

@section('action','/login')
@section('method','POST')

@section('tituloPagina',__("login.titulo"))
@section('tituloFormulario',__("login.tituloFormulario"))


@section('contenidoFormulario')

    @csrf

    <div class="mx-5 mt-4">
        <div class="row g-0">
            <div class="col col-sm-9 col-md-8 col-lg-7 my-2">
                <label for="">{{ __("login.correo") }}</label>
                <input type="text" name="correo" id="" class="d-block my-2 w-100 px-3 cajaTexto">
            </div>
        </div>
        <div class="row g-0">
            <div class="col col-sm-9 col-md-8 col-lg-7 my-2">
                <label for="">{{ __("login.password") }}</label>
                <input type="password" name="password" class="d-block my-2 w-100 px-3 cajaTexto">
            </div>
        </div>
    </div>
    {{-- {{ $errors }} --}}



    <div class="row justify-content-center pb-4 g-0 mt-4">
            <div class="col-11 col-sm-9 col-md-8 col-lg-7 g-0 text-center">
                <input id="botonAcceder" type="submit" value="{{ __("login.acceder") }}" class="btn w-100 botonBlanco">
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