@extends('/admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-10 mx-auto">
            <form class="w-75 mx-auto" method="post" action="{{ route('centres.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                    @error('nom')
                        <div class="alert alert-danger mt-2">Le nom est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gouvernorat">Gouvernorat</label>
                    <input type="text" class="form-control" id="gouvernorat" name="gouvernorat">
                    @error('gouvernorat')
                    <div class="alert alert-danger mt-2">La gouvernorat est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse">
                    @error('adresse')
                    <div class="alert alert-danger mt-2">L'adresse est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="number" class="form-control" id="telephone" name="telephone">
                    @error('telephone')
                    <div class="alert alert-danger mt-2">Le numero de téléphone est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    @error('description')
                    <div class="alert alert-danger mt-2">La description est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="user">
                        @foreach($listUsers as $u)
                        <option value="{{$u->id}}">{{$u->email}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    @error('image')
                    <div class="alert alert-danger mt-2">L'image est obligatoire'</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection


