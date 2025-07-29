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
                  {{ __('Questions in database') }}
                </div>
                <div class="col-md-6 text-right">
                  <a class="btn btn-success row sombra"
                    href="{{ route('Questions.create') }}">{{ __('New question') }}</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              @if (count($Questions) >= 1)
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">{{ __('Questions') }}</th>
                      <th scope="col">{{ __('Answer') }}</th>
                      <th scope="col">{{ __('Last modification') }}</th>
                      <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    @foreach ($Questions as $Question)
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $Question->question }}</td>
                        <td>{{ $Question->answer }}</td>
                        <td>{{ \Carbon\Carbon::parse(strtotime($Question->updated_at))->formatLocalized('%d-%m-%Y') }}
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a title="Show" href="{{ route('Questions.show', $Question) }}"
                              class="sombra mx-auto btn btn-info btn-sm">{{ __('See') }}</a>
                            <a title="Editar" href="{{ route('Questions.edit', $Question->id) }}"
                              class="sombra mx-auto btn btn-warning btn-sm">{{ __('Edit') }}</a>
                            <a title="Delete" href="#deleteModal{{ $Question->id }}"
                              class="sombra mx-auto btn btn-danger  btn-sm"
                              data-bs-toggle="modal">{{ __('Delete') }}</a>
                          </div>
                        </td>
                      </tr>
                      <?php $i += +1; ?>
                      <!-- Modal delete-->
                      <div class="modal fade" id="deleteModal{{ $Question->id }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content sombra bg-white">
                            <div class="modal-header sombra bn-100">
                              <button type="button" class="btn-close sombra" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body sombra">
                              Esta seguro(a) de eliminar el registro de:<br>
                              <strong>{{ Str::title($Question->question) }}</strong>
                            </div>
                            <div class="modal-footer bn-100">
                              <button type="button" class=" sombra btn btn-warning"
                                data-bs-dismiss="modal">Close</button>
                              <form action="{{ route('Questions.destroy', $Question) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"class=" sombra btn btn-danger">
                                  Eliminar registro
                                </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </tbody>
                </table>
              @else
                No hay registros para mostar, por favor da clic en el el botón Nueva pregunta y agrega una pregunta al
                sistema.
              @endif
            </div>
            <div class="card-footer">
              {{ $Questions->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
