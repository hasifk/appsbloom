@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<?php $role = Auth::user()->role; ?>
<h3><b><center>Manage Teams</center></b></h3>
<section class="content">
    <div class="row" id='ourteam_add'>
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Our Teams</h3>
                    <div class="pagination-sm no-margin xs-pull">
                        <a href="<?php if ($role != "SuperAdm")
                        echo url('clients/our-teams/'.$ourteam[0]->id);
                        else
                        echo url('our-teams/'.$ourteam[0]->id);
                        ?>">
                            <span class="glyphicon glyphicon-arrow-left"></span>
                        </a>&nbsp;&nbsp;
                    </div>
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
                        {!! Form::text('name',$ourteam[0]->name,array("id"=>"name","class"=>"form-control","placeholder"=>"Name")) !!}
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="exampleInputEmail1">Email &nbsp;&nbsp;<span><i>(Optional)</i></span></label>
                        {!! Form::text('email',$ourteam[0]->email,array("id"=>"email","class"=>"form-control","placeholder"=>"Email")) !!}
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="exampleInputFile">Phone &nbsp;&nbsp;<span><i>(Optional)</i></span></label>
                        {!! Form::text('Phone',$ourteam[0]->phone,array("id"=>"phone","class"=>"form-control","placeholder"=>"Phone Number")) !!}

                    </div>
                    <div class="form-group col-xs-6">
                        <label for="exampleInputFile">Upload Photo</label>
                        {!! Form::file('image',$attributes = array("id"=>"exampleInputFile")) !!}

                    </div>
                    <div class="form-group col-xs-12">
                        <label for="exampleInputPassword1">About <span style="color:red;">*</span></label>
                        {{ Form::textarea('about',$ourteam[0]->about,['id' => 'about','class'=>'to_ck']) }}
                    </div>
                    <div class="form-group col-xs-12">
                    {{Form::hidden('id',$ourteam[0]->id) }}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div><!-- /.box-body -->

                
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection