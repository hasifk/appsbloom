@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Select App-Type</center></b></h3>
    <div class="col-md-6">
    <div class="form-group">
             @if(isset($app_types))

                 {!! Form::open(array('url' => 'tologin')) !!} 
                    <select class="form-control select2" style="width: 100%;">
                    @foreach($app_types as $key=>$value)
                      <option>{{$value->type}}</option>
                    @endforeach
                    </select>
                 <input type="submit" value="GO" />
                 {!! Form::close() !!}
                 @endif
                  </div>
                  </div>
@endsection