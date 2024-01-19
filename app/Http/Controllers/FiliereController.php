<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index(){
        $filieres = Filiere::all();
        return view('filieres.index', compact('filieres'));
    }

    public function create(){
        return view('filieres.form');
    }
    public function store(Request $request){
       Filiere::create($request->all());
       return redirect()->route('filiere.index');
    }
    public function show($id)
    {
        $filieres = Filiere::find($id);
        return view('filieres.show', compact('filieres'));

    }
    public function edit($id){
        $filiere = Filiere::find($id);
        return view('filieres.form', compact('filiere'));
    }

    public function update(Request $request){
        $filiere = Filiere::find($request->id);
        $filiere->update($request->all());
        return redirect()->route('filiere.index');
    }

    public function destroy($id){
        Filiere::destroy($id);
        return redirect()->route('filiere.index');
    }
}
