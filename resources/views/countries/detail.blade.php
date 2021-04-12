@include('countries.layouts.navbar')

<main class="main-container">
    <div class="container">
        <div class="d-flex justify-content-end mt-3">
            <a href="{{route('countries.home')}}" class="btn btn-outline-info"><i class="fas fa-undo"></i> Regresar</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Actualizar registro</h4>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label for="countryExample" class="form-label">Nombre del país</label>
                        <input type="text" readonly class="form-control" id="countryExample"
                               value="{{$responseDB->country}}"/>
                    </div>
                    <div class="mb-3">
                        <label for="slugExample" class="form-label">Slug</label>
                        <input type="text" readonly class="form-control" id="slugExample"
                               value="{{$responseDB->slug}}"/>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label" for="iso2Example">ISO2</label>
                        <input type="text" readonly class="form-control" id="iso2Example"
                               value="{{$responseDB->iso2}}" onKeypress="keyPress()" maxlength="2"/>
                    </div>
                    <div class="mb-3">
                        <label for="slugExample" class="form-label">Casos SARS CoV 2 actual</label>
                        <input type="text" readonly class="form-control" id="slugExample"
                               value="{{number_format($cases['Cases'])}}"/>
                        <small id="casesHelp" class="form-text text-muted">IMPORTANTE: los casos confirmados son actualizados todos los días a partir de las <b>00:00 hrs</b>
                            . Significa que los casos del día actual serán reflejados hasta las <b>00:00 hrs</b>
                            . del día de mañana.</small>
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
                </form>
            </div>
        </div>
    </div>
</main>

@include('countries.layouts.footer')
