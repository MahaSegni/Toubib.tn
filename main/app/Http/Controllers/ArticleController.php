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
    { $imagename=null;
        $request->validate([
            'titre'=>'required',
            'texte'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'titre.required' => 'Titre obligatoire',
            'texte.required' => 'Texte obligatoire',
        ]);
        if ($image = $request->file('image')) {

            $destinationPath = 'images/imagesArticle/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imagename = "$profileImage";
            }
        $article = new Article([
            'user_id'=>1,
            'titre' => $request->get('titre'),
            'texte' => $request->get('texte'),
            'auteur' => $request->get('auteur'),
            'categorie_article_id' => $request->get('categorie_article_id'),
            'video' => $request->get('video'),
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
    {
        $request->validate([
            'titre'=>'required',
            'texte'=>'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ],
            [
                'titre.required' => 'Titre obligatoire',
                'texte.required' => 'Texte obligatoire',
                'image.mimes' => 'Image doit etre de type: jpeg,png,jpg,gif,svg ',
            ]);

        $article = article::find($article);
        $article->titre=  $request->get('titre');
        $article->texte= $request->get('texte');
        $article->auteur= $request->get('auteur');
        $article->video= $request->get('video');
        $article->image= $request->get('image');
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
}
