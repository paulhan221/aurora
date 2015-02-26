@extends('layout.master')

@section('main_content')

<a href ="#"> Add New App <span class="glyphicon glyphicon-plus"></span> </a>

@if ($keys)
  @foreach($keys as $key)
    <div class = "well" >
     <dt class="control-label col-sm-2"><strong> App ID </strong> </dt>
     <dl> {{ $key['app_id'] }} </dl>
     <dt class="control-label col-sm-2"><strong> API Key </strong> </dt>
     <dl> {{ $key['api_key'] }} </dl>
    </div>
  @endforeach
@endif

@stop
