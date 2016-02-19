@extends('clientadmin.layouts.client_dashboard_layout')
@section('messages')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- TO DO List -->
            <div class="box box-primary" >
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Messages</h3>
                    <div class="box-tools pull-right">
                            <?php echo $message->links(); ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if(count($message)>0)
                        @foreach($message as $value)
                        <?php $info=strip_tags($value->message); ?>
                        <div class="panel panel-default" id="removal">
                            <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">

                                        <span class="text">{!!Str::limit($info,60)!!}</span>
                                    </a>
                                    <!-- General tools such as edit or delete-->
                                    <span class="tools pull-right">
                                        {!! date('d - m - Y',strtotime($value->created_at))!!} &nbsp;&nbsp;&nbsp;
                                        <a href="<?php echo url('update-message/'.$value->id) ?>"><i class="fa fa-edit"></i></a>
                                        <i class="fa fa-trash-o message_delete" id="{{$value->id}}"></i>
                                    </span>
                                </h4>
                            </div>
                            <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                                <div class="panel-body">
                                    {!!$value->message!!}
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading">
                                <h4 class="panel-title">
                                        <span class="text">No Messages</span>
                                </h4>
                            </div>
                        </div>
                        @endif
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <a href="#message_add"> <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button></a>
                </div>
            </div><!-- /.box -->
        </div>
</div>
<div class="row" id='message_add'>
        <!-- left column -->
    <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Messages</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'message_save')) !!}
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
                        <label for="exampleInputPassword1">Messages</label>
                        {{ Form::textarea('message','', ['id' => 'ck_editor']) }}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</div>
@endsection