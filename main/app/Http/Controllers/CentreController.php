<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\User;
use Illuminate\Http\Request;

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
        $centre = new Centre();
        $centre->nom=$request->nom;
        $centre->gouvernorat=$request->gouvernorat;
        $centre->adresse=$request->adresse;
        $centre->telephone=$request->telephone;
        $centre->description=$request->description;
        $centre->user_id=$request->user;
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
        //
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
        $centre = Centre::find($id);
        $centre->update($request->all());
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
}
