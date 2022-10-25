@extends('espacemedecin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifier Mes information</h1>

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
            <form method="POST" action={{"/espacemedecin/mesinfromation/edit/".$medecin->id }} >
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="gouvernorat">gouvernorat:</label>
                    <input type="text" class="form-control" name="gouvernorat" value={{ $medecin->gouvernorat }} />
                    <label for="adresse">adresse:</label>
                    <input type="text" class="form-control" name="adresse" value={{ $medecin->adresse }} />
                    <label for="specialite">specialite:</label>
                    <input type="text" class="form-control" name="specialite" value={{ $medecin->specialite }} />
                    <label for="tell">tell:</label>
                    <input type="text" class="form-control" name="tell" value={{ $medecin->tell }} />
               </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>

@endsection

