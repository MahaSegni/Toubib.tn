@extends('client/layout')
@section("cover")

@endsection

@section('content')


        <div class="album py-5 bg-light" style="margin-top: 100px">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($articles as $a)
                    <div class="col">
                        <div class="card shadow-sm">
                            @php

                                $note=App\Http\Controllers\NoteController::calculMoyenne($a->id);
                            @endphp
                            @if($note!=0)
                            @include('note/indexMoyenne', ['note' => $note])
                            @endif
                            @if($a->image !=null)
                                <img src="{{asset('images/imagesArticle/'.$a->image)}}" width="100%" height="250">
                            @else
                                <img src="{{asset('images/noImageAvailable.png')}}" width="100%" height="250">
                            @endif
                            <div class="card-body">
                                <p class="text-capitalize">{{$a->titre}}</p>
                                <p class="card-text col-12 text-truncate">{{$a->texte}}...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a style="margin-left:0 !important;" href="{{asset('/article/showFront/'.$a->id)}}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Afficher la suite</span></a>
                                    <small class="text-muted">{{$a->created_at->format('Y-m-d')}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>



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
