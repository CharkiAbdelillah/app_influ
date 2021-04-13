@extends('layout')
@section('content')
<h1>List of Posts</h1>

<ul>
@foreach($post1 as $pp)
<li>
    <!-- <h2>{{$pp->name}}</h2>
    <h2><a href="/test1/{{ $pp->id }}">{{$pp->name}}</a></h2> -->
    <h2><a href="{{ route('test1.show',$pp->id) }}">{{$pp->name}}</a></h2>
    <p>{{$pp->content}}</p>
    <em>{{$pp->created_at}}</em>
</li>
@endforeach


<!-- @forelse($post1 as $pp) -->
<!-- <li> -->
    <!-- <h2>{{$pp->name}}</h2>
    <h2><a href="/test1/{{ $pp->id }}">{{$pp->name}}</a></h2> -->
    <!-- <h2><a href="{{ route('test1.show',$pp->id) }}">{{$pp->name}}</a></h2>
    <p>{{$pp->content}}</p>
    <em>{{$pp->created_at}}</em>
</li> -->
<!-- @empty -->
 <!-- <p>No Post</p> -->
<!-- @endforelse -->
</ul>

@endsection