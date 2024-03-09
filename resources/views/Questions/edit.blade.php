<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit question') }}
        </h2>
    </x-slot>
    <div class="col-md-6 mx-auto py-1">
        <div class="card shadow mt-5" style="background-color:#018ECB;">
            <div class="form-body">
                <form action="{{ route('Questions.update', $QuestionEdit->id) }}" method="post" class="requires-validation" novalidate>
                    @csrf
                    <div class="container">
                        <div class="row">
                            {{-- Pregunta a agregar --}}
                            <div class="col-md-12 mx-auto mt-2">
                                <label for="pregunta">Pregunta nueva</label>
                                <input class="form-control form-control-sm" type="text" name="pregunta"
                                    value="{{ $QuestionEdit->pregunta }}" placeholder="Ingrese la pregunta"
                                    id="pregunta" required>
                                @error('pregunta')
                                    <div class="text-danger">el campo es requerido</div>
                                @enderror
                                <div class="valid-feedback mv-up">You selected a pregunta de nacimiento!</div>
                                <div class="invalid-feedback mv-up">Please select a pregunta de nacimiento!</div>
                            </div>
                            {{-- cuatro respuestas --}}
                            <div class="col-md-6 mx-auto mt-2">
                                <label for="respuestaUno">Respuesta uno</label>
                                <input class="form-control form-control-sm" type="text" name="respuestaUno"
                                    value="{{ $QuestionEdit->respuestaUno }}" placeholder="Ingrese la respuesta"
                                    id="respuestaUno" required>
                                @error('respuestaUno')
                                    <div class="text-danger">el campo es requerido</div>
                                @enderror
                                <div class="valid-feedback mv-up">You selected a respuestaUno de nacimiento!</div>
                                <div class="invalid-feedback mv-up">Please select a respuestaUno de nacimiento!</div>
                            </div>
                            <div class="col-md-6 mx-auto mt-2">
                                <label for="repuestaDos">Respuesta dos</label>
                                <input class="form-control form-control-sm" type="text" name="repuestaDos"
                                    value="{{ $QuestionEdit->respuestaDos }}" placeholder="Ingrese la respuesta" id="repuestaDos"
                                    required>
                                @error('repuestaDos')
                                    <div class="text-danger">el campo es requerido</div>
                                @enderror
                                <div class="valid-feedback mv-up">You selected a repuestaDos de nacimiento!</div>
                                <div class="invalid-feedback mv-up">Please select a repuestaDos de nacimiento!</div>
                            </div>
                            <div class="col-md-6 mx-auto mt-2">
                                <label for="respuestaTres">Respuesta tres</label>
                                <input class="form-control form-control-sm" type="text" name="respuestaTres"
                                    value="{{ $QuestionEdit->respuestaTres }}" placeholder="Ingrese la respuesta"
                                    id="respuestaTres" required>
                                @error('respuestaTres')
                                    <div class="text-danger">el campo es requerido</div>
                                @enderror
                                <div class="valid-feedback mv-up">You selected a respuestaTres de nacimiento!</div>
                                <div class="invalid-feedback mv-up">Please select a respuestaTres de nacimiento!</div>
                            </div>
                            <div class="col-md-6 mx-auto mt-2">
                                <label for="respuestaCuatro">Respuesta cuatro</label>
                                <input class="form-control form-control-sm" type="text" name="respuestaCuatro"
                                    value="{{ $QuestionEdit->respuestaCuatro }}" placeholder="Ingrese la respuesta"
                                    id="respuestaCuatro" required>
                                @error('respuestaCuatro')
                                    <div class="text-danger">el campo es requerido</div>
                                @enderror
                                <div class="valid-feedback mv-up">You selected a respuestaCuatro de nacimiento!</div>
                                <div class="invalid-feedback mv-up">Please select a respuestaCuatro de nacimiento!</div>
                            </div>
                            <div class="col-md-6 mx-auto mt-2 text-center">
                            @php
                              $radioUno = $QuestionEdit->respuestaCorrecta == '1'? 'checked' : '';
                              $radioDos = $QuestionEdit->respuestaCorrecta == '2'? 'checked' : '';
                              $radioTres = $QuestionEdit->respuestaCorrecta == '3'? 'checked' : '';
                              $radioCuatro = $QuestionEdit->respuestaCorrecta == '4'? 'checked' : '';
                            @endphp
                                <label for="respuestaCuatro">Respuesta uno correcta:</label><br>
                                1 <input type="radio" class="btn btn-sm btn-info" name="respuestaCorrecta" id="respuestaCorrecta" value="1" {{$radioUno}}>
                                2 <input type="radio" class="btn btn-sm btn-info" name="respuestaCorrecta" id="respuestaCorrecta" value="2" {{$radioDos}}>
                                3 <input type="radio" class="btn btn-sm btn-info" name="respuestaCorrecta" id="respuestaCorrecta" value="3" {{$radioTres}}>
                                4 <input type="radio" class="btn btn-sm btn-info" name="respuestaCorrecta" id="respuestaCorrecta" value="4" {{$radioCuatro}}>
                                @error('respuestaCorrecta')
                                    <div class="text-danger">el campo es requerido</div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-4 mx-auto text-center p-2">
                          <button id="submit" type="submit" class="sombra btn btn-secondary">{{ __('Edit Question') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
