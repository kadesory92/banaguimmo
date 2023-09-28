@extends('frontoffice.master')

@section('title', $property->title)

@section('content')

    <div class="container">
        <div class="mt-4">
            <h3>{{$property->title}}</h3>
            <h5>{{$property->rooms}} pièces - {{$property->surface}} m2</h5>
            <div class="text-primary fw-bold" style="font-size: 2rem">
                {{number_format($property->price, thousands_separator: ' ')}}
            </div>
        </div>

        <hr/>

        <div class="mt-4 mb-4">
            <h4>Les intéressés(ées) peuvent nous contacter ici :</h4>
            <form action="" method="POST" class="vstack gap-1">
                @csrf

                <div class="row">
                    @include('admin.inc.input', ['name'=>'lastname', 'class'=>'col', 'label'=>'Nom'])
                    @include('admin.inc.input', ['name'=>'firtname', 'class'=>'col', 'label'=>'Prenom'])
                </div>
                <div class="row">
                    @include('admin.inc.input', ['type'=>'phone', 'name'=>'phone', 'class'=>'col', 'label'=>'Téléphone'])
                    @include('admin.inc.input', ['type'=>'email', 'name'=>'email', 'class'=>'col', 'label'=>'Email'])
                </div>

                @include('admin.inc.input', ['type'=>'textarea', 'name'=>'message', 'class'=>'col', 'label'=>'Votre message'])

                <div>
                    <button class="btn btn-primary">Nous contacter</button>
                </div>

            </form>
        </div>

        <div class="mt-4 mb-4">
            <p>{!! nl2br($property->desciption) !!}</p>
            <div class="row">
                <div class="col-6">
                    <h2>Caratéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{$property->surface}}</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{$property->rooms}}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{$property->surface}}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{$property->floor ? : 'Rez de chaussé'}}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{$property->address }} <br/>
                                {{$property->city}}({{$property->postal_code}})
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-1"></div>
                <div class="col">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">{{$option->name}} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection