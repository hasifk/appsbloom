@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Booking</h3>
                </div><!-- /.box-header -->
                {!! Form::open(array('url' => 'room_save')) !!}
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
                            <label for="exampleInputEmail1">Booking Type</label>
                            {!! Form::text('type',$rooms[0]->type,array("id"=>"type","class"=>"form-control","placeholder"=>"Single,Double,Mini-Suite etc.")) !!}
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="exampleInputEmail1">Capacity</label>
                            <?php
                            for ($i = 1; $i < 6; $i++)
                                $number[$i] = $i . " Persons";
                            $number[6] = "6 Above";
                        ?>
                            {!! Form::select('capacity',
                            $number,
                            $rooms[0]->capacity,
                            array("id"=>"capacity","class"=>"form-control")) !!}

                        </div>
                        <div class="form-group col-xs-6">
                            <label for="exampleInputEmail1">Rent</label>
                            {!! Form::text('rent',$rooms[0]->rent,array("id"=>"rent","class"=>"form-control","placeholder"=>"400")) !!}
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="exampleInputPassword1">Other Details</label>
                            {{ Form::textarea('other',$rooms[0]->other, ['id' => 'offer_info','class'=>'to_ck','placeholder'=>'Other Details']) }}
                        </div>
                        <div class="form-group col-xs-12"></div>
                        <div class="form-group col-xs-12">
                            {{ Form::hidden('id',$rooms[0]->id) }}
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