@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')
<h3><b><center>Manage Events</center></b></h3>
<div class="box-body" id="show_event_list">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        @if(isset($event_list))
        @foreach($event_list as $key => $value)

        <div class="panel panel-default" id="removal">
            <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">

                        <span class="text">{{$value->title}}</span>
                    </a>
                    <!-- General tools such as edit or delete-->
                    <span class="tools pull-right">
                        {!! date('d - m - Y',strtotime($value->created_at))!!} &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-edit event_edit" name="{{$value->id}}"></i>
                        <i class="fa fa-trash-o event_delete" name="{{$value->id}}"></i>
                    </span>
                </h4>
            </div>
            <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                <div class="panel-body">
                    <?php $description = strip_tags($value->description); ?>
                    <p>event Title:{{$value->title}}</p>
                    <p>event Description:{!!$value->description!!}</p> 
                    <p>event Start:{{date("d/m/Y h:i:s", strtotime($value->start_time))}}</p>
                    <p>event End:{{date("d/m/Y h:i:s", strtotime($value->end_time))}}</p>
                    <img class="img-responsive pad" src="{{$value->photo}}" alt="Photo">             
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading">
                <h4 class="panel-title">
                    <span class="text">No Language Keys</span>
                </h4>
            </div>
        </div>
        @endif
    </div>
</div>
<section class="content" id="show_event_list_edit">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Add Events</h3>
                </div><!-- /.box-header -->
                {!! Form::open(array('url' => 'saveevent','files' => true)) !!} 
                {{ csrf_field() }}
                <div class="box-body">


                    <div class="form-group">
                        <label>Enter event Title</label>
                        <input type="text" id="event_title" name="event_title" class="form-control"
                               value="{{ old('event_title') }}" placeholder="event Title" >

                        @if ($errors->has('event_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('event_title') }}</strong>
                        </span>
                        @endif 

                    </div> 

                    <div class="form-group">
                        <label>Enter event Description</label>
                        <textarea id="event_description" name="event_description" class="form-control to_ck">
            {{ old('event_description') }}</textarea>

                        @if ($errors->has('event_description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('event_description') }}</strong>
                        </span>
                        @endif 

                    </div> 


                    <div class="form-group">
                        <label>Date and time range:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" class="form-control pull-right reservation" id="event_reservation"
                                   name="event_reservation">
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->

                    <div class="form-group">
                        <label>Upload Event Image</label>
                        <input type="file" name="event_image" class="form-control" id="event_image">
                        @if ($errors->has('event_image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('event_image') }}</strong>
                        </span>
                        @endif 
                    </div>
                </div> <!-- /.box-body -->
                <div class="box-footer">
                    <input type="submit" value="Save event" class="btn btn-primary"/>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</section>



@endsection