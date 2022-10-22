@extends('/admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Ajouter Réclamation</h1>
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
                    <form class="w-75 mx-auto" method="post" action="{{ route('reclamations.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nom">objet</label>
                            <input type="text" class="form-control" id="objet" name="objet">
                        </div>
                        <div class="form-group">
                            <label for="gouvernorat">message</label>
                            <input type="text" class="form-control" id="message" name="message">
                        </div>

                        <div class="form-group">
                            <label for="image">Capture</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        @endsection
