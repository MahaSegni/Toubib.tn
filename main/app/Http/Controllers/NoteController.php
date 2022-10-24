<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(int $a)
    {
     return   $note=Note::where([['article_id','=', $a],['user_id','=', auth()->user()->id]])->first();
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $a
     * @param  integer $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int  $a, int  $note)
    {
        $note=Note::find($note);
        $note->note = $request->get('note');

        $note->save();
        return redirect('/article/showFront/'.$a)->with('success', 'note saved!');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param integer  $a
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function ajouter (Request $request,int  $a)
    {
        $note = new Note([
            'user_id'=>auth()->user()->id,
            'note' => $request->get('note'),
            'article_id' => $a
        ]);
        $note->save();
        return redirect('/article/showFront/'.$a)->with('success', 'note saved!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param integer $note
     * @param integer $a
     * @return \Illuminate\Http\Response
     */
    public function supprimer(int $note,int $a)
    {
        $note = Note::find($note);
        $note->delete();
        return redirect('/article/showFront/'.$a)->with('success', 'note supprimmé!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param integer $a
     * @return float
     */
    public static function calculMoyenne(int $a)

    {
        $noteCount=Note::where('article_id', $a)->count();

        if($noteCount!=0)
        {return $noteMoyenne=Note::where('article_id', $a)->sum('note')/$noteCount;}

        return $noteCount;
    }
}
