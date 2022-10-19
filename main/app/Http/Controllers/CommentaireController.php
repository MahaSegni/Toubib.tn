<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @param integer  $a
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,int  $a)
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

        $commentaire = new Commentaire([

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }
}
