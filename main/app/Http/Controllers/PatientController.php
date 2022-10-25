<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Fiche;

use App\Models\User;
use PDF;

class PatientController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {   $medecin=Medecin::where('user_id',auth()->user()->id)->get()[0];
        $Patients = Patient::where('medecin_id',$medecin->id)->get();
        return view('Patients.index', compact('Patients'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('Patients.create');
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
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'poids' => 'required',
            'taille' => 'required',
            
        ]);
        $medecin=Medecin::where('user_id',auth()->user()->id)->get()[0];
        $request->request->add(['medecin_id' => $medecin->id]);
        Patient::create($request->post());

        return redirect()->route('patient.index')->with('success','Patients has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Patient  $Patient
    * @return \Illuminate\Http\Response
    */
    public function show(Patient $Patient)
    {   $fiches=Fiche::Where('patient_id',$Patient->id)->get();
        return view('Patients.show',compact('Patient','fiches'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Patient  $Patient
    * @return \Illuminate\Http\Response
    */
    public function edit(Patient $Patient)
    {
        return view('Patients.edit',compact('Patient'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Patient  $Patient
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Patient $Patient)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'poids' => 'required',
            'taille' => 'required',
            
        ]);
        
        $Patient->fill($request->post())->save();

        return redirect()->route('patient.index')->with('success','Company Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Patient  $Patient
    * @return \Illuminate\Http\Response
    */
    public function destroy(Patient $Patient)
    {
        $Patient->delete();
        return redirect()->route('patient.index')->with('success','Company has been deleted successfully');
    }
    public function pdfview(Request $request,int $idpatient)
    { 
    $Patient=Patient::find($idpatient);

    $fiches=Fiche::Where('patient_id',$idpatient)->get();
    view()->share('Patient',$Patient);
    view()->share('fiches',$fiches);
    if($request->has('download')){
        $pdf = PDF::loadView('Patients.pdf',['Patient'=>$Patient,'fiches'=>$fiches]);
        $d=date('d-m-y h:i:s');
        return $pdf->download($Patient->nom.$Patient->nom.$d.".pdf");
        }
    return redirect()->route('patient.show',$Patient)->with('success','..');
    
    }


}
