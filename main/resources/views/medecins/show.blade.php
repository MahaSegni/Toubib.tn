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
                        E-mail : {{Auth::user()->email}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card" style="background-color:white; border-raduis:20px; border-radius: 11px; " >
                <div class="card-header">
                <div class="card-title">
                    Mes informations 
                </div>
            </div>
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col">
                            Gouvernorat
                        </div>
                        <div class="col">
                            {{ $medecin->gouvernorat }}
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            Adresse 
                        </div>
                        <div class="col">
                            {{ $medecin->adresse }}

                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            Specialité
                        </div>
                        <div class="col">
                            {{ $medecin->specialite }}

                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            Numéro de téléphone
                        </div>
                        <div class="col">
                            {{ $medecin->tell }}

                        </div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-10"></div>
                    <div class="col">
                        <a href="/espacemedecin/mesinfromations" class="btn btn-danger" style="color:white"> Modifier  </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

