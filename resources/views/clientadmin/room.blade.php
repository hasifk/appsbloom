@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Rooms Details</h3>
                    <div class="box-tools pagination-sm no-margin pull-right">
                        <?php echo $rooms->links(); ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th>Rent</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody id="rooms">
                            <?php
                            if (count($rooms) > 0):
                                $f = 1;
                                foreach ($rooms as $val):
                                    echo "<tr id=\"room_$val->id\">";
                                    echo "<td>" . $f++ . "</td><td class=\"room_focus\">" . $val->type . "</td><td class=\"room_focus\">" . $val->capacity . " Persons</td><td>" . $val->rent . "</td>";
                                    ?>
                                <td class="room_focus"><a href="{{url('update-room/'.$val->id)}}" class="room_edit"><i class="fa fa-edit"></i></a></td>
                                <?php
                                echo "<td><a class=\"room_delete\" id=\"$val->id\"><i style=\"color:red\" class=\"fa fa-fw fa-trash-o\"></a></i>"
                                . "</td>";
                                echo "</tr>";
                                if (!empty($val->other)):
                                    echo "<tr id=\"room_$val->id\" class=\"others\"><td></td><td colspan=\"5\">" . $val->other . "</td></tr>";
                                endif;
                            endforeach;
                        else:
                            ?>
                            <tr><td colspan="3"> No Room Added</td></tr>
                        <?php
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Rooms</h3>
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
                            <label for="exampleInputEmail1">Room Type</label>
                            {!! Form::text('type','',array("id"=>"type","class"=>"form-control","placeholder"=>"Single,Double,Mini-Suite etc.")) !!}
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
                            '1',
                            array("id"=>"capacity","class"=>"form-control")) !!}

                        </div>
                        <div class="form-group col-xs-6">
                            <label for="exampleInputEmail1">Rent</label>
                            {!! Form::text('rent','',array("id"=>"rent","class"=>"form-control","placeholder"=>"400")) !!}
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="exampleInputPassword1">Other Details</label>
                            {{ Form::textarea('other','', ['id' => 'offer_info','class'=>'to_ck','placeholder'=>'Other Details']) }}
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