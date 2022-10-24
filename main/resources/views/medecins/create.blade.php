@extends('client.layout')
@section('cover')
<section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to Toubib.tn</h1>
     
     
    </div>
  </section>
@endsection
@section('content')
<section id="appointment" class="appointment section-bg" style="background-color: white">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #2C4964 ; color:white; border:none">{{ __('Inscription fiche Medecin') }}</div>

                <div class="card-body">
              
          
            <form method="post" action="{{ route('medecin.store') }}">
                @csrf

                        
                        <div class="row mb-3">
                            <label for="gouvernorat" class="col-md-4 col-form-label text-md-start">{{ __('gouvernorat') }}</label>

                            <div class="col-md-6">
                                <input id="gouvernorat" type="text" class="form-control @error('gouvernorat') is-invalid @enderror" name="gouvernorat" value="{{ old('gouvernorat') }}"  autocomplete="gouvernorat" autofocus>
                                    
                                @error('gouvernorat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="adresse" class="col-md-4 col-form-label text-md-start">{{ __('adresse') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}"  autocomplete="adresse" autofocus>
                                    
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="specialite" class="col-md-4 col-form-label text-md-start">{{ __('specialite') }}</label>

                            <div class="col-md-6">
                                <input id="specialite" type="text" class="form-control @error('specialite') is-invalid @enderror" name="specialite"  autocomplete="specialite">

                                @error('specialite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tell" class="col-md-4 col-form-label text-md-start">{{ __('tell') }}</label>

                            <div class="col-md-6">
                                <input id="tell" type="text" class="form-control @error('tell') is-invalid @enderror" name="tell"  autocomplete="tell">

                                @error('tell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #2C4964">
                                    {{ __(' Soumettre ma demande') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
    </div>
</div>
</section>

@endsection
