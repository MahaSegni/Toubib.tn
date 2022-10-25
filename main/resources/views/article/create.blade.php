@extends('admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Ajouter article</h1>

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
                        <input type="file" name="image" class="form-control" placeholder="image" id="imgInp">
                        <img style="visibility:hidden"  id="prview" src=""  width=100 height=100 />

                        <br>
                        <label for="video">Video:</label>
                        <input type="file" name="video" class="form-control" placeholder="video" id="vidInp">
                        <video style="visibility:hidden"  id="prviewVid" controls width="200" src=""/>

                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>

        </div>
    </div>

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                prview.style.visibility = 'visible';
                prview.src = URL.createObjectURL(file)
            }
        }
    </script>
    <script>
        vidInp.onchange = evt => {
            const [file] = vidInp.files
            if (file) {
                prviewVid.style.visibility = 'visible';
                prviewVid.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
