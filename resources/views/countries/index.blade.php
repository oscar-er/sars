@include('countries.layouts.navbar')

<main class="main-container">
    <div class="container">
        <div class="d-flex justify-content-between mt-3">
            <div class="">
                <a href="{{route('countries.create')}}" class="btn btn-outline-success">Nuevo registro</a>
            </div>
            <div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Bucar registros"/>
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
        @if(Session::has('saveAlert') || Session::has('deleteCountry'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('saveAlert')}}
                {{Session::get('deleteCountry')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="content-table">
                <table class="table table-sm table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Country</th>
                    <th>Slug</th>
                    <th>ISO2</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataCountries as $country)
                    <tr>
                        <th>{{$country->id}}</th>
                        <th>{{$country->country}}</th>
                        <th>{{$country->slug}}</th>
                        <th>{{$country->iso2}}</th>

                        <th>
                            <form action="{{route('countries.delete', $country->id)}}" method="post">
                                <a href="{{route('countries.detail', [$country->id, $country->slug])}}" class="btn btn-outline-success"><i class="fas fa-file"></i> Detalle</a>
                                <a href="{{route('countries.edit', $country->id)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i> Editar</a>
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Deseas eliminar el registro?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>




@include('countries.layouts.footer')
