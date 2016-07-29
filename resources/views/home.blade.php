@extends('layouts.master')

@section('style')
  @parent
  <style>
    .navbar.transparent.navbar-inverse .navbar-inner {
      background: rgba(0,0,0,0.4);
    }
  </style>
@stop

@section('content')
 welcome!
@stop
