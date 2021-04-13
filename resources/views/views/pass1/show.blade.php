@extends('layout')
@section('content')
<?php
// {{ $data['title'] }}
foreach($data as $key => $value){
    echo "$key\n";
    foreach($value as $key => $val){
        echo "$val";
    }
}
?>

<br><h1>attack : {!!$author!!}<h1>
<br><h1>{{$author}}<h1>
<h1><?php echo "\n$author";?></h1>
@endsection