<nav class="navbar navbar-expand navbar-light bg-light">
    <a class="nav-link" href="{{route('home')}}" style="background-color: aqua; margin-left: 10%; 
    color: brown; font-family: 'Courier New', Courier, monospace; font-size: 1.5em; border:none; ">AGUIMMO
    </a>
    <ul class="nav navbar-nav ms-auto my-2 mx-4">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.property.index')}}" aria-current="page">Biens <span class="visually-hidden">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.option.index')}}">Option</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Nav 2</a>
        </li>
    </ul>
</nav>