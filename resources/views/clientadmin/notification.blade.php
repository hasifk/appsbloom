@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<h3><b><center>Manage Push Notification</center></b></h3>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- TO DO List -->
            <div class="box box-primary" >
                <div class="box-header with-border">
                    <h3 class="box-title"><input type="checkbox" id="selectall"/> Notifications</h3>
                    <div class="box-tools pull-right">
                            <?php echo $notification->links(); ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if(count($notification)>0)
                        @foreach($notification as $value)
                        <?php $info=strip_tags($value->notification); ?>
                        <div class="panel panel-default" id="removal">
                            <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">

                                        <span class="text"><input type="checkbox" class="checkbox" name="check[]" value="{{$value->id}}" id="{{$value->id}}"/> {!!Str::limit($info,50)!!}</span>
                                    </a>
                                    <!-- General tools such as edit or delete-->
                                    <span class="tools pull-right">
                                        <a href="<?php echo url('update-notification/'.$value->id) ?>"><i class="fa fa-edit"></i></a>
                                        <i class="fa fa-trash-o notification_delete" id="{{$value->id}}"></i>
                                    </span>
                                </h4>
                            </div>
                            <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                                <div class="panel-body">
                                    {!!$value->notification!!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading">
                                <h4 class="panel-title">
                                        <span class="text">No Notifications</span>
                                </h4>
                            </div>
                        </div>
                        @endif
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <a href="#notification_add"> <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button></a>
                </div>
            </div><!-- /.box -->
        </div>
    </div>


    <div class="row" id='notification_add'>
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Push Notifications</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'notification_save')) !!}
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
                        <label for="exampleInputPassword1">Notifications</label>
                        {{ Form::textarea('notification','',['id' => 'offer_info','class'=>'to_ck']) }}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>



</section>
@endsection
