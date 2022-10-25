<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = categorie::orderBy('id','desc')->paginate(5);
        return view('categories.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('categories.create');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $request->validate([
            'libelle' =>'required',

        ]);
        Categorie::create($request->post());
        return redirect()->route('categories.index')->with('success','Company has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return view('categories.show',compact('categorie'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id )
    {   $categorie=Categorie::find($id);
        return view('categories.edit',compact('categorie'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $cotegorie
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, int $id)
    {
        $request->validate([
            'libelle' => 'required',

        ]);
        $categorie=Categorie::find($id);
        $categorie->fill($request->post())->save();

        return redirect()->route('categories.index')->with('success','Categorie Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $categorie=Categorie::find($id);
        $categorie->delete();

        return redirect()->route('categories.index')->with('success','Categorie has been deleted successfully');
    }





}
