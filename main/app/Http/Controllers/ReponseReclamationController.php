<?php

namespace App\Http\Controllers;
use App\Models\ReponseReclamations;
use App\Models\Reclamations;
use Illuminate\Http\Request;

class ReponseReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ReponseReclamations = Reclamations::find(2);
        return view('reponsereclamation.index', compact('ReponseReclamations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajouter (Request $request,int  $id)
    {
            dd("test");
        $reclamations=Reclamations::find($request->route()->parameters('id'));
        $imagename=null;
        $request->validate([
            'reponse'=>'required',
             'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'reponse.required' => 'Objet obligatoire',
            'image' => 'Image doit etre de type: jpeg,png,jpg,gif ou svg ',
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesReclamations/';
            $profileImage = 'captures_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
            }
        $ReponseReclamations = new ReponseReclamations();
        $ReponseReclamations->reponse=$request->reponse;
        if($reclamations->id!= null){
        $ReponseReclamations->reclamations_id=$reclamations->id;
    }

        $ReponseReclamations->created_at= date('Y-m-d H:i:s');
        $ReponseReclamations->resolu= true;
        $ReponseReclamations->image = $imagename;
        $ReponseReclamations->save();

        return redirect('/reponse')->with('success', 'reponse envoyer!');;
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,int $id)
    {
        $imagename=null;
        $request->validate([
            'reponse'=>'required',
             'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'reponse.required' => 'Objet obligatoire',
            'image' => 'Image doit etre de type: jpeg,png,jpg,gif ou svg ',
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesReclamations/';
            $profileImage = 'captures_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
            }
        $ReponseReclamations = new ReponseReclamations();
        $ReponseReclamations->reponse=$request->reponse;
        $ReponseReclamations->reclamations_id=$id;
        $ReponseReclamations->created_at= date('Y-m-d H:i:s');
        $ReponseReclamations->resolu= true;
        $ReponseReclamations->image = $imagename;
        $ReponseReclamations->save();

        return redirect('/reponse')->with('success', 'reponse envoyer!');;

    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function show($reclamation)
    {
        $listReclamations=Reclamations::find($reclamation);
        $reclamation = ReponseReclamations::Where("reclamations_id",$reclamation)->get();
        return view('reponsereclamation.show',["reclamation"=>$reclamation, "list"=>$listReclamations]);
        // compact('reclamation',"list")
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(int $reclamation)
    {
        $reclamation = Reclamations::find($reclamation);
        return view('reponsereclamation.create', compact('reclamation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reclamation)
    {
        $imagename=null;
        $request->validate([
            'reponse'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'reponse.required' => 'Objet obligatoire',
            'image' => 'Image doit etre de type: jpeg,png,jpg,gif ou svg ',
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesReclamations/';
            $profileImage = 'captures_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
            }
        $reclamation = Reclamations::find($reclamation);
        $reclamation->statut = true;
        $ReponseReclamations = new ReponseReclamations();
        $ReponseReclamations->reponse=$request->reponse;
        $ReponseReclamations->reclamations_id=$reclamation->id;
        $ReponseReclamations->created_at= date('Y-m-d H:i:s');
        $ReponseReclamations->resolu= true;
        $ReponseReclamations->image = $imagename;
        $ReponseReclamations->save();
        $reclamation->save();

        return redirect('/listeReclamations')->with('success', 'reclamation modifier avec succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
