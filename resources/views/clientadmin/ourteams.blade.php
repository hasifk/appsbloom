@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Team Details</h3>
                    <div class="box-tools pagination-sm no-margin pull-right">
                        <?php echo $ourteam->links(); ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Photo</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="teams">
                            <?php
                            if (count($ourteam) > 0):
                                $f = 1;
                                foreach ($ourteam as $val):
                                    echo "<tr id=\"teams_$val->id\">";
                                    echo "<td>" . $f++ . "</td><td class=\"teams_focus\">" . $val->name . "</td><td class=\"teams_focus\">" . $val->email . "</td><td>" . $val->phone . "</td><td> <img src=" . asset($val->photo) . " style=\"width:90px;\"/></td>";
                                    ?>
                                <td class="teams_focus"><a href="{{url('our-teams/'.$val->id)}}" class="teams_edit"><i class="fa fa-edit"></i></a></td>
                                <?php
                                echo "<td><a class=\"teams_delete\" id=\"$val->id\"><i style=\"color:red\" class=\"fa fa-fw fa-trash-o\"></a></i>"
                                . "</td>";
                                echo "</tr>";
                                if (!empty($val->other)):
                                    echo "<tr id=\"teams_$val->id\" class=\"others\"><td></td><td colspan=\"5\">" . $val->other . "</td></tr>";
                                endif;
                            endforeach;
                        else:
                            ?>
                            <tr><td colspan="6"> No Teams Added</td></tr>
                        <?php
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
    <div class="row" id='ourteam_add'>
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Our Teams</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'ourteam_save','files'=>true,'role'=>"form")) !!}
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
                    <div class="form-group col-xs-6">
                        <label for="exampleInputEmail1">Name <span style="color:red;">*</span></label>
                        {!! Form::text('name','',array("id"=>"name","class"=>"form-control","placeholder"=>"Name")) !!}
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="exampleInputEmail1">Email &nbsp;&nbsp;<span><i>(Optional)</i></span></label>
                        {!! Form::text('email','',array("id"=>"email","class"=>"form-control","placeholder"=>"Email")) !!}
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="exampleInputFile">Phone &nbsp;&nbsp;<span><i>(Optional)</i></span></label>
                        {!! Form::text('Phone','',array("id"=>"phone","class"=>"form-control","placeholder"=>"Phone Number")) !!}

                    </div>
                    <div class="form-group col-xs-6">
                        <label for="exampleInputFile">Upload Photo<span style="color:red;">*</span></label>
                        {!! Form::file('image',$attributes = array("id"=>"exampleInputFile")) !!}

                    </div>
                    <div class="form-group col-xs-12">
                        <label for="exampleInputPassword1">About <span style="color:red;">*</span></label>
                        {{ Form::textarea('about','',['id' => 'about','class'=>'to_ck']) }}
                    </div>
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.box-body -->


                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</div>
@endsection