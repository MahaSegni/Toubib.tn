@extends('/admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-10 mx-auto">
            <form class="w-75 mx-auto" method="post" action="{{ route('centres.update',$centre->id) }}">
                {!! csrf_field() !!}
                @method("PATCH")
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$centre->nom}}">
                </div>
                <div class="form-group">
                    <label for="gouvernorat">Gouvernorat</label>
                    <input type="text" class="form-control" id="gouvernorat" name="gouvernorat" value="{{$centre->gouvernorat}}">
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" value="{{$centre->adresse}}">
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="number" class="form-control" id="telephone" name="telephone" value="{{$centre->telephone}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{$centre->description}}</textarea>
                </div>
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="user">
                        <option selected value="{{$centre->user_id}}">{{$email}}</option>
                        @foreach($listUsers as $u)
                            @if ($u->email != $email)
                                {
                                    <option value="{{$u->id}}">{{$u->email}}</option>
                                }
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection


