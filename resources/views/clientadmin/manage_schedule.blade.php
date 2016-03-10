@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Opening Hours & Days</center></b></h3>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {!! Form::open(array('url' => 'saveschedule')) !!} 
                <div class="box-body pad">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea id="schedule_info" name="schedule_info" rows="10" cols="80" class="to_ck">
                                   @if(isset($schedule_info)) {{$schedule_info->schedule_info}} @endif
                        </textarea>
                        @if ($errors->has('schedule_info'))
                        <span class="help-block">
                            <strong>{{ $errors->first('schedule_info') }}</strong>
                        </span>
                        @endif 
                    </div>
                </div>
                <div class="box-footer form-group">
                    <button type="Save" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div><!-- /.col-->
    </div><!-- ./row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {!! Form::open(array('url' => 'scheduling_time')) !!} 
                <div class="box-body pad">
                    {{ csrf_field() }}
                    <div class="form-group col-xs-3">
                        <label for="exampleInputPassword1">Select Day</label>
                        {!! Form::select('day',array('Mon'=>'Monday','Tue' => 'Tuesday','Wend'=>'wednesday','Thu' => 'Thursday','Fri'=>'Friday','Sat' => 'Saturday','Sun' => 'Sunday'),'',array('id'=>'day_status',"class"=>"form-control")) !!}
                    </div>
                    <?php
                    for ($i = 1; $i < 25; $i++) {
                        $hours[$i] = $i;
                    }
                    for ($i = 0; $i < 60; $i++) {
                        if ($i < 10)
                            $min["0".$i] = "0" . $i;
                        else
                            $min[$i] = $i;
                    }
                    ?>
                    <div class="form-group col-xs-3">
                        <label for="exampleInputPassword1">Starting Time</label>
                        {!! Form::select('stime',$hours,'',array('id'=>'stime',"class"=>"form-control")) !!}
                    </div>
                    <div class="form-group col-xs-3">
                        <label for="exampleInputPassword1">Closing Time</label>
                        {!! Form::select('ctime',$min,'',array('id'=>'ctime',"class"=>"form-control")) !!}
                    </div>
                    <div class="form-group col-xs-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                {!! Form::close() !!}
                
                
            </div>
        </div><!-- /.col-->
    </div>
</section>

@endsection