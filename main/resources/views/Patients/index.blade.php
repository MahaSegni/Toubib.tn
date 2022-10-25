@extends('espacemedecin/layout')
@section('content')
    <div class="row">
        <div class="col">
            <h3 >Bonjour Dr. {{ Auth::user()->name }} </h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="card" style="background-color: #F33155; border-raduis:20px; border-radius: 24px; " >
                <div class="card-header">
                    <div class="card-title" style="color:white">
                        Liste des Patients 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card" style="background-color:white; border-raduis:20px; border-radius: 11px; " >
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>Age</td>
                            <td>Poids</td>
                            <td>Taille</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>
        
                        @foreach($Patients as $p)
                            <tr>
                                <td>{{$p->nom}}</td>
                                <td>{{$p->prenom}}</td>
                                <td>{{$p->age}}</td>
                                <td>{{$p->poids}}</td>
                                <td>{{$p->taille}}</td>
                                <td><!-- Example single danger button -->
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" style="background-color:white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('patient.edit',$p->id)}}" class="dropdown-item">Modifier</a>

                                            <form action={{ route('patient.destroy', $p->id)}} method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" type="submit" >Supprimer</button>
                                        </form>
                                        <a href="{{ route('patient.show',$p->id)}}" class="dropdown-item">Consulter</a>

                                        </div>
                                      </div>
                                     
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('patient.create')}}" class="btn " style="background-color: #F33155; color:white">Ajouter </a>
        </div>
    </div>


@endsection

