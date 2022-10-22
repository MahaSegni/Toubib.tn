@extends('admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifier réclamation</h1>

            <form method="post" action="/reclamationmodifier" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="titre">Objet</label>
                    <input type="text" class="form-control" id="objet" name="objet" value={{ $reclamation->objet }} />
                    @error('objet')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="texte">Message</label>
                    <textarea  class="form-control" name="message" id="message" value={{ $reclamation->message }} />
                    <label for="image"> Capture</label>
                    <input type="file" name="image" class="form-control" placeholder="image" id="image">
                    @if($reclamation->image)
                        <img id="prview" src="{{asset('images/imagesReclamations/'.$reclamation->image )}}"  width=100 height=100 />
                    @else
                        <img id="prview" src=""  style="visibility:hidden"  width=100 height=100 />
                    @endif
 </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>

@endsection
