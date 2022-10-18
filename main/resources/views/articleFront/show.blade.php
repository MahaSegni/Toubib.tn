@extends('client/layout')

@section('content')
        <div class="album py-5 bg-light">
            <div class="container">
                <h1 class="text-center mb-4">
                    {{$article->titre}}
                    <small class="text-muted  "><h6>{{$article->created_at->format('Y-m-d')}}</h6></small>
                </h1>
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
            </div>
        </div>
@endsection
