@extends('admin/layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Categories articles</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('categorieArticle.create')}}" class="btn btn-primary">Ajouter categorie article</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Libelle</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($categoriesArticle as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->libelle}}</td>
                        <td>
                            <a href="{{ route('categorieArticle.edit',$cat->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('categorieArticle.destroy', $cat->id)}}" method="post">
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
