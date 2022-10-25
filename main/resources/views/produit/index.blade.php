@extends('admin/layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Produits</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('produit.create')}}" class="btn btn-primary">Ajouter produit</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Prix</td>
                    <td>Categorie</td>
                    <td>Image</td>
                    <td colspan =2 class="text-center">Actions</td>
                </tr>
                </thead>
                <tbody>

                @foreach($produits as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->nom}}</td>
                        <td>{{$a->prix}}</td>
                        <td>{{$a->categorie->libelle}}</td>
                        @if($a->image !=null)
                            <td><img src="images/imagesProduit/{{ $a->image }}" width="100px" height="100px"></td>
                        @else
                            <td></td>
                        @endif

                        <td class="text-center">
                            <a href="{{ route('produit.edit',$a->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('produit.destroy', $a->id)}}" method="post">
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

