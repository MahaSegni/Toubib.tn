<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentaireController extends Controller
{
    /**
     *
     *
     */
    public function index(int $a)
    {
        return $commentaires=Commentaire::Query()->where('article_id', $a)->with('user')->get();

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
     * @param integer  $a
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,int  $a)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $a
     * @param  integer $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int  $a, int $commentaire)
    {   $imagename=null;
        $videoname=null;
        $request->validate([

            'texte'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'mimetypes:peg,png,jpg,gif,svg,video/mp4,video/mov,video/wmv,video/avi,video/avchd,video/flv,video/f4v,video/swf,video/mkv,video/webm,video/html5,video/mpeg-2|max:500000000',
        ],
            [

                'texte.required' => 'Texte obligatoire',
                'image' => 'Image doit etre de type: jpeg,png,jpg,gif ou svg ',
                'video' => 'video doit etre de type: MP4,MOV,WMV,AVI,AVCHD,FLV,F4V,SWF,MKV,WEBM,HTML5 ou MPEG-2',

            ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesCommentaire/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
        }

        if ($video = $request->file('video')) {
            $destinationPathVideo = 'videos/videosCommentaire/';
            $profileVideo = date('YmdHis') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPathVideo, $profileVideo);
            $videoname = "$profileVideo";
        }
        $commentaireup=commentaire::find($commentaire);
        $commentaireup->texte=$request->get('texte');
        if($imagename){
            $commentaireup->image=$imagename;}
        if($videoname){
            $commentaireup->video=$videoname;}

        $commentaireup->save();


        return redirect('/article/showFront/'.$a)->with('success', 'commentaire saved!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param commentaire $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param integer  $a
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajouter (Request $request,int  $a)
    {


        $imagename=null;
        $videoname=null;
        $request->validate([

            'texte'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'mimetypes:peg,png,jpg,gif,svg,video/mp4,video/mov,video/wmv,video/avi,video/avchd,video/flv,video/f4v,video/swf,video/mkv,video/webm,video/html5,video/mpeg-2|max:500000000',
        ],
            [

                'texte.required' => 'Texte obligatoire',
                'image' => 'Image doit etre de type: jpeg,png,jpg,gif ou svg ',
                'video' => 'video doit etre de type: MP4,MOV,WMV,AVI,AVCHD,FLV,F4V,SWF,MKV,WEBM,HTML5 ou MPEG-2',

            ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesCommentaire/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
        }

        if ($video = $request->file('video')) {
            $destinationPathVideo = 'videos/videosCommentaire/';
            $profileVideo = date('YmdHis') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPathVideo, $profileVideo);
            $videoname = "$profileVideo";
        }

        $commentaire = new commentaire([

            'user_id'=>auth()->user()->id,
            'texte' => $request->get('texte'),
            'article_id' => $a,
            'video' => $videoname,
            'image' => $imagename,
        ]);
        $commentaire->save();


        return redirect('/article/showFront/'.$a)->with('success', 'commentaire saved!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param integer $commentaire
     * @param integer $a
     * @return \Illuminate\Http\Response
     */
    public function supprimer(int $commentaire,int $a)
    {
        $commentaire = Commentaire::find($commentaire);
        $commentaire->delete();
        return redirect('/article/showFront/'.$a)->with('success', 'commentaire supprimmé!');
    }
}
