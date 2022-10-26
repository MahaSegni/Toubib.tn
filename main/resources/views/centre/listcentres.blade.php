@extends('/client/layout')
@section('cover')
    <div style="margin: 150px 0px "></div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($listCentres as $centre)
                <div class="col-sm-12 col-md-4">
                    <div class="my-5">
                        <div class="card" style="width: 22rem;">
                            <img src="{{ asset('images/imagesCentre/'.$centre->image) }}" alt="centre">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{$centre->nom}}</b></h5>
                                <h6>Gouvernorat : {{$centre->gouvernorat}}</h6>
                                <h6>Adresse : {{$centre->adresse}}</h6>
                                <h6>Téléphone : {{$centre->telephone}}</h6>
                                <a href={{route("usercentreshow",$centre->id)}} class="btn btn-primary">Consulter</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
