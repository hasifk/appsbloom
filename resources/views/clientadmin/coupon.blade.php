@extends('clientadmin.layouts.client_dashboard_layout')
@section('coupons')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <!-- TO DO List -->
            <div class="box box-primary" >
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Coupons</h3>
                    <div class="box-tools pull-right">
                        <?php echo $coupons->links(); ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if(count($coupons)>0)
                        @foreach($coupons as $value)
                        <div class="panel panel-default" id="removal">
                            <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">

                                        <span class="text">{{$value->coupon_code}}</span>
                                    </a>
                                    
                                    <!-- General tools such as edit or delete-->
                                    <span class="tools pull-right">
                                     {{date('d.m.Y h:i A',strtotime($value->start_date))." - ".date('d.m.Y h:i A',strtotime($value->end_date))}}&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="<?php echo url('update-coupons/' . $value->id) ?>"><i class="fa fa-edit"></i></a>
                                        <i class="fa fa-trash-o coupons_delete" id="{{$value->id}}"></i>
                                    </span>
                                </h4>
                            </div>
                            <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                                <div class="panel-body">
                                    {!!$value->description!!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading">
                                <h4 class="panel-title">
                                    <span class="text">No Coupons</span>
                                </h4>
                            </div>
                        </div>
                        @endif
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <a href="#coupons_add"> <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button></a>
                </div>
            </div><!-- /.box -->
        </div>
        <!-- left column -->
        <div class="col-md-12" id="coupons_add">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Coupon</h3>
                </div><!-- /.box-header -->
                {!! Form::open(array('url' => 'coupon_save')) !!}
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
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="exampleInputEmail1">Coupon Code</label>
                            {!! Form::text('coupon_code','',array("id"=>"coupon_code","class"=>"form-control","placeholder"=>"Coupon Code")) !!}
                        </div>
                        <div class="form-group col-xs-12">

                            <label>Coupon start and End Date</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {!! Form::text('date','',array("class"=>"form-control pull-right","id"=>"reservationtime")) !!}
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group col-xs-12">
                            <label for="exampleInputPassword1">Coupon Description</label>
                            {{ Form::textarea('description','', ['id' => 'ck_editor']) }}
                        </div>
                        <div class="form-group col-xs-12"></div>
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

</div>

@endsection