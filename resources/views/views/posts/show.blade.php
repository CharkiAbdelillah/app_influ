@extends('layout')
@section('content')

    <h2>{{$pap->name}}</h2>
    <p>{{$pap->content}}</p>
    <em>{{$pap->created_at}}</em>
    <p>Status:
    @if($pap->active)
        Enabled
    @else
        Disabled
    @endif
    </p>
@endsection