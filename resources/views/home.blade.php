@extends('frontoffice.master')

@section('title', 'Acceuil')

@section('content')

    <div class="mt-3 mb-3">
        @include('frontoffice.inc.header')
    </div>

    <div class="container">
        <h4>Derniers biens</h4>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('frontoffice.properties.single_property')
                </div>
            @endforeach
        </div>
    </div>
    
@endsection