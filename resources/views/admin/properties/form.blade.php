@extends('admin.admin')

@section('title', $property->exists?'Editer le bien':'Créer le bien')

@section('content')

<div class="card mb-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>@yield('title')</h3>
        <a href="{{route('admin.property.index')}}" class="btn btn-primary">Liste des biens</a>
    </div>
    <div class="card-body">
        <form action="{{route($property->exists ? 'admin.property.update':'admin.property.store', 
        $property)}}" method="POST">
        @csrf
        @method($property->exists ? 'put' : 'post')

            <div class="row">
                @include('admin.inc.input', ['name'=>'title', 'class'=>'col', 'value'=>$property->title])
                @include('admin.inc.input', ['name'=>'surface', 'class'=>'col', 'value'=>$property->surface])
                @include('admin.inc.input', ['name'=>'price', 'class'=>'col', 'value'=>$property->price])
            </div>

            <div class="row">
                @include('admin.inc.input', [ 'type'=>'textarea','name'=>'description', 'value'=>$property->description])
            </div>

            <div class="row">
                @include('admin.inc.input', ['name'=>'rooms', 'class'=>'col', 'label'=>'Pièces', 'value'=>$property->rooms])
                @include('admin.inc.input', ['name'=>'bedrooms', 'class'=>'col', 'label'=>'Chambres', 'value'=>$property->bedrooms])
                @include('admin.inc.input', ['name'=>'floor', 'class'=>'col', 'label'=>'Etages', 'value'=>$property->floor])
            </div>

            <div class="row">
                @include('admin.inc.input', ['name'=>'city', 'class'=>'col', 'label'=>'Ville', 'value'=>$property->city])
                @include('admin.inc.input', ['name'=>'address', 'class'=>'col', 'label'=>'Adresse', 'value'=>$property->address])
                @include('admin.inc.input', ['name'=>'postal_code', 'class'=>'col', 'label'=>'Code Postal', 'value'=>$property->postal_code])
            </div>

            @include('admin.inc.checkbox', ['name'=>'sold', 'label'=>'Vendu', 'value'=>$property->sold, 'options'=>'options'])
            @include('admin.inc.select', ['name'=>'options', 'label'=>'Options', 'value'=>$property->options->pluck('id'), 'multiple'=>true])

            {{-- <div class="row mb-3">
                <div class="col-md-4">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Surface</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Prix</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="form-label">Description :</label>
                <textarea class="form-control" name="" id="" rows="3"></textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Surface</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Prix</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div> --}}

            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm">{{$property->exists ? 'Modifier' : 'Ajouter'}}</button>
            </div>
        </form>
    </div>
</div>

@endsection