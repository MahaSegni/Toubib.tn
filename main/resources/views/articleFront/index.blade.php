@extends('client/layout')
<style>
    .height{
        height: 100vh;
    }
body{
    background: #d1d5db;
}
    .form{
        position: relative;

    }

    .form .fa-search{

        position: absolute;
        top:20px;
        left: 20px;
        color: #9ca3af;

    }

    .form span{

        position: absolute;
        right: 17px;
        top: 13px;
        padding: 2px;
        border-left: 1px solid #d1d5db;

    }

    .left-pan{
        padding-left: 7px;
    }

    .left-pan i{

        padding-left: 10px;
    }

    .form-input{

        height: 55px;
        text-indent: 33px;
        border-radius: 10px;
    }

    .form-input:focus{

        box-shadow: none;
        border:none;
    }



</style>
@section("cover")

@endsection

@section('content')
        <div class="album py-5 bg-light" style="margin-top: 100px">
            <div class="container">
                <div class="row">
                    <div class="input-group col-md-4">
                        <form  action="{{ asset('/article/FindArticlesByCatFront/'.$cat) }}" style="width:90% !important; margin-left:4%" >
                            <input class="form-control py-2 border-right-0 border"  name="search" value="{{ request('search') }}"  id="example-search-input">
                        </form>
                        <span class="input-group-append">
                            <form action="{{asset('/article/supprimerRecherche/'.$cat) }}">
                                <button class="btn btn-outline-primary border-left-0 border btn-delete" type="submit" style="height:42px;">
                                    <i class="fa fa-close"></i>
                                </button>
                            </form>
                        </span>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="myTable">
                    @forelse($articles as $a)
                    <div class="col">
                        <div class="card shadow-sm">
                            @if($a->image !=null)
                                <img src="{{asset('images/imagesArticle/'.$a->image)}}" width="100%" height="250">
                            @else
                                <img src="{{asset('images/noImageAvailable.png')}}" width="100%" height="250">
                            @endif
                            <div class="card-body">
                                <p class="text-capitalize">{{$a->titre}}</p>
                                <p class="card-text col-12 text-truncate">{{$a->texte}}...</p>
                                @php
                                    $note=App\Http\Controllers\NoteController::calculMoyenne($a->id);
                                @endphp
                                @if($note!=0)
                                   <div> @include('note/indexMoyenne', ['note' => $note])</div>
                                @else
                                    <div style="visibility: hidden"> @include('note/indexMoyenne', ['note' => $note])</div>
                                @endif
                                <div class="d-flex justify-content-between align-items-center">
                                    <a style="margin-left:0 !important;" href="{{asset('/article/showFront/'.$a->id)}}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Afficher la suite</span></a>
                                    <small class="text-muted">{{$a->created_at->format('Y-m-d')}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                        @empty
                            <li class="list-group-item list-group-item-danger">Aucun article trouvé</li>
                        @endforelse
                </div>
            </div>
        </div>

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
            .parent1 {text-align: start;}
            .child1 {display: inline-block;vertical-align:top;}
        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection
