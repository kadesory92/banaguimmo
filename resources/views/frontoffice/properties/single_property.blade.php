<div class="card text-start">
  {{-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> --}}
  <div class="card-body">
    <h4 class="card-title text-center">
        <a href="{{route('property.show', ['slug'=>$property->getSlug(), 'property'=>$property])}}"  style="text-decoration: none; font-size: 1.5rem">{{$property->title}}</a>
    </h4>
    <p class="card-text">
        {{$property->surface}} m2 - {{$property->city}} ({{$property->postal_code}})
    </p>
    <div class="text-primary fw-bold" style="font-size: 1.4rem;">
        {{ number_format($property->price, thousands_separator: ' ') }}
    </div>
  </div>
</div>