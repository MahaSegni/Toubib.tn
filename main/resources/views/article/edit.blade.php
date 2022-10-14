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
            <form method="post" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
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
                    <input type="file" name="image" class="form-control" placeholder="image" id="imgInp">
                    @if($article->image)
                        <img id="prview" src="{{asset('images/imagesArticle/'.$article->image )}}"  width=100 height=100 />
                    @else
                        <img id="prview" src=""  style="visibility:hidden"  width=100 height=100 />
                    @endif

                    <br>
                    <label for="video">Video:</label>
                    <input type="file" name="video" class="form-control" placeholder="video" id="vidInp">
                    @if($article->video)
                        <video  id="prviewVid" controls width="200" src="{{asset('videos/videosArticle/'.$article->video )}}"/>
                    @else
                        <video id="prviewVid" src="" controls  style="visibility:hidden"  width=200 />
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
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
