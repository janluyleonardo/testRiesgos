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
                    <b>{{ Str::title('Registro de pregunta') }}</b>
                  </div>
                  <div class="col-md-4 text-right">
                    <a title="Regresar" href="{{ route('Questions.index', $question) }}"
                      class="sombra btn btn-danger mx-auto">{{ __('back to') }}</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6"><b>Pregunta:</b></div>
                  <div class="col-md-6">{{ $question->question }}</div>
                  <div class="col-md-6"><b>Respuesta:</b></div>
                  <div class="col-md-6">{{ $question->answer }}</div>
                  <div class="col-md-6"><b>Opción uno:</b></div>
                  <div class="col-md-6">{{ $question->option_one }}</div>
                  <div class="col-md-6"><b>Opción dos:</b></div>
                  <div class="col-md-6">{{ $question->option_two }}</div>
                  <div class="col-md-6"><b>Opción tres:</b></div>
                  <div class="col-md-6">{{ $question->option_three }}</div>
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
