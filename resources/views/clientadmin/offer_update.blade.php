@extends('clientadmin.layouts.client_dashboard_layout')
@section('offers')
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12" id="offers_add">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Offer</h3>
                </div><!-- /.box-header -->
                {!! Form::open(array('url' => 'offer_save')) !!}
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
                            <label>Offer start and End Date</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {!! Form::text('date',$offers[0]->start_date.' - '.$offers[0]->end_date,array("class"=>"form-control pull-right","id"=>"reservationtime")) !!}
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group col-xs-12">
                            <label for="exampleInputPassword1">Offer Description</label>
                            {{ Form::textarea('offer_info',$offers[0]->offer_info, ['id' => 'ck_editor']) }}
                        </div>
                        <div class="form-group col-xs-12"></div>
                        <div class="form-group col-xs-12">
                            {!! Form::hidden('id',$offers[0]->id) !!}
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