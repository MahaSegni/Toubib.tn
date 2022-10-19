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
                <hr class="my-0" style="height: 1px;" />

                <div class="card-body p-4">
                    <div class="d-flex flex-start">
                        <img class="rounded-circle shadow-1-strong me-3"
                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(33).webp" alt="avatar" width="60"
                             height="60" />
                        <div class="w-100">
                            <h6 class="fw-bold mb-1">Alexa Bennett</h6>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0">
                                    <?php $m=date("M")  ; $d=date("d"); $y=date("Y");?>
                                    {{$m}} {{$d}}, {{$y}}

                                    <span class="badge bg-danger">Rejected</span>
                                </p>
                                <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                            </div>
                            <textarea class="form-control w-100 mb-0 " aria-label="commentaire"  id="text" name="text"  rows="3"></textarea>


                        </div>
                    </div>
                </div>

                <hr class="my-0" style="height: 1px;" />

                <div class="card-body p-4">
                    <div class="d-flex flex-start">
                        <img class="rounded-circle shadow-1-strong me-3"
                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(33).webp" alt="avatar" width="60"
                             height="60" />
                        <div>
                            <h6 class="fw-bold mb-1">Alexa Bennett</h6>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0">
                                    March 24, 2021
                                    <span class="badge bg-danger">Rejected</span>
                                </p>
                                <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                            </div>
                            <p class="mb-0">
                                There are many variations of passages of Lorem Ipsum available, but the
                                majority have suffered alteration in some form, by injected humour, or
                                randomised words which don't look even slightly believable. If you are
                                going to use a passage of Lorem Ipsum, you need to be sure.
                            </p>
                        </div>
                    </div>
                </div>


        </div>
@endsection
