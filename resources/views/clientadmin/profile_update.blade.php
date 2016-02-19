@extends('clientadmin.layouts.client_dashboard_layout')
@section('find-us')
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Profile</h3>
                </div><!-- /.box-header -->
                {!! Form::open(array('url' => 'client_save')) !!}
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
                            <label for="name">Full Name</label>
                        {!! Form::text('name',Auth::user()->name,array("class"=>"form-control","placeholder"=>"Full Name")) !!}
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="email">E-mail ID</label>
                        {!! Form::text('email',Auth::user()->email,array("class"=>"form-control","placeholder"=>"Email Address")) !!}
                        </div>
                        <div class="form-group col-xs-12">
                            {!! Form::hidden('namechange',Auth::user()->id) !!}
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