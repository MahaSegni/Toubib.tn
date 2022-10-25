@extends('espacemedecin/layout')
@section('content')
   
    
    <div class="row">
        <div class="col">
            <div class="card" style="background-color: #F33155; border-raduis:20px; border-radius: 24px; " >
                <div class="card-header">
                    <div class="card-title" style="color:white">
                        Mr / Mme {{ $Patient->nom }} 
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
                 Informations 
                </div>
            </div>
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col">
                            Nom / Prenom : 
                        </div>
                        <div class="col">
                            {{ $Patient->nom }}   {{ $Patient->prenom }}

                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            Age 
                        </div>
                        <div class="col">
                            {{ $Patient->age }} 
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            Poids
                        </div>
                        <div class="col">
                            {{ $Patient->poids }} 

                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                        Taille                        
                    </div>
                        <div class="col">
                            {{ $Patient->taille }}

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card" style="background-color: #F33155; border-raduis:20px; border-radius: 24px; " >
                <div class="card-header">
                <div class="card-title " style="color:white">
                 Fiche  
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
                      <th>
                          Date Visite 
                      </th>
                      <th>
                          Type
                      </th>
                      <th>
                          Description
                      </th>
                      <th>
                        Actions
                      </th>
                    </thead>
                    <tbody>
                        @foreach($fiches as $f)
                        <tr>
                            <td>{{$f->date_visite}}</td>
                            <td>{{$f->type}}</td>
                            <td>{{$f->description}} </td>
                            <td><!-- Example single danger button -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" style="background-color:white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <form action={{ route('fiche.destroy', $f->id)}} method="post">
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
                <div class="row">
                    <div class="col-10">
                        <button type="button" data-toggle="modal" data-target="#infos" class="btn " style="background-color: #F33155; color:white; border-radius: 50%;">+</button>

                    </div> 
                    <div class="col">
                    <a  href="{{ route('pdfview',['download'=>'pdf','idpatient'=>$Patient->id ]) }}">Download PDF</a>
                    </div>
                </div>
                </div>  
            </div>
        </div>
    </div>
    <div class="modal fade" id="infos">
        <div class="modal-dialog" style="width: 700px;
 
        height:1200px !important;">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                  <form method="post" action="{{ route('fiche.store') }}">
                      @csrf
      
                              
                              <div class="row mb-3">
                                  <label for="nom" class="col-md-4 col-form-label text-md-start">{{ __('Date') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="date_visite" type="date" class="form-control @error('date_visite') is-invalid @enderror" name="date_visite" value="{{ old('date_visite') }}"  autocomplete="date_visite" autofocus>
                                          
                                      @error('date_visite')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="type" class="col-md-4 col-form-label text-md-start">{{ __('Type') }}</label>
      
                                  <div class="col-md-6">
                                      <select class="form-select" aria-label="Default select example" name="type">
                                          
                                          <option value="OBSERVATIONS">OBSERVATIONS</option>
                                          <option value="TRAITEMENTS">TRAITEMENTS</option>
      
                                      </select>
      
                                      @error('type')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="description" class="col-md-4 col-form-label text-md-start">{{ __('Description') }}</label>
      
                                  <div class="col-md-6">
                                      <textarea  name="description" class="form-select" rows="4" cols="50"></textarea>
                                      @error('description')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              
                            
      
                              <div class="row mb-0">
                                  <div class="col-md-8 offset-md-4">
                                    <input type="hidden" id="custId" name="patient_id" value="{{ $Patient->id }}">
                                    <button type="submit" class="btn " style="background-color: #F33155; color:white">Ajouter </button>
      
                                  </div>
                              </div>
                          </form>
              </div>
          </div>
          </div>
        </div>
      </div>
      

                
                    
               
 


@endsection

