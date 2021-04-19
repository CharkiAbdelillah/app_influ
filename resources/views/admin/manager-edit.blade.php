
@extends('layouts.master')
@section('title')
Edit-Manager
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Modifier les informations de <strong>{{$users2->name}}</strong></h1>
                    </div>
                    <div class="card-body">
                       {{-- <div class="row">
                           <div class="col-md-6"> --}}
                            <form action="/admin/manager-update/{{$users2->id}}" method="post">
                                {{-- {{csrf_field()}}
                                {{method_field('PUT')}} --}}
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"  value="{{$users2->name}}" name="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email"  value="{{$users2->email}}" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="password"  name="d" value="{{$users2->password}}" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Modifier</button>
                                <a href="/admin/gestion_manger" class="btn btn-danger">Retour</a>
                            </form>
                           {{-- </div>
                       </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
