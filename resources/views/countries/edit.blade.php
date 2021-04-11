@include('countries.layouts.navbar')

<main class="main-container">
    <div class="container">
        <div class="d-flex justify-content-end mt-3">
            <a href="{{route('countries.home')}}" class="btn btn-outline-info"><i class="fas fa-undo"></i> Regresar</a>
        </div>
        @if(Session::has('updateCountry'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{Session::get('updateCountry')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Actualizar registro</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('countries.update', $dataCountry->id)}}">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label for="countryExample" class="form-label">Nombre del país</label>
                        <input type="text" name="country" class="form-control" id="countryExample" value="{{$dataCountry->country}}" />
                    </div>
                    <div class="mb-3">
                        <label for="slugExample" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slugExample" value="{{$dataCountry->slug}}" />
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label" for="iso2Example">ISO2</label>
                        <input type="text" name="iso2" class="form-control" id="iso2Example" value="{{$dataCountry->iso2}}" onKeypress="keyPress()" maxlength="2" />
                    </div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$error}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</main>

@include('countries.layouts.footer')
