@extends('admin/layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h3>Gestion des medecins </h3>
            <table class="table">
                <thead>
                <tr>
                    <td>Gouvernorat</td>
                    <td>Adresse</td>
                    <td>specialite</td>
                    <td>tell</td>
                    <td>User</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>

                @foreach($listemed as $med)
                    <tr>
                        <td>{{$med->gouvernorat}}</td>
                        <td>{{$med->adresse}}</td>
                        <td>{{$med->specialite}}</td>
                        <td>{{$med->tell}}</td>
                        <td>{{$med->email}}</td>
                        <td><!-- Example single danger button -->
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" style="background-color:white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @if($med->confirm==false)
                                  <a class="dropdown-item" href={{"/admin/confirmermedecin/".$med->id}}>Confirmer</a>
                                  @endif
                                  <form action={{"/admin/medecin/delete/".$med->id }} method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" type="submit" >Supprimer</button>
                                </form>
                                </div>
                              </div>
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
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
