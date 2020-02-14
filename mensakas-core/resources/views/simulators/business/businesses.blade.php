@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Bussinesses in yor city'])
@endsection

@section('content')
{{ $br }}

@foreach ($b as $bb)
{{ $bb->active }}

@endforeach
@endsection
