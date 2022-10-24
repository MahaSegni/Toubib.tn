@extends('client/layout')
@section('content')
<main>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="col-sm-12 col-md-10 mx-auto">


    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifier réclamation</h1>

            <form method="post" action="{{ route('reclamations.update', $reclamation->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="titre">Objet</label>
                    <input type="text" class="form-control" id="objet" name="objet" value="{{ $reclamation->objet }}" />
                    @error('objet')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="texte">Message</label>
                    <input type="textarea"  class="form-control" name="message" id="message" value="{{ $reclamation->message }}"/>
                    <label for="image"> Capture</label>
                    <input type="file" name="image" class="form-control" placeholder="image" id="image">
                    @if($reclamation->image!=null)
                        <img id="prview" src="{{asset('images/imagesReclamations/'.$reclamation->image )}}"  width=100 height=100 />
                    @else
                        <img id="prview" src=""  style="visibility:hidden"  width=100 height=100 />
                        @endif
 </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
            </div></div></div></main>
@endsection
