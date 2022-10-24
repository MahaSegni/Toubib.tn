@extends('client/layout')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-10 mx-auto">
            @if($centre!=null)
                <img class="col-12" src="{{ asset('images/imagesCentre/'.$centre->image) }}" alt="tag" width="1000px" height="300px">
                <div class="my-5">
                    <h1 style="text-align: center"><b>{{$centre->nom}}</b></h1>
                </div>
                <div class="mb-5">
                    <p>{{$centre->description}}</p>
                </div>
                <div class="mb-5">
                    <h5><b>Gouvernorat : </b>{{$centre->gouvernorat}}</h5>
                    <h5><b>Adresse : </b>{{$centre->adresse}}</h5>
                    <h5><b>Téléphone : </b>{{$centre->telephone}}</h5>
                </div>
                <div class="mb-5">
                    <h1 style="text-align: center"><b>Nos Services</b></h1>
                </div>

                <div>
                    <button class="btn btn-primary" type="submit" style="color: white"><a style="color: white" href = {{url('editcenter/'.$centre->id)}}>Modifier mon centre</a></button>
                </div>
                <div>
                    @foreach($listServices as $s)
                        <div class="row my-5">
                            <div class="col-12">
                                <h1><b>{{$s->libelle}} :</b></h1>
                            </div>
                            <div class="col-12 mt-2">
                                <p>{{$s->description}}</p>
                            </div>
                            <div class="col-sm-12 d-flex flex-row justify-content-end">
                                <button class="btn btn-success me-2" type="submit"><a style="color: white" href = {{url('editservice/'.$s->id)}}>Modifier</a></button>
                                <form action="{{route("destroyservice",$s->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" style="color: white">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="my-2">
                    <button class="btn btn-primary" type="submit" style="color: white"><a style="color: white" href = {{url('createcenterservice/'.$centre->id)}}>Ajouter un service</a></button>
                </div>
            @endif
        </div>
    </div>

@endsection
