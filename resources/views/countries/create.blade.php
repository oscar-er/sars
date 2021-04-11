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
                        <input type="text" name="country" class="form-control" id="countryExample" placeholder="ejemplo: United State of America" />
                    </div>
                    <div class="mb-3">
                        <label for="slugExample" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slugExample" placeholder="ejemplo: united-state" />
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label" for="iso2Example">ISO2</label>
                        <input type="text" name="iso2" class="form-control" id="iso2Example" placeholder="ejemplo: US" onKeypress="keyPress()" maxlength="2" />
                    </div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$error}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</main>

@include('countries.layouts.footer')
