@extends('admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-10 mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Gouvernorat</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Description</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($listCentres as $c)
                    <tr>
                        <td>{{$c->nom}}</td>
                        <td>{{$c->gouvernorat}}</td>
                        <td>{{$c->adresse}}</td>
                        <td>{{$c->telephone}}</td>
                        <td>{{$c->description}}</td>
                        <td><a href = {{url('centres/'.$c->id.'/edit')}}>Modifier</a></td>
                        <td><a href = {{route("centres.destroy",$c->id)}}>Supprimer</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" style="float: right;"><a href = {{route("centres.create")}}>Ajouter</a></button>
        </div>
    </div>

@endsection


