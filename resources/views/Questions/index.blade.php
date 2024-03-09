<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        <div class="row py-2">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                          <div class="row">
                            <div class="col-md-6">
                              {{__('Questions in database')}}
                            </div>
                            <div class="col-md-6 text-right">
                              <a class="btn btn-success row" href="{{route('Questions.create')}}">Nueva pregunta</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">pregunta</th>
                                        {{-- <th scope="col">respuestaUno</th> --}}
                                        {{-- <th scope="col">repuestaDos</th> --}}
                                        {{-- <th scope="col">respuestaTres</th> --}}
                                        {{-- <th scope="col">respuestaCuatro</th> --}}
                                        <th scope="col">respuestaCorrecta</th>
                                        <th scope="col">updated_at</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($Questions as $Question )
                                    <tr>
                                        <th scope="row">{{$Question->id}}</th>
                                        <td>{{$Question->pregunta}}</td>
                                        {{-- <td>{{$Question->respuestaUno}}</td> --}}
                                        {{-- <td>{{$Question->repuestaDos}}</td> --}}
                                        {{-- <td>{{$Question->respuestaTres}}</td> --}}
                                        {{-- <td>{{$Question->respuestaCuatro}}</td> --}}
                                        <td>{{$Question->respuestaCorrecta}}</td>
                                        <td>{{ \Carbon\Carbon::parse(strtotime($Question->updated_at))->formatLocalized('%d-%m-%Y') }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning row mx-auto" href="{{route('Questions.edit',$Question->id)}}">
                                                {{__('edit')}}
                                            </a>
                                            <a class="btn btn-sm btn-danger row mx-auto" href="{{route('Questions.destroy',$Question->id)}}">
                                                {{__('delete')}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
