@extends('/admin/layout')
@section('content')

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h4 align="center">Modifier réclamation</h4>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <div class="col-sm-12 col-md-10 mx-auto">

                    <form class="w-75 mx-auto" method="post" action="{{ route('reponse.update', $reclamation->id) }}"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            @if ($reclamation->image != null)
                            <img src="{{ asset('images/imagesReclamations/'.$reclamation->image) }}" alt="tag" width="300px" height="300px">
                            @else
                            <img src="{{ asset('images/imagesReclamations/R.png') }}" alt="tag" width="1000px" height="300px">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nom">Objet</label>
                            <input type="text" class="form-control" value="{{$reclamation->objet}}" disabled="disabled">
                        </div>
                        <div class="form-group">
                            <label for="nom">Message</label>
                            <input type="text" class="form-control" value="{{$reclamation->message}}" disabled="disabled">
                        </div>
                        <div class="form-group">
                            <label for="nom">Réponse</label>
                            <input type="text" class="form-control" id="reponse" name="reponse">
                        </div>

                        <div class="form-group">
                            <label for="image">Capture</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        @endsection
