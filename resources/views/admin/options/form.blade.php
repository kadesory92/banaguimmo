@extends('admin.admin')

@section('title', $option->exists?'Editer l\'option ':'Créer l\'option ')

@section('content')

<div class="card mb-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>@yield('title')</h3>
        <a href="{{route('admin.option.index')}}" class="btn btn-primary">Liste des biens</a>
    </div>
    <div class="card-body">
        <form action="{{route($option->exists ? 'admin.option.update':'admin.option.store', 
        $option)}}" method="POST">
        @csrf
        @method($option->exists ? 'put' : 'post')

            <div class="row">
                @include('admin.inc.input', ['name'=>'name', 'class'=>'col', 'label'=>'Nom', 'value'=>$option->name])
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm">{{$option->exists ? 'Modifier' : 'Ajouter'}}</button>
            </div>
        </form>
    </div>
</div>

@endsection