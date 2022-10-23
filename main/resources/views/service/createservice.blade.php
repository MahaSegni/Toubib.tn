@extends('/client/layout')
@section('cover')
    <div style="margin: 150px 0px "></div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-10 mx-auto">
            <form class="w-75 mx-auto" method="post" action="{{ route('storeservice') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nom">Libelle</label>
                    <input type="text" class="form-control" id="libelle" name="libelle">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>
                <input type="hidden" value="{{$centre_id}}" name="centre_id">
                <button type="submit" class="btn btn-primary my-2">Submit</button>
            </form>
        </div>
    </div>
@endsection


