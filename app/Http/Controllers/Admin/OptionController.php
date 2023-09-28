<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options=Option::paginate('2');
        return view('admin.options.index',[
            'options'=>$options,
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option=new Option();
        return view('admin.options.form', [
            'option'=>$option
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        $option=Option::create($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'Propriété ajouté avec succès');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('admin.options.form', [
            'option'=>$option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'Propriété modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('admin.option.index')->with('success', 'Propriété supprimé avec succès');
    }
}
