@php
    $route = request()->route()->getName();
@endphp

<nav class="navbar navbar-expand navbar-light bg-light">
    <a class="nav-link" href="{{route('home')}}" style="background-color: aqua; margin-left: 10%; 
    color: brown; font-family: 'Courier New', Courier, monospace; font-size: 1.5em; border:none; ">AGUIMMO
    </a>
    <ul class="nav navbar-nav ms-auto my-2 mx-4">
        <li class="nav-item">
            <a href="{{route('property.index')}}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Biens <span class="visually-hidden">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Option</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Nav 2</a>
        </li>
    </ul>
</nav>