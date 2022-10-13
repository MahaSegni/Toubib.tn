@extends('admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifier article</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('article.update', $article->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input type="text" class="form-control" name="titre" value={{ $article->titre }} />
                    <label for="texte">Texte:</label>
                    <input type="text" class="form-control" name="texte" value={{ $article->texte }} />
                    <label for="auteur">Auteur:</label>
                    <input type="text" class="form-control" name="auteur" value={{ $article->auteur }} />

                    <label for="image">Image:</label>
                    <input type="text" class="form-control" name="image" value={{ $article->image }} />
                    <label for="video">Video:</label>
                    <input type="text" class="form-control" name="video" value={{ $article->video }} />
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection
