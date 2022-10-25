<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;


class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCentres=Centre::all();
        return view("centre.adminshow",["listCentres" => $listCentres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listUsers=User::where('type','user')->get();
        $listCentres=Centre::all();
        for($i = 0;$i < count($listUsers);$i++){
            for($j = 0;$j < count($listCentres);$j++){
                if($listCentres[$j]->user_id == $listUsers[$i]->id){
                    unset($listUsers[$i]);
                }
            }
        }
        return view("centre.create",["listUsers" => $listUsers]);
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
            'nom'=>'required',
            'gouvernorat'=>'required',
            'adresse'=>'required',
            'telephone'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagename = null;
        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesCentre/';
            $imageCentre = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageCentre);
            $imagename = "$imageCentre";
        }
        $centre = new Centre();
        $centre->nom=$request->nom;
        $centre->gouvernorat=$request->gouvernorat;
        $centre->adresse=$request->adresse;
        $centre->telephone=$request->telephone;
        $centre->description=$request->description;
        $centre->user_id=$request->user;
        $centre->image = $imagename;

        $user = User::find($request->user);
        $user->type = 'centre';
        $centre->save();
        $user->save();

        return redirect('/centres');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centre = Centre::find($id);
        $listServices = Service::where('centre_id',$id)->get();
        return view("centre.show",["centre"=>$centre,"listServices"=>$listServices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centre = Centre::find($id);
        return view("centre.update",["centre"=>$centre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nom'=>'required',
            'gouvernorat'=>'required',
            'adresse'=>'required',
            'telephone'=>'required',
            'description'=>'required',
        ]);
        $imagename = null;
        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesCentre/';
            $imageCentre = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageCentre);
            $imagename = "$imageCentre";
        }
        $centre = Centre::find($id);
        $centre->nom=$request->nom;
        $centre->gouvernorat=$request->gouvernorat;
        $centre->adresse=$request->adresse;
        $centre->telephone=$request->telephone;
        $centre->description=$request->description;
        $centre->user_id=$request->user;
        if($imagename){
            $centre->image=$imagename;
        }
        $centre->save();
        return redirect('/centres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centre = Centre::find($id);
        $centre->delete();
        return redirect('/centres');
    }

    public function showusercenter($userid){
        $centre = Centre::where('user_id',$userid)->get()[0];
        $listServices = Service::where('centre_id',$centre->id)->get();
        return view("centre.centreshow",["centre"=>$centre,"listServices" => $listServices]);
    }

    public function editcenter($id){
        $centre = Centre::find($id);
        return view("centre.editcenter",["centre"=>$centre]);

    }

    public function updatecenter(Request $request,$id)
    {
        $request->validate([
            'nom'=>'required',
            'gouvernorat'=>'required',
            'adresse'=>'required',
            'telephone'=>'required',
            'description'=>'required',
        ]);
        $imagename = null;
        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesCentre/';
            $imageCentre = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageCentre);
            $imagename = "$imageCentre";
        }
        $centre = Centre::find($id);
        $centre->nom=$request->nom;
        $centre->gouvernorat=$request->gouvernorat;
        $centre->adresse=$request->adresse;
        $centre->telephone=$request->telephone;
        $centre->description=$request->description;
        $centre->user_id=$request->user;
        if($imagename){
            $centre->image=$imagename;
        }
        $centre->save();
        return redirect('/showmycenter/'.$centre->user_id);
    }

    public function listcentres()
    {
        $listCentres=Centre::all();
        return view("centre.listcentres",["listCentres" => $listCentres]);
    }
    public function getrcenterbyid($id){
        $centre = Centre::find($id);
        $listServices = Service::where('centre_id',$centre->id)->get();
        return view("centre.usercentreshow",["centre"=>$centre,"listServices" => $listServices]);
    }

    public function exportWord($id){
        $centre = Centre::find($id);
        $listServices = Service::where('centre_id',$centre->id)->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $nom = $centre->nom;
        $gouvernorat = $centre->gouvernorat;
        $adresse = $centre->adresse;
        $telephone = $centre->telephone;
        $description = $centre->description;
        $fontStyle = array('bold' => true, 'size' => 20);
        $fontStyle2 = array('bold' => false, 'size' => 12);
        $fontStyle3 = array('bold' => true, 'size' => 12);
        $paragraphStyle = array('align' => 'center');
        $section->addText($nom, $fontStyle, $paragraphStyle);
        $section->addText('Gouvernorat : '.$gouvernorat,$fontStyle2);
        $section->addText('Adresse : '.$adresse,$fontStyle2);
        $section->addText('Téléphone : '.$telephone,$fontStyle2);
        $section->addText('Description : '.$description,$fontStyle2);
        $section->addText('Nos services', $fontStyle, $paragraphStyle);
        for($i = 0;$i < count($listServices);$i++){
            $section->addText($listServices[$i]->libelle, $fontStyle, null);
            $section->addText('Description : '.$listServices[$i]->description,$fontStyle2);
        }
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('centre.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('centre.docx'))->deleteFileAfterSend(true);

    }
}
