@extends('frontoffice.master')

@section('title', 'Tous nos biens')

@section('content')

    <div class="bg-ligth mt-5 mb-5 text-center">
        <form action="" method="GET" class="container d-flex gap-2">
            <input type="number" name="surface" placeholder="Surface min."  class="form-control" value="{{ $input['surface'] ?? ''}}">
            <input type="number" name="rooms" placeholder="Nombre de pièces min."  class="form-control" value="{{ $input['surface'] ?? ''}}">
            <input type="number" name="price" placeholder="Budget max."  class="form-control" value="{{ $input['price'] ?? ''}}">
            <input name="title" placeholder="Mots clés"  class="form-control" value="{{ $input['title'] ?? ''}}">
            <button class="btn btn-primary btn-sm flex-grow-0">Reechercher</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3 mb-4">
                    @include('frontoffice.properties.single_property')
                </div>
                
            @empty
                <div class="col">
                    Aucun bien correspond à votre recherche!
                </div>

            @endforelse 
        </div>

        <div class="my-4">
            {{$properties->links()}}
        </div>

    </div>
    
@endsection