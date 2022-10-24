@extends('client/layout')
@section('cover')
    <div style="margin: 150px 0px "></div>
@endsection
@section('content')
    <div class="row my-3">
        <div class="col-sm-12 col-md-10 mx-auto">
            <form class="w-75 mx-auto" method="post" action="{{ route('updatecenter',$centre->id) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("PATCH")
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$centre->nom}}">
                    @error('nom')
                    <div class="alert alert-danger mt-2">Le nom est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gouvernorat">Gouvernorat</label>
                    <input type="text" class="form-control" id="gouvernorat" name="gouvernorat" value="{{$centre->gouvernorat}}">
                    @error('gouvernorat')
                    <div class="alert alert-danger mt-2">La gouvernorat est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" value="{{$centre->adresse}}">
                    @error('adresse')
                    <div class="alert alert-danger mt-2">L'adresse est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="number" class="form-control" id="telephone" name="telephone" value="{{$centre->telephone}}">
                    @error('telephone')
                    <div class="alert alert-danger mt-2">Le numero de téléphone est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{$centre->description}}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-2">La description est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" name="image" value={{ $centre->image }} />
                </div>
                <input type="hidden" name="user" value="{{$centre->user_id}}">

                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>

@endsection
