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
                        <th>Visualiser</th>
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
                        <td><button class="btn btn-success" type="submit"><a style="color: white" href = {{url('centres/'.$c->id.'/edit')}}>Modifier</a></button></td>
                        <td>
                            <form action="{{route("centres.destroy",$c->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" style="color: white">Supprimer</button>
                            </form>
                        </td>
                        <td><button class="btn btn-primary" type="submit" style="color: white"><a style="color: white" href = {{url('centres/'.$c->id)}}>Visualiser</a></button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" style="float: right;"><a style="color: white" href = {{route("centres.create")}}>Ajouter</a></button>
        </div>
    </div>

@endsection


