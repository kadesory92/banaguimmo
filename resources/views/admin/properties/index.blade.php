@extends('admin.admin')

@section('title', 'Liste des proprietés')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-2">
    <h3>@yield('title')</h3>
    <a href="{{route('admin.property.create')}}" class="btn btn-primary btn-sm">Ajouter un bien</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{$property->title}}</td>
                    <td>{{$property->surface}} m2</td>
                    <td>{{number_format($property->price, thousands_separator: ' ')}}</td>
                    <td>{{$property->city}}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-center">
                            <a href="{{route('admin.property.edit', $property)}}" class="btn btn-primary btn-sm">Editer</a>
                            <form action="{{route('admin.property.destroy', $property)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$properties->links()}}
    </div>
@endsection