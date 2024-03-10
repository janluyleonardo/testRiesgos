<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions list') }}
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
                                    <a class="btn btn-success row" href="{{route('Questions.create')}}">{{__('New question')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (count($Questions) >= 1)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">pregunta</th>
                                            <th scope="col">respuestaCorrecta</th>
                                            <th scope="col">updated_at</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($Questions as $Question )
                                        <tr>
                                            <th scope="row">{{$i }}</th>
                                            <td>{{$Question->pregunta}}</td>
                                            <td>{{$Question->respuestaCorrecta}}</td>
                                            <td>{{ \Carbon\Carbon::parse(strtotime($Question->updated_at))->formatLocalized('%d-%m-%Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a title="Show" href="{{ route('Questions.show', $Question) }}" class="sombra mx-auto btn btn-info">{{__('See')}}</a>
                                                    <a title="Editar" href="{{ route('Questions.edit', $Question->id) }}" class="sombra mx-auto btn btn-warning" >{{__('EDit')}}</a>
                                                    <form action="{{ route('Questions.destroy', $Question) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class=" sombra mx-auto btn btn-danger" onclick="mostrar()">
                                                            {{__('Delete')}}
                                                        </button>
                                                    </form>
                                                    {{-- <a title="Eliminar" href="{{ route('Questions.destroy', $Question->id) }}" class="sombra btn btn-danger" >{{__('Delete')}}</a> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i += +1; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                No hay registros para mostar, por favor da clic en el el botón Nueva pregunta y agrega una pregunta al sistema.
                            @endif
                        </div>
                        <div class="card-footer">
                            {{$Questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
