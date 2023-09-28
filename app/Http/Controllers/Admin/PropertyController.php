<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties=Property::orderBy('created_at','desc')->paginate('2');
        return view('admin.properties.index',[
            'properties'=>$properties,
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property=new Property();
        $property->fill([
            'surface'=>35,
            'rooms'=>4,
            'bedrooms'=>2,
            'floor'=>2,
            'city'=>'Izhevsk',
            'postal_code'=>426069
        ]);
        return view('admin.properties.form', [
            'property'=>$property,
            'options'=>Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property=Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return redirect()->route('admin.property.index')->with('success', 'Propriété ajouté avec succès');
        //
    }

    /**
     * Display the specified resource.
     */
    /* public function show(string $id)
    {
        //
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property'=>$property,
            'options'=>Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        return redirect()->route('admin.property.index')->with('success', 'Propriété modifié avec succès');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.property.index')->with('success', 'Propriété supprimé avec succès');
    }
}
