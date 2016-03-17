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
                                   @if(isset($schedule['schedule_info'])) {{$schedule['schedule_info']->schedule_info}} @endif
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
                    <div class="form-group col-xs-2">
                        <label for="exampleInputPassword1">Select Day</label>
                        {!! Form::select('day',array('Mon'=>'Monday','Tue' => 'Tuesday','Wed'=>'wednesday','Thu' => 'Thursday','Fri'=>'Friday','Sat' => 'Saturday','Sun' => 'Sunday'),'',array('id'=>'day_status',"class"=>"form-control")) !!}
                    </div>
                    <?php
                    for ($i = 1; $i < 25; $i++) {
                        $hours[$i] = $i;
                    }
                    for ($i = 0; $i < 60; $i++) {
                        if ($i < 10)
                            $min["0" . $i] = "0" . $i;
                        else
                            $min[$i] = $i;
                    }
                    ?>
                    <div class="form-group col-xs-2">
                        <label for="exampleInputPassword1">Starting Hour</label>
                        {!! Form::select('shour',$hours,'',array('id'=>'shour',"class"=>"form-control")) !!}
                    </div>
                    <div class="form-group col-xs-2">
                        <label for="exampleInputPassword1">Minute</label>
                        {!! Form::select('smin',$min,'',array('id'=>'smin',"class"=>"form-control")) !!}
                    </div>
                    <div class="form-group col-xs-2">
                        <label for="exampleInputPassword1">Closing Hour</label>
                        {!! Form::select('ehour',$hours,'',array('id'=>'shour',"class"=>"form-control")) !!}
                    </div>
                    <div class="form-group col-xs-2">
                        <label for="exampleInputPassword1">Minute</label>
                        {!! Form::select('emin',$min,'',array('id'=>'smin',"class"=>"form-control")) !!}
                    </div>
                    <div class="form-group col-xs-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="box-body no-padding">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Opening Days and Time</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($schedule['schedule_time']) > 0):
                                $f = 1;
                                foreach ($schedule['schedule_time'] as $val):
                                    echo "<tr id=\"booking_$val->id\">";
                                    echo "<td>" . $f++ . "</td><td class=\"booking_focus\">" . $val->day_time . "</td>";
                                    ?>
                                <td class="booking_focus">
                                    <a class="schedule_time" id="<?php echo $val->id ?>"><i style="color:red" class="fa fa-fw fa-trash-o"></i></a>
                                </td>
                                <?php
                            endforeach;
                        else:
                            ?>
                            <tr><td colspan="6"> No Booking </td></tr>
                        <?php
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->


            </div>
        </div><!-- /.col-->
    </div>
</section>

@endsection