@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Gallery</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'gallery_save','files'=>true,'role'=>"form")) !!}
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
                        <label for="exampleInputFile">Upload Photos</label>
                        {!! Form::file('image',$attributes = array("id"=>"exampleInputFile","name"=>'gallery')) !!}

                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
    @if(count($gallery)>0)

    <div class="row">
        @foreach($gallery as $value)
        <div class="col-lg-2 col-sm-3 col-xs-4 gallery"><img class="thumbnail img-responsive" src="{{asset($value->image_path)}}">
            <a class="btn btn-info btn-xs pull-right hidden img_delete" id='{{$value->id}}'>
                <span class="glyphicon glyphicon-remove"></span> Remove 
            </a>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
