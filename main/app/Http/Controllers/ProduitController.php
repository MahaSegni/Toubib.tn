<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::with('categorie')->get();
        return view('produit.index', compact('produits'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFront(int $id)
    {
        $produits = Produit::where('categorie_id',$id)->get();
        return view('produit.indexfront', compact('produits'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = Categorie::all();
        return view('produit.create',compact('categorie'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagename=null;
        $request->validate([
            'nom'=>'required',
            'prix'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ],
            [
                'nom.required' => 'Nom obligatoire',
                'prix.required' => 'Prix obligatoire',
                'image' => 'Image doit etre de type: jpeg,png,jpg,gif ou svg ',


            ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesProduit/';
            $produitImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $produitImage);
            $imagename = "$produitImage";
        }



        $produit = new Produit([

            'nom' => $request->get('nom'),
            'prix' => $request->get('prix'),
            'categorie_id' => $request->get('categorie_id'),
            'image' => $imagename,
        ]);
        $produit->save();
        return redirect('/produit')->with('success', 'Produit saved!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(int $produit)
    {
        $produit = Produit::find($produit);
        return view('produit.edit', compact('produit'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $produit)
    {   $imagename=null;

        $request->validate([
            'nom'=>'required',
            'prix'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ],
            [
                'titre.required' => 'Titre obligatoire',
                'prix.required' => 'Texte obligatoire',
                'image' => 'Image doit etre de type: jpeg,png,jpg,gif,svg ',

            ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesProduit/';
            $produitImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $produitImage);
            $imagename = "$produitImage";
        }


        $produit = produit::find($produit);
        $produit->nom=  $request->get('nom');
        $produit->prix= $request->get('prix');


        if($imagename){
            $produit->image=$imagename;}
        $produit->save();
        return redirect('/produit')->with('success', 'Produit updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $produit)
    {
        $produit = Produit::find($produit);
        $produit->delete();
        return redirect('/produit')->with('success', 'Produit deleted!');
    }

}
