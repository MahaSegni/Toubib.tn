<style>
    .parent {
        text-align: center;
    }
    .child {
        display: inline-block;
        margin-left: 1% !important ;
        margin-right: 1% !important ;
        margin-bottom: 1% !important;
        margin-top: 1% !important;


    }
    .imgInpc {
        display: none;

        margin-left: 1% !important ;
        margin-right: 1% !important ;
    }
    .labelimgc {
        cursor:pointer;

        margin-left: 4% !important ;
        margin-right: 4% !important ;

    }
</style>
<form class="collapse w-100 card-body p-4 "   id="c{{$c->id}}" method="post" action="{{ asset('/commentaire/modifier/'.$article->id.'/'.$c->id) }}" enctype="multipart/form-data">
    @csrf

    <div class="w-100">
        <textarea class="form-control w-100 mb-0 "   aria-label="commentaire"  id="text" name="texte"  rows="3">{{$c->texte}}</textarea>


        <div class="parent">
            <label id="labelimgc.{{$c->id}} " for="imgInp.{{$c->id}}" class="labelimgc" >
                <i class="fa fa-2x fa-camera"></i>
                <input type="file" name="image" class="form-control imgInpc" placeholder="image" id="imgInp.{{$c->id}}">
                <p>Ajouter une image</p>
            </label>
            <label id="labelvidc.{{$c->id}}" for="vidInp.{{$c->id}}"  class="labelimgc">
                <i class="fa fa-2x fa-video-camera" aria-hidden="true"></i>
                <input type="file" name="video" class="form-control imgInpc" placeholder="video" id="vidInp.{{$c->id}}">
                <p>Ajouter une video</p>
            </label>
        </div>






    </div>
    <button class="btn right  blue-grey darken-4" style="margin-left: 100% !important;" type="submit"><i class="material-icons right">reply</i>Commenter</button>
</form>


