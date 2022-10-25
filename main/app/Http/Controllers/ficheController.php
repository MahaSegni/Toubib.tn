<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiche;
use App\Models\Patient;

class ficheController extends Controller
{
    
    

   
    /**
    * Store a newly created resource in storage.
    * 
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {   //    protected $fillable = ['date_visite','type','description','patient_id'];

        $request->validate([
            'date_visite' => 'required',
            'type' => 'required',
            'description' => 'required',
            'patient_id'=>'required'
        ]);
        $patient_id=$request->post()['patient_id'];
        $patient=Patient::find($patient_id);
        Fiche::create($request->post());

        return redirect()->route('patient.show',$patient)->with('success','Company has been created successfully.');
    }

   

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Fiche  $fiche
    * @return \Illuminate\Http\Response
    */
    public function destroy(Fiche $fiche)
    {   $patient=Patient::find($fiche->patient_id);

        $fiche->delete();
        return redirect()->route('patient.show',$patient)->with('success','Fiche has been created successfully.');
    }
}
