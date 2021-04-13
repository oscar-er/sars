@include('countries.layouts.navbar')

<main class="main-container">
    <div class="container">
        <div class="d-flex justify-content-end mt-3">
            <a href="{{route('countries.home')}}" class="btn btn-outline-info"><i class="fas fa-undo"></i> Regresar</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Nuevo registro</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('countries.create.new')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="countryExample" class="form-label">Nombre del país</label>
                        <input type="text" name="country" class="form-control" id="countryExample"
                               placeholder="ejemplo: United State of America"/>
                    </div>
                    <div class="mb-3">
                        <label for="slugExample" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slugExample"
                               placeholder="ejemplo: united-state"/>
                        <small id="casesHelp" class="form-text text-muted fw-bolder">
                            Si no conoces los datos de Slug e ISO2 del país que quieres registrar puedes
                        </small>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalCountries"><b>consultarlos aquí</b></a>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label" for="iso2Example">ISO2</label>
                        <input type="text" name="iso2" class="form-control" id="iso2Example" placeholder="ejemplo: US"
                               onKeypress="keyPress()" maxlength="2"/>
                    </div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$error}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modalCountries" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Datos de países</h5>
            </div>
            <div class="modal-body">
                <div class="content-table">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>País</th>
                            <th>Slug</th>
                            <th>ISO2</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($response as $item)
                            <tr>
                                <th>{{$item['Country']}}</th>
                                <th>{{$item['Slug']}}</th>
                                <th>{{$item['ISO2']}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@include('countries.layouts.footer')
