@extends('admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifier catégorie produit</h1>

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
            <form method="post" action="{{ route('categories.update', $categorie->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="libelle">Libelle:</label>
                    <input type="text" class="form-control" name="libelle" value={{ $categorie->libelle }} />
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection

