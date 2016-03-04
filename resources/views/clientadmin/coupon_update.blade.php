@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<h3><b><center>Manage Coupons</center></b></h3>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12" id="coupons_add">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Coupon</h3>
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
                            {!! Form::text('coupon_code',$coupons[0]->coupon_code,array("id"=>"coupon_code","class"=>"form-control","placeholder"=>"Coupon Code")) !!}
                        </div>
                        <div class="form-group col-xs-12">

                            <label>Coupon start and End Date</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {!! Form::text('date',$coupons[0]->start_date.' - '.$coupons[0]->end_date,array("class"=>"form-control pull-right","id"=>"reservationtime")) !!}
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group col-xs-12">
                            <label for="exampleInputPassword1">Coupon Description</label>
                            {{ Form::textarea('description',$coupons[0]->description,['id' => 'description','class'=>'to_ck']) }}
                        </div>
                        <div class="form-group col-xs-12"></div>
                        <div class="form-group col-xs-12">
                            {!! Form::hidden('id',$coupons[0]->id) !!}
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

</section>

@endsection