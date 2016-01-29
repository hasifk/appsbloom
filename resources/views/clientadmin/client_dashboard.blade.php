@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')
{{Auth::user()->name}}
<h3><b><center>Success!!!!</center></b></h3>

@endsection