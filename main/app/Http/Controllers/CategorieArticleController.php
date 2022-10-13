<?php

namespace App\Http\Controllers;

use App\Models\CategorieArticle;
use Illuminate\Http\Request;

class CategorieArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesArticle = CategorieArticle::all();
        return view('categorieArticle.index', compact('categoriesArticle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorieArticle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle'=>'required',
        ]);

        $categorieArticle = new CategorieArticle([
            'libelle' => $request->get('libelle'),
        ]);
        $categorieArticle->save();
        return redirect('/categorieArticle')->with('success', 'CategorieArticle saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieArticle $cat
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieArticle $cat)
    {
        $categorieArticle = CategorieArticle::find($cat);
        return view('categorieArticle.show', compact('categorieArticle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit(int $cat)
    {
        $categorieArticle = CategorieArticle::find($cat);

        return view('categorieArticle.edit', compact('categorieArticle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $cat)
    {
        $request->validate([
            'libelle'=>'required',
        ]);

        $categorieArticle = CategorieArticle::find($cat);
        $categorieArticle->libelle=  $request->get('libelle');
        $categorieArticle->save();
        return redirect('/categorieArticle')->with('success', 'CategorieArticle updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $cat)
    {
        $categorieArticle = CategorieArticle::find($cat);
        $categorieArticle->delete();

        return redirect('/categorieArticle')->with('success', 'CategorieArticle deleted!');
    }
}
