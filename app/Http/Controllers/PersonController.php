<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    
   
    public function index()
    {
        return Person::all();
    }

    public function store(Request $request)
    {
        Person::create($request->all());
    }


    public function show(string $id)
    {
        return Person::findOrFail($id);
    }


    public function update(Request $request, string $id)
    {
        $p = Person::findOrFail($id);
        $p->update($request->all());
    }

    public function destroy(string $id)
    {
        $p = Person::findOrFail($id);
        $p->delete();

    }
}
