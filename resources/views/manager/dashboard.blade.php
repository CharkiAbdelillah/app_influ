
@extends('layouts.master')
@section('title')
  Dashboard admin
@endsection

@section('content')

<div class="row" id="app">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">La liste des influenceurs


                  <div id="app">
                  
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <influenceur-component></influenceur-component>
                  </div>
                </div>

                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')

@endsection
