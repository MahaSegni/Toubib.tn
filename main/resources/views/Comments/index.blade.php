<style>
    .parent {
        text-align: center;
    }
    .child {
        display: inline-block;
        vertical-align:middle;

    }
    #imgInpc ,#vidInpc{
        display: none;

        margin-left: 1% !important ;
        margin-right: 1% !important ;
    }
    #labelimgc ,#labelvidc{
        cursor:pointer;

        margin-left: 4% !important ;
        margin-right: 4% !important ;
    }

    #btn {
        border: none;
        background: none;

    }
</style>
@foreach($commentaires as $c)
    <hr class="mb-1" style="height: 2px;" />

        <?php

        // Calculates the difference between DateTime objects
        $interval = date_diff($c->user->created_at, date_create (date('Y-m-d H:i:s')));
        ?>
    <div class="card-body p-4 w-100">
        <div class="d-flex flex-start w-100">
            <img class="rounded-circle shadow-1-strong me-3"
                 src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(33).webp" alt="avatar" width="60"
                 height="60" />
            <div class="w-100">
                <h6 class="fw-bold mb-1">{{$c->user->name}}</h6>

                <div class="d-flex align-items-center mb-3 ">


                    <p class="mb-0">
                        {{$c->updated_at->format('M d ,Y')}}
                        @if($interval->d<15)
                            <span class="badge bg-success">New Member</span>
                        @endif
                    </p>
                    <a  data-bs-toggle="collapse" href="#c{{$c->id}}" aria-expanded="false" title="modifier" aria-controls="#c{{$c->id}}" ><i  class="fas fa-pencil-alt ms-2"></i></a>

                    <form action="{{ route('commentaire.supprimer',["commentaire"=>$c->id,"a"=>$article->id])}}" method="post">
                        @csrf
                        <button id="btn"  title="supprimer"  type="submit"><i  class="fas fa-trash-alt text-danger ms-2"></i></button>
                    </form>
                </div>
                <p class="mb-2 ">
                    {{$c->texte}}
                </p>
                <div class="parent">
                    @if($c->image !=null)
                        <img class="child " src="{{asset('images/imagesCommentaire/'.$c->image)}}" width="250" height="200"/>

                    @endif
                    @if($c->video !=null)
                             <video class='child'  style="box-shadow: none" controls src="{{asset('videos/videosCommentaire/'.$c->video)}}" width="250" height="200"></video>

                    @endif
                </div>

                @include('Comments/edit', ['article' => $article,'c'=>$c])


            </div>
        </div>
    </div>

@endforeach
