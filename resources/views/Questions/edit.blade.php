<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit question') }}
    </h2>
  </x-slot>
  <div class="col-md-6 mx-auto py-1">
    <div class="card shadow mt-5" style="background-color:#018ECB;">
      <div class="form-body">
        <form action="{{ route('Questions.update', $question->id) }}" method="post" class="requires-validation"
          novalidate>
          @method('put')
          @csrf
          <div class="container">
            <div class="row">
              {{-- Pregunta a editar --}}
              <div class="col-md-12 mx-auto mt-2">
                <label for="question">{{ __('Edit question') }}</label>
                <input class="form-control form-control-sm" type="text" name="question"
                  value="{{ $question->question }}" id="question" required>
                @error('question')
                  <div class="text-danger">el campo es requerido</div>
                @enderror
                <div class="valid-feedback mv-up">You selected a pregunta de nacimiento!</div>
                <div class="invalid-feedback mv-up">Please select a pregunta de nacimiento!</div>
              </div>
              {{-- cuatro respuestas --}}
              <div class="col-md-6 mx-auto mt-2">
                <label for="answer">{{ __('Answer') }}</label>
                <input class="form-control form-control-sm" type="text" name="answer"
                  value="{{ $question->answer }}" id="answer" required>
                @error('answer')
                  <div class="text-danger">el campo es requerido</div>
                @enderror
                <div class="valid-feedback mv-up">You selected a respuestaUno de nacimiento!</div>
                <div class="invalid-feedback mv-up">Please select a respuestaUno de nacimiento!</div>
              </div>
              <div class="col-md-6 mx-auto mt-2">
                <label for="option_one">{{ __('Option one') }}</label>
                <input class="form-control form-control-sm" type="text" name="option_one"
                  value="{{ $question->option_one }}" id="option_one" required>
                @error('option_one')
                  <div class="text-danger">el campo es requerido</div>
                @enderror
                <div class="valid-feedback mv-up">You selected a respuestaDos de nacimiento!</div>
                <div class="invalid-feedback mv-up">Please select a respuestaDos de nacimiento!</div>
              </div>
              <div class="col-md-6 mx-auto mt-2">
                <label for="option_two">{{ __('Option two') }}</label>
                <input class="form-control form-control-sm" type="text" name="option_two"
                  value="{{ $question->option_two }}" id="option_two" required>
                @error('option_two')
                  <div class="text-danger">el campo es requerido</div>
                @enderror
                <div class="valid-feedback mv-up">You selected a respuestaTres de nacimiento!</div>
                <div class="invalid-feedback mv-up">Please select a respuestaTres de nacimiento!</div>
              </div>
              <div class="col-md-6 mx-auto mt-2">
                <label for="option_three">{{ __('Option three') }}</label>
                <input class="form-control form-control-sm" type="text" name="option_three"
                  value="{{ $question->option_three }}" id="option_three" required>
                @error('option_three')
                  <div class="text-danger">el campo es requerido</div>
                @enderror
                <div class="valid-feedback mv-up">You selected a respuestaCuatro de nacimiento!</div>
                <div class="invalid-feedback mv-up">Please select a respuestaCuatro de nacimiento!</div>
              </div>
            </div>
            <div class="col-md-4 mx-auto text-center p-2">
              <button id="submit" type="submit" class="sombra btn btn-secondary">{{ __('Edit question') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
