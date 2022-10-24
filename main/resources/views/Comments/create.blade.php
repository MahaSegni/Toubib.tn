<style>
    .parent {
        text-align: center;
    }
    .child {
        display: inline-block;
        vertical-align:middle;

    }

    .parent1 {
        text-align: start;
    }
    .child2 {
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

</style>
<div class="parent1">
    <div class="child2 text-start" style="width: 10% ; margin-left: 2% !important;">
        @php
            $note=App\Http\Controllers\NoteController::calculMoyenne($article->id);
        @endphp
        @if($note!=0)

            <div style="border: 2px solid whitesmoke;text-align: center;  padding-top:6%; padding-bottom:6%; background-color: #F5F5F5" >
                <p style="font-family: Arial ;color:#FFCC00; text-align: center"  >{{$note}}/5</p>
                @include('note/indexMoyenne', ['note' => $note])
                <p style="font-family: Arial ;color:#1977CC; text-align: center"  >{{$count}} avis</p>
            </div>

        @else
            <div style="visibility: hidden"> @include('note/indexMoyenne', ['note' => $note])</div>
        @endif
    </div>

    <div class="child2" style="   width: 80% !important;">



<form class="card-body p-4"  method="post" action="{{ asset('/commentaire/ajouter/'.$article->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-start">
        <img class="rounded-circle shadow-1-strong me-3"
             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(33).webp" alt="avatar" width="60"
             height="60" />
        <div class="w-100">
            <?php

            // Calculates the difference between DateTime objects
            $interval = date_diff(auth()->user()->created_at, date_create (date('Y-m-d H:i:s')));
            ?>


            <h6 class="fw-bold mb-1 text-start" style="margin-left:0%">Alexa Bennett</h6>
            <div class="d-flex align-items-center mb-3">
                <p class="mb-0">
                    <?php $m=date("M")  ; $d=date("d"); $y=date("Y");?>
                    {{$m}} {{$d}}, {{$y}}
                    @if($interval->d<15)
                        <span class="badge bg-success">New Member</span>
                    @endif
                </p>


            </div>
            <textarea class="form-control w-100 mb-4 "   aria-label="commentaire"  id="text" name="texte" rows="3"></textarea>
            <?php
            $test=false
            ?>

        <div class="parent">
            <img  class="child" style="display:none"   id="prviewc" src=""  width="200" height="150"/>
           <div class="child"> <video  style="display:none"  id="prviewVidc" controls width="200" height="150" src=""/></div>
        </div>
        <div class="parent">
            <label id="labelimgc" for="imgInpc" >
            <i class="fa fa-2x fa-camera"></i>
            <input class="child" type="file" name="image"    class="form-control" placeholder="image" id="imgInpc">
               <p>Ajouter une image</p>
            </label>
            <label id="labelvidc" for="vidInpc" >
                <i class="fa fa-2x fa-video-camera" aria-hidden="true"></i>
            <input class="child" type="file" name="video" class="form-control" placeholder="video" id="vidInpc">
                <p>Ajouter une video</p>
            </label>
        </div>




        </div>
    </div>
    <button class="btn right  blue-grey darken-4" style="margin-left: 90% !important;" type="submit"><i class="material-icons right">reply</i>Commenter</button>

    <script>
        imgInpc.onchange = evt => {
            $test=true;
            const [file] = imgInpc.files
            if (file) {
                prviewc.style.display = 'inline';
                prviewc.src = URL.createObjectURL(file)
            }
        }
    </script>
    <script>
        vidInpc.onchange = evt => {
            $test=true;
            const [file] = vidInpc.files
            if (file) {
                prviewVidc.style.display = 'inline';
                prviewVidc.src = URL.createObjectURL(file)
            }
        }
    </script>
</form>
    </div>

</div>
