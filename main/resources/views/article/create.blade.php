@extends('admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Ajouter article</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('article.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titre">Titre:</label>
                        <input type="text" class="form-control" name="titre" />
                        <label for="texte">Texte:</label>
                        <input type="text" class="form-control" name="texte"  />
                        <label for="auteur">Auteur:</label>
                        <input type="text" class="form-control" name="auteur"  />
                        <label for="categorie_article_id" >Categorie :</label>
                            <select name="categorie_article_id"  class="form-control">
                                @foreach($categoriesArticle as $cat)
                                    <option  value="{{ $cat->id }}">{{ $cat->libelle }} </option>
                                @endforeach
                            </select>
                        <label for="image">Image:</label>
                        <input type="file" name="image" class="form-control" placeholder="image">

                        <label for="video">Video:</label>
                        <input type="text" class="form-control" name="video"  />
                    </div>

                    <button type="submit" class="btn btn-primary-outline">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
