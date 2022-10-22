@extends('client/layout')
<style>
    .parent1 {
        text-align: start;
    }
    .child1 {
        display: inline-block;
        vertical-align:middle;

    }
    .container3 {
        border-radius:1%;
        border:1px solid #1977CC;
        box-shadow:2px 2px #1977CC;
        background-color: rgb(255,255,255);
        margin-top: 150px;
    }

</style>
@section("cover")
@endsection
@section('content')
        <div class="album py-5 bg-light" >
            <div class="container container3">
                <div class="parent1">
                    <div class="child1">
                        @if($note!=null)
                            @include('note/modifier', ['article' => $article,'note'=>$note])

                        @else
                            @include('note/create', ['article' => $article])
                        @endif

                    </div>
                    <div class="child1">
                        @if($note!=null)
                            <form action="{{ route('note.supprimer',["note"=>$note->id,"a"=>$article->id])}}" method="post">
                                @csrf
                                <button id="btn"  title="supprimer votre note "  type="submit"><i  class="fas fa-close text-danger ms-2"></i></button>
                            </form>
                        @endif
                    </div>
                    <h1 class=" child1 text-center mt-4 mb-4" style="margin-left:36%">
                        {{$article->titre}}
                        <small class="text-muted  "><h6>{{$article->created_at->format('Y-m-d')}}</h6></small>
                    </h1>

                </div>
                <div class="text-center mb-4">
                @if($article->image !=null)
                    <img src="{{asset('images/imagesArticle/'.$article->image)}}" width="1000px" height="400px">
                @endif
                </div>
                <p class="mb-4">{{$article->texte}}</p>
                <div class="text-center mb-4">
                @if($article->video !=null)
                    <video  controls src="{{asset('videos/videosArticle/'.$article->video)}}" width="1000px" height="400px"/>
                @endif
                </div>


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <hr class="my-0" />
                @include('Comments/create', ['article' => $article])

                @include('Comments/index', ['article' => $article,'commentaires'=>$commentaires])


            </div>
        </div>



@endsection
