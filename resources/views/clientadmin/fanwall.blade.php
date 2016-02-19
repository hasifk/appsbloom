@extends('clientadmin.layouts.client_dashboard_layout')
@section('fanwall')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- TO DO List -->
            <div class="box box-primary" >
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Fanwall</h3>
                    <div class="box-tools pull-right">
                            <?php echo $fanwall->links(); ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if(count($fanwall)>0)
                        @foreach($fanwall as $value)
                        <?php $info=strip_tags($value->comment); ?>
                        <div class=" panel panel-default" id="removal">
                            <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">
                                        <span class="text">{!!Str::limit($info,50)!!}</span>
                                    </a>
                                    <!-- General tools such as edit or delete-->
                                    <span class="tools pull-right">
                                        {{date('d - m - Y',strtotime($value->created_at))}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {!! Form::select('status',array('0'=>'Pending','1' => 'Approved','-1'=>'Delete'),$value->status,array('id'=>$value->id,'class'=>'fanwall_status')); !!}
                                    </span>
                                </h4>
                            </div>
                            <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                                <div class="panel-body">
                                    {!!$value->comment!!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading">
                                <h4 class="panel-title">
                                        <span class="text">No Fanwall</span>
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