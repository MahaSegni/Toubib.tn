<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $service = new Service();
        $service->libelle=$request->libelle;
        $service->description=$request->description;
        $service->centre_id=$request->centre_id;
        $service->save();
        return redirect('/centres/'.$request->centre_id);
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
        $service = Service::find($id);
        return view("service.update",["service"=>$service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service->update($request->all());
        return redirect('/centres/'.$request->centre_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/centres/'.$service->centre_id);
        //
    }

    public function storeservice(Request $request)
    {
        //
        $service = new Service();
        $service->libelle=$request->libelle;
        $service->description=$request->description;
        $service->centre_id=$request->centre_id;
        $service->save();
        return redirect('/showmycenter/'.auth()->user()->id);
    }
    public function editservice($id)
    {
        $service = Service::find($id);
        return view("service.updateservice",["service"=>$service]);
    }

    public function updateservice(Request $request, $id)
    {
        $service = Service::find($id);
        $service->update($request->all());
        return redirect('/showmycenter/'.auth()->user()->id);
    }

    public function destroyservice($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/showmycenter/'.auth()->user()->id);
        //
    }

}
