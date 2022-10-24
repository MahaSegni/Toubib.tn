@extends('admin/layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Medecin</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Gouvernorat</td>
                    <td>Adresse</td>
                    <td>specialite</td>
                    <td>tell</td>
                    <td>User</td>
                    <td colspan =2 class="text-center">Actions</td>
                </tr>
                </thead>
                <tbody>

                @foreach($listemed as $med)
                    <tr>
                        <td>{{$med->gouvernorat}}</td>
                        <td>{{$med->adresse}}</td>
                        <td>{{$med->specialite}}</td>
                        <td>{{$med->tell}}</td>
                        <td>{{$med->email}}</td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
@endsection
