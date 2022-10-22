<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamations;
use Illuminate\Support\Facades\Auth;
class ReclamationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $encours=0;
        $reclamations = Reclamations::all();
        $encours = Reclamations::whereStatut(0)->get();
        $terminer = Reclamations::whereStatut(1)->get();
        return view ('reclamations.index',['reclamations' => $reclamations, 'encours'=> $encours, 'terminer'=>$terminer]);

    }

    public function indexfront()
    {
        $user = Auth::user();
        $reclamations = Reclamations::where("user_id",$user->id)->get();
         return view ('reclamations.indexfont',['reclamations' => $reclamations]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listReclamations=Reclamations::all();
        return view("reclamations.createfront",["listReclamations" => $listReclamations]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $imagename=null;
        $request->validate([
            'objet'=>'required',
            'message'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'objet.required' => 'Objet obligatoire',
            'message.required' => 'Message obligatoire',
            'image' => 'Image doit etre de type: jpeg,png,jpg,gif ou svg ',
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesReclamations/';
            $profileImage = 'captures_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
            }
        $reclamation = new Reclamations();
        $reclamation->objet=$request->objet;
        $reclamation->message=$request->message;
        $reclamation->user_id=1;
        $reclamation->created_at= date('Y-m-d H:i:s');
        $reclamation->statut= false;
        $reclamation->image = $imagename;
        $reclamation->save();

        return redirect('/listeReclamation')->with('success', 'reclamation envoyer!');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reclamation = Reclamations::find($id);
        return view('reclamations.show', compact('reclamation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(int $reclamation)
    {

         $reclamation = Reclamations::find($reclamation);

        return view('reclamations.edit', compact('reclamation'));

    }

 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $reclamation)
    {

       $imagename=null;
        $request->validate([
            'objet'=>'required',
            'message'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'objet.required' => 'Objet obligatoire',
            'message.required' => 'Message obligatoire',
            'image' => 'Image doit etre de type: jpeg,png,jpg,gif ou svg ',
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesReclamations/';
            $profileImage = 'captures_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
            }

        $reclamation = Reclamations::find($reclamation);
        $reclamation->objet=$request->objet;
        $reclamation->message=$request->message;
        $reclamation->user_id=1;
        $reclamation->updated_at= date('Y-m-d H:i:s');
        $reclamation->statut= false;
        $reclamation->image = $imagename;
        $reclamation->save();

        return redirect('/listeReclamation')->with('success', 'reclamation modifier avec succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reclamation = Reclamations::find($id);
        $reclamation->delete();
        return redirect('/listeReclamation')->with('success', 'reclamation deleted!');

    }
}
