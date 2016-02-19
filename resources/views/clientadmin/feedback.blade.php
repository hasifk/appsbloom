@extends('clientadmin.layouts.client_dashboard_layout')
@section('feedback')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- TO DO List -->
            <div class="box box-primary" >
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Feedback</h3>
                    <div class="box-tools pull-right">
                        <?php
                        echo $feedback->links();
//                        print_r($feedback[0]->feedback_reply);
//                        echo $feedback[0]->feedback_reply[1]->created_at;
//                        exit;
                        ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if(count($feedback)>0)
                        @foreach($feedback as $value)
                        <?php $info = strip_tags($value->feedback); ?>
                        <div class=" panel panel-default" id="removal">
                            <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">
                                        <span class="text">{!!Str::limit($info,40)!!}</span>
                                    </a>
                                    <!-- General tools such as edit or delete-->
                                    <span class="tools pull-right">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}"><i class="fa fa-reply feedback_replay"></i></a>&nbsp;&nbsp;
                                        {!! Form::select('status',array('0'=>'Pending','1' => 'Approved','-1'=>'Delete'),$value->status,array('id'=>$value->id,'class'=>'feedback_status')) !!}
                                    </span>
                                </h4>
                            </div>
                            <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                                <div class="panel-body direct-chat-primary ">
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left">{{$value->email}}</span>
                                            <span class="direct-chat-timestamp pull-right">{{ date('d M, Y H:m A', strtotime($value->created_at)) }}</span>
                                        </div><!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="{{asset('assets/clientassets/images/man.png')}}" alt="message user image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {!!$value->feedback!!}
                                        </div><!-- /.direct-chat-text -->
                                    </div>
                                    @if(!empty($value->feedback_reply))
                                    @foreach($value->feedback_reply as $val)
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right">Admin</span>
                                            <span class="direct-chat-timestamp pull-left">{{ date('d M, Y H:m A', strtotime($val->created_at)) }}</span>
                                        </div><!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="{{asset('assets/clientassets/images/man.png')}}" alt="message user image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {!!$val->reply!!}
                                        </div><!-- /.direct-chat-text -->
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                {!! Form::open(array('url' => 'reply_save')) !!}
                                <div class="box-body pad">
                                    <div class="form-group col-xs-12 ">
                                        {{ Form::textarea("reply",'',['id' => "reply_".$value->id,"class"=>'ck_edit']) }}
                                    </div>
                                    <div class="form-group col-xs-12">
                                        {!! Form::hidden('id',$value->id) !!}
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>

                                </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading">
                                <h4 class="panel-title">
                                    <span class="text">No Feedback</span>
                                </h4>
                            </div>
                        </div>
                        @endif
                    </div>
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div>

    </div>
</div>
@endsection