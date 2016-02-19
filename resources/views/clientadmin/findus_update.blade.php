@extends('clientadmin.layouts.client_dashboard_layout')
@section('find-us')

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<div class="container-fluid">
    <div class="row">
        
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Example</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'coordinates_save','files'=>true,'role'=>"form")) !!}
                <div class="box-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                 {!! Form::text('location',$location[0]->place,array("id"=>"location","class"=>"form-control","placeholder"=>"Cronulla Beach")) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Latitude</label>
                 {!! Form::text('lat',$location[0]->lat,array("id"=>"lat","class"=>"form-control","placeholder"=>"-33.923036")) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Longitude</label>
                {!! Form::text('long',$location[0]->long,array("id"=>"long","class"=>"form-control","placeholder"=>"151.274856")) !!}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    {!! Form::hidden('id',$location[0]->id) !!}
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
    
</div>
@endsection