
@extends('layouts.template')

@section('assets')
    @vite(['resources/css/invitacionconfirmada.css','resources/js/invitacionconfirmada.js'])
@endsection

@section('title','Invitacion confirmada')

@section("bodyClass",'h-100')

@section('content')

    <div class="container my-5">
    
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 col-lg-6 cajaContainer">
                <div class="row justify-content-center pt-4 pb-3">
                    <div class="col-12 text-center textoVerde">
                        <i class="fa-sharp fa-solid fa-circle-check fa-5x "></i>
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-12 text-center">
                        {{ __("invitacionconfirmada.textoconfirmado") }}
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-12 text-center">
                        {{ __("invitacionconfirmada.textoayuda") }}
                    </div>
                </div>
                <div class="row justify-content-center mb-3 mt-4">
                    <div class="col-12 text-center">
                        {{-- {{ __("invitacionconfirmada.textoayuda") }} --}}
                        <div class="row justify-content-center">
                            <div class="col-2 g-0">
                                <i class="fa-brands fa-whatsapp fa-2x"></i>
                            </div>
                            <div class="col-9 col-sm-8 col-md-7 text-start g-1 colContacto">
                                688618008
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2 g-0">
                                <i class="fa-regular fa-envelope fa-2x"></i>
                            </div>
                            <div class="col-9 col-sm-8 col-md-7 text-start g-1 colContacto">
                                bodaunaisilvia@gmail.com
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="row justify-content-center pb-4 my-4">
                    <div class="col-8">
                        <a href="{{ route("inicio") }}" class="btn w-100 botonBlanco" >{{ __("invitacionconfirmada.entendido") }}</a>
                    </div>
                </div>
            </div>
        </div>
        


    </div>

@endsection