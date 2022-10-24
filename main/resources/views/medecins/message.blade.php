@extends('client.layout')
@section('cover')
<section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to Toubib.tn</h1>
     
     
    </div>
  </section>
@endsection
@section('content')
<section id="appointment" class="appointment section-bg" style="background-color: white">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth
            @if(Auth::user()->type=="user")
            <div class="alert alert-warning" role="alert">
               {{ $msg }}
            </div>
            @elseif(Auth::user()->type=="medecin")
            <div class="alert alert-primary" role="alert">
                {{ $msg }}
              </div>
              <a href='#' class="btn btn-primary" style="background-color: #2C4964">
                {{ __(' Mon espace medecin ') }}
              </a>
            @endif
            @endauth           
    </div>
</div>
</section>

@endsection
