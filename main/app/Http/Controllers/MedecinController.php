<?php

namespace App\Http\Controllers;
use App\Models\Medecin;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MedecinController extends Controller
{
/**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function showadmin()
    {
        $listemed = Medecin::all();
        return view('medecins.adminshow', compact('listemed'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {   if(auth()->user()->type="user"){
        $medecin=Medecin::where('user_id',auth()->user()->id)->get();
        if(sizeof($medecin)>0){
            $msg="votre demande est en cours de traitement";
            return view('medecins.message',['msg'=>$msg]);
        }else{
            return view('medecins.create');

        }

        }else{
            $msg="votre demande a été traitée";
            return view('medecins.message',['msg'=>$msg]);
        }
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
            'gouvernorat' => 'required',
            'adresse' => 'required',
            'specialite'=>'required',
            'tell'=>'required',

            
        ]);
        $request->request->add(['user_id' => auth()->user()->id]);
        Medecin::create($request->post());

        return redirect()->route('medecin.create');
    }


    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Medecin  $Medecin
    * @return \Illuminate\Http\Response
    */
    public function edit(Medecin $Medecin)
    {
        return view('medecins.edit',compact('Medecin'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Medecin  $Medecin
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Medecin $Medecin)
    {
        $request->validate([
            'gouvernorat' => 'required',
            'adresse' => 'required',
            'specialite'=>'required',
            'tell'=>'required',
        ]);
        
        $Medecin->fill($request->post())->save();

        return redirect()->route('medecins.index')->with('success','Medecin Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Medecin  $Medecin
    * @return \Illuminate\Http\Response
    */
    public function destroy(Medecin $Medecin)
    {
        $Medecin->delete();
        return redirect()->route('medecins.index')->with('success','Medecin has been deleted successfully');
    }
}
