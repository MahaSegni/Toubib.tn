@extends('client/layout')

@section('content')
    <main>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="col-sm-12 col-md-10 mx-auto">
                    <h5 class="w-75 mx-auto">Réclamation</h5>
                </div>
            <div>

                <div class="col-sm-12 col-md-10 mx-auto">
                    <form class="w-75 mx-auto" method="post" action="{{ route('reclamations.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nom">objet</label>
                            <input type="text" class="form-control" id="objet" name="objet">
                        </div>
                        @error('objet')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="gouvernorat">message</label>
                            <textarea type="text" class="form-control" id="message" name="message"></textarea>
                        </div>
                        @error('message')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="image">Capture</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>

    </main>

@endsection
