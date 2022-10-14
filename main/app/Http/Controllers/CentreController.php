<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $listUsers=User::all();
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        $centre->save();

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
        $listUsers=User::all();
        $centre = Centre::find($id);
        $user=User::find($centre->user_id);
        return view("centre.update",["centre"=>$centre,"listUsers" => $listUsers,"email"=>$user->email]);
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
        /*$centre = Centre::find($id);
        $centre->update($request->all());
        return redirect('/centres');*/
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
}
