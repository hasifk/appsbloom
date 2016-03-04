@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<h3><b><center>Manage Social Links</center></b></h3>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Social Links</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'social_save','files'=>true,'role'=>"form")) !!}
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
                    <div class="form-group">
                        <label for="exampleInputEmail1">Facebook</label>
                        {!! Form::text('facebook',$social[0]->facebook,array("class"=>"form-control","placeholder"=>"my@facebook.com")) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Instagram</label>
                        {!! Form::text('instagram',$social[0]->instagram,array("class"=>"form-control","placeholder"=>"Instagram")) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Twitter</label>
                        {!! Form::text('twitter',$social[0]->twitter,array("class"=>"form-control","placeholder"=>"Twitter id")) !!}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    {!! Form::hidden('id',$social[0]->id) !!}
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection