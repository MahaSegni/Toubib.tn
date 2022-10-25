@extends('admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Ajouter produit</h1>
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
                <form method="post" action="{{ route('produit.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" name="nom" />
                        <label for="prix">Prix:</label>
                        <input type="number" step="0.01" class="form-control" name="prix"  />
                        <label for="categorie_id" >Categorie :</label>
                        <select name="categorie_id"  class="form-control">
                            @foreach($categorie as $cat)
                                <option  value="{{ $cat->id }}">{{ $cat->libelle }} </option>
                            @endforeach
                        </select>
                        <label for="image">Image:</label>
                        <input type="file" name="image" class="form-control" placeholder="image" id="imgInp">
                        <img style="visibility:hidden"  id="prview" src=""  width=100 height=100 />



                    </div>

                    <button type="submit" class="btn btn-primary-outline">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                prview.style.visibility = 'visible';
                prview.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
