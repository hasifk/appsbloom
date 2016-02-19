@extends('clientadmin.layouts.client_dashboard_layout')

@section('videos')

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Video</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'video_save','files'=>true,'role'=>"form")) !!}
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
                        <label for="exampleInputFile">Attach Videos</label>
                        {!! Form::text('video','',array("name"=>'video',"class"=>"form-control","placeholder"=>"www.youtube.com/embed/ePbKGoIGAXY")) !!}

                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
    @if(count($video)>0)
    <div class="row">
        
            @foreach($video as $value)
            <div class="col-lg-3 col-sm-3 col-xs-4 gallery">
         
                <div class="flex-video widescreen">
                    <iframe allowfullscreen="" src="{{asset($value->video_path)}}" frameborder="0" width="250"></iframe>
                </div>
                <a class="btn btn-info btn-xs pull-right hidden vid_delete" id='{{$value->id}}'>
                    <span class="glyphicon glyphicon-remove"></span> Remove 
                </a>
        
                </div> 
            @endforeach
        
    </div>

    @endif
</div>
@endsection
