@extends('admin/layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifier Produit</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('produit.update', $produit->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nom">nom:</label>
                    <input type="text" class="form-control" name="nom" value={{ $produit->nom }} />
                    <label for="prix">Prix:</label>
                    <input type="number" class="form-control" name="prix" > {{ $produit->prix }}/>


                    <label for="image">Image:</label>
                    <input type="file" name="image" class="form-control" placeholder="image" id="imgInp">
                    @if($produit->image)
                        <img id="prview" src="{{asset('images/imagesProduit/'.$produit->image )}}"  width=100 height=100 />
                    @else
                        <img id="prview" src=""  style="visibility:hidden"  width=100 height=100 />
                    @endif

                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
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

