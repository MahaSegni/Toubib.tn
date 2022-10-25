@extends('/admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-10 mx-auto">
            <form class="w-75 mx-auto" method="post" action="{{ route('services.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nom">Libelle</label>
                    <input type="text" class="form-control" id="libelle" name="libelle">
                    @error('libelle')
                    <div class="alert alert-danger mt-2">Le libelle est obligatoire</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    @error('description')
                    <div class="alert alert-danger mt-2">La description est obligatoire</div>
                    @enderror
                </div>
                <input type="hidden" value="{{$centre_id}}" name="centre_id">
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </form>
        </div>
    </div>
@endsection


