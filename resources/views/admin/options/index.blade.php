@extends('admin.admin')

@section('title', 'Liste des options')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-2">
    <h3>@yield('title')</h3>
    <a href="{{route('admin.option.create')}}" class="btn btn-primary">Ajouter une option</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($options as $option)
                <tr>
                    <td>{{$option->name}}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-center">
                            <a href="{{route('admin.option.edit', $option)}}" class="btn btn-primary btn-sm">Editer</a>
                            <form action="{{route('admin.option.destroy', $option)}}" method="POST">
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
        {{$options->links()}}
    </div>
@endsection