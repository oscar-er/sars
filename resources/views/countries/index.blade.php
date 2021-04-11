@include('countries.layouts.navbar')

<main class="main-container">
    <div class="container">
        <div class="d-flex justify-content-between mt-3">
            <div class="">
                <a href="{{route('countries.create')}}" class="btn btn-outline-success">Nuevo registro</a>
            </div>
            <div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Bucar registros" />
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
        @if(Session::has('saveAlert'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('saveAlert')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="content-table">
            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Country</th>
                    <th scope="col">Slug</th>
                    <th scope="col">ISO2</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataCountries as $country)
                    <tr>
                        <th>{{$country->idCountry}}</th>
                        <th>{{$country->country}}</th>
                        <th>{{$country->slug}}</th>
                        <th>{{$country->iso2}}</th>
                        <th>
                            <a href="#" class="btn btn-outline-success"><i class="far fa-file"></i>Detalle</a>
                            <a href="#" class="btn btn-outline-success"><i class="far fa-file"></i>Editar</a>
                            <a href="#" class="btn btn-outline-success"><i class="far fa-file"></i>Eliminar</a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@include('countries.layouts.footer')
