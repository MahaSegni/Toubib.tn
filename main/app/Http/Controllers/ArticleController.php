<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategorieArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('categorieArticle','user')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesArticle = CategorieArticle::all();
        return view('article.create',compact('categoriesArticle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagename=null;
        $videoname=null;
        $request->validate([
            'titre'=>'required',
            'texte'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'mimetypes:video/mp4,video/mov,video/wmv,video/avi,video/avchd,video/flv,video/f4v,video/swf,video/mkv,video/webm,video/html5,video/mpeg-2|max:500000000',
        ],
        [
            'titre.required' => 'Titre obligatoire',
            'texte.required' => 'Texte obligatoire',
            'image' => 'Image doit etre de type: jpeg,png,jpg,gif ou svg ',
            'video' => 'video doit etre de type: MP4,MOV,WMV,AVI,AVCHD,FLV,F4V,SWF,MKV,WEBM,HTML5 ou MPEG-2',

        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesArticle/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
            }

        if ($video = $request->file('video')) {
            $destinationPathVideo = 'videos/videosArticle/';
            $profileVideo = date('YmdHis') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPathVideo, $profileVideo);
            $videoname = "$profileVideo";
        }

        $article = new Article([

            'user_id'=>auth()->user()->id,
            'titre' => $request->get('titre'),
            'texte' => $request->get('texte'),
            'auteur' => $request->get('auteur'),
            'categorie_article_id' => $request->get('categorie_article_id'),
            'video' => $videoname,
            'image' => $imagename,
        ]);
        $article->save();
        return redirect('/article')->with('success', 'Article saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $article
     * @return \Illuminate\Http\Response
     */
    public function show(int $article)
    {
        $article = Article::find($article);
        return view('article.show', compact('article'));
    }

    /**
     * showFront
     *
     * @param  integer  $a
     * @return \Illuminate\Http\Response
     */
    public function showFront(int $a)
    {
        $article = Article::find($a);
        return view('articleFront.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(int $article)
    {
        $article = Article::find($article);
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $article)
    {   $imagename=null;
        $videoname=null;
        $request->validate([
            'titre'=>'required',
            'texte'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'mimetypes:video/mp4,video/mov,video/wmv,video/avi,video/avchd,video/flv,video/f4v,video/swf,video/mkv,video/webm,video/html5,video/mpeg-2',
        ],
            [
                'titre.required' => 'Titre obligatoire',
                'texte.required' => 'Texte obligatoire',
                'image' => 'Image doit etre de type: jpeg,png,jpg,gif,svg ',
                'video' => 'video doit etre de type: MP4,MOV,WMV,AVI,AVCHD,FLV,F4V,SWF,MKV,WEBM,HTML5 ou MPEG-2',
            ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/imagesArticle/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
        }
        if ($video = $request->file('video')) {
            $destinationPathVideo = 'videos/videosArticle/';
            $profileVideo = date('YmdHis') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPathVideo, $profileVideo);
            $videoname = "$profileVideo";
        }

        $article = article::find($article);
        $article->titre=  $request->get('titre');
        $article->texte= $request->get('texte');
        $article->auteur= $request->get('auteur');

        if($imagename){
            $article->image=$imagename;}
        if($videoname){
            $article->video=$videoname;}
        $article->save();
        return redirect('/article')->with('success', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $article)
    {
        $article = Article::find($article);
        $article->delete();
        return redirect('/article')->with('success', 'Article deleted!');
    }

    /**
     * FindArticlesByCat
     *
     * @param  integer  $cat
     * @return \Illuminate\Http\Response
     */
    public function FindArticlesByCatFront(int $cat)
    {
        $articles = Article::where('categorie_article_id', $cat)
            ->get();
        return view('articleFront.index', compact('articles'));
    }
}
