
@extends('layouts.master')
@section('title')
  Dashboard admin
@endsection

@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">La liste des clients</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Créé à</th>
                      <th>Mettre à jour</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </thead>
                    <tbody>
                    @foreach($users1 as $row)
                    @if($row->is_admin==0)
                      <tr>
                      <td>{{$row->name}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->created_at}}</td>
                      <td>{{$row->update_at}}</td>
                      <td>
                      <a href="#" class="btn btn-success">Modifier</a>
                      </td>
                      <td>
                      <a href="#" class="btn btn-danger">Supprimer</a>
                      </td>
                      </tr>
                    @endif
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
</div>
@endsection

@section('scripts')

@endsection