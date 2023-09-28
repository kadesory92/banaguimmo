<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/tom-select.css')}}">

    <script src="{{asset('admin/js/tom-select.complete.min.js')}}"></script>
    <title> @yield('title') | AGUIMMO ADMIN </title>
</head>
<body>
    @include('admin.inc.navbar')
    <div class="container mt-5">

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if ($errors->any())

            <div class="alert alert-danger">
                <ul class="my-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif

        @yield('content')
    </div>

    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'supprimer'}}});
    </script>

</body>
</html>