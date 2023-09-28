<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchFormRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(SearchFormRequest $request) {

        $query=Property::query()->orderBy('created_at', 'desc');

        if($price=$request->validated('price')){

            $query=$query->where('price', '<=', $price);

        }

        if($surface=$request->validated('surface')){

            $query=$query->where('surface', '>=', $surface);

        }

        if($rooms=$request->validated('rooms')){

            $query=$query->where('rooms', '>=', $rooms);

        }

        if($title=$request->validated('title')){

            $query=$query->where('title', 'LIKE', '%' .$title. '%');

        }

        return view('frontoffice.properties.index', [
            'properties'=>$query->paginate(10),
            'input'=>$request->validated()
        ]);

    }

    public function show(string $slug, Property $property){
        $expectedSlug=$property->getSlug();
        if($slug!=$expectedSlug){
            return to_route('property.show', ['slug'=>$expectedSlug, 'property'=>$property]);
        }

        return view('frontoffice.properties.show', [
            'property'=>$property,
        ]);
    }
    //
}
