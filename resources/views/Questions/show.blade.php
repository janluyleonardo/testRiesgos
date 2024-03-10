<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question show') }}
        </h2>
    </x-slot>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-auto" style="width:650px;">
                <div class="container">
                    <div class="row py-0 m-auto">
                        <div class="card py-1 px-1 ">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8 mx-auto my-auto text-center">
                                        <b>{{ Str::upper('Registro creado con estos datos') }}</b>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <a title="Regresar" href="{{ route('Questions.index', $question) }}" class="sombra btn btn-danger mx-auto">{{__('back to')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6"><b>Pregunta:</b></div>
                                    <div class="col-md-6">{{ $question->pregunta }}</div>
                                    <div class="col-md-6"><b>Fecha matricula:</b></div>
                                    <div class="col-md-6">{{ $question->respuestaUno }}</div>
                                    <div class="col-md-6"><b>Edad:</b></div>
                                    <div class="col-md-6">{{ $question->respuestaDos }}</div>
                                    <div class="col-md-6"><b>Genero:</b></div>
                                    <div class="col-md-6">{{ $question->respuestaTres }}</div>
                                    <div class="col-md-6"><b>EPS:</b></div>
                                    <div class="col-md-6">{{ $question->respuestaCuatro }}</div>
                                    <div class="col-md-6"><b>Fecha de nacimiento:</b></div>
                                    <div class="col-md-6">{{ $question->respuestaCorrecta }}</div>
                                </div>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
