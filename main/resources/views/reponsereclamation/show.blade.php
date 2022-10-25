@extends('client/layout')
@section('content')

<main>

    <div class="album py-5 bg-light">
        <div class="container">
            <h4 align="center">Détail réclamation</h4>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <div class="col">
                    <div class="card shadow-sm">
                        @if ($list->image)
                        <img id="prview"
                            src="{{ asset('images/imagesReclamations/' . $list->image) }}"
                            width=100 height=100 />
                    @else
                            <img src="{{asset('images/imagesReclamations/R.png')}}" width="100%" height="250">
                        @endif
                        <div class="card-body">
                            <h4 style="color: black"> Détail Réclamation : </h4>
                            <h6>Objet:   <span>{{$list->objet}}</span></h6>
                            <h6>Message:  <span>{{$list->message}}</span></h6>
                            <hr>
                            <h4 style="color: black"> Réponse : </h4>
                            @foreach ($reclamation as $reclamation)
                            <p class="text-capitalize">{{$reclamation->reponse }}</p>
            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>

@endsection
<style>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}
</style>
