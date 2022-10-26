@extends('/client/layout')
@section('cover')
    <div style="margin: 150px 0px "></div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($produits as $p)
                <div class="col-sm-12 col-md-4">
                    <div class="my-5">
                        <div class="card" style="width: 22rem;">
                            <img src="{{ asset('images/imagesProduit/'.$p->image) }}" alt="centre" style="width: 350px; height:230px;">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{$p->nom}}</b></h5>
                                <p class="card-text">Prix : {{$p->prix}} DT </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
