@extends('espacemedecin/layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card" style="background-color: #F33155; border-raduis:20px; border-radius: 24px; " >
            <div class="card-header">
                <div class="card-title" style="color:white">
                    Modifier Patient 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card" style="background-color:white; border-raduis:20px; border-radius: 11px; " >
            <div class="card-body">
                <form method="post" action="{{ route('patient.update', $Patient->id) }}">
                    @csrf
                    @method('PATCH')

                            
                            <div class="row mb-3">
                                <label for="nom" class="col-md-4 col-form-label text-md-start">{{ __('Nom') }}</label>
    
                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $Patient->nom }}"  autocomplete="nom" autofocus>
                                        
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prenom" class="col-md-4 col-form-label text-md-start">{{ __('Prénom') }}</label>
    
                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $Patient->prenom }}"  autocomplete="prenom" autofocus>
                                        
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-start">{{ __('age') }}</label>
    
                                <div class="col-md-6">
                                    <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age"  autocomplete="age" value="{{ $Patient->age }}">
    
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="poids" class="col-md-4 col-form-label text-md-start">{{ __('Poids') }}</label>
    
                                <div class="col-md-6">
                                    <input id="poids" type="number" step="0.01" min="0" class="form-control @error('poids') is-invalid @enderror" name="poids" value={{ $Patient->poids }} autocomplete="poids">
    
                                    @error('poids')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="taille" class="col-md-4 col-form-label text-md-start">{{ __('taille') }}</label>
    
                                <div class="col-md-6">
                                    <input id="taille" type="number"  step="0.01" min="0"  class="form-control @error('taille') is-invalid @enderror" name="taille"  autocomplete="taille" value="{{ $Patient->taille }}">
    
                                    @error('taille')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                   
                                    <button type="submit" class="btn " style="background-color: #F33155; color:white">Modifier </button>

                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>


    
@endsection

