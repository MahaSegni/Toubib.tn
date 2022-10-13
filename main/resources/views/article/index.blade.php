@extends('admin/layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Articles</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('article.create')}}" class="btn btn-primary">Ajouter article</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Titre</td>
                    <td>Texte</td>
                    <td>Categorie</td>
                    <td>Auteur</td>
                    <td>Image</td>
                    <td>Video</td>
                    <td colspan =2 class="text-center">Actions</td>
                </tr>
                </thead>
                <tbody>

                @foreach($articles as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->titre}}</td>
                        <td>{{$a->texte}}</td>
                        <td>{{$a->categorieArticle->libelle}}</td>
                        <td>{{$a->auteur}}</td>
                        @if($a->image !=null)
                            <td><img src="images/imagesArticle/{{ $a->image }}" width="100px" height="100px"></td>
                        @else
                            <td></td>
                        @endif
                        <td>{{$a->video}}</td>
                        <td class="text-center">
                            <a href="{{ route('article.edit',$a->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('article.destroy', $a->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
@endsection
