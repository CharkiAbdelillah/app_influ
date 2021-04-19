
@extends('layouts.master')
@section('title')
  Dashboard admin
@endsection

@section('content')

<div class="row" id="app">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">La liste des managers


                  <div id="app">
                    {{-- <p>
                    <input type="text" placeholder="recherche" v-model="search" class="form-control-lg offset-8">
                      <input type="text" :value="msg"> 
                      
                    </p> --}}
                  
                  {{-- <br> --}}
                  
                  
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <search-component></search-component>
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
