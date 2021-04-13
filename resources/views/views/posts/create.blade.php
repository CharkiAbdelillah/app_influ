@extends('layout')
@section('content')
<from action='{{ route(test1.index)}}' methode='POST'>
    <div>
        <label for="title">Your title : </label>
        <input type="text" name="title">
        <label for="">Content : </label>
        <input type="text" name="content">
        <button type="submit">add post</button>
    </div>
</from>
@endsection