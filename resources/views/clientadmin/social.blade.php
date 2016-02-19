@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<div class="container-fluid">
    @if(count($social))
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Social Links</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">

            <?php
            $user[0] = "Facebook";
            $user[1] = "Instagram";
            $user[2] = "Twitter";
            $f = 0;
            ?>
            
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Facebook</th>
                        <td>{{$social[0]->facebook}}</td>
                        <th>
                            @if(!empty($social[0]->facebook))
                            <span class="tools">
                                <a href="<?php echo url('update-social/' . $social[0]->id) ?>"><i class="fa fa-edit"></i></a>
                            </span>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th>Instagram</th>
                        <td>{{$social[0]->instagram}}</td>
                        <th>
                            @if(!empty($social[0]->instagram))
                            <span class="tools">
                                <a href="<?php echo url('update-social/' . $social[0]->id) ?>"><i class="fa fa-edit"></i></a>
                            </span>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th>Twitter</th>
                        <td>{{$social[0]->twitter}}</td>
                        <th>
                            @if(!empty($social[0]->twitter))
                            <span class="tools">
                                <a href="<?php echo url('update-social/' . $social[0]->id) ?>"><i class="fa fa-edit"></i></a>
                            </span>
                            @endif
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @else
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Social links</h3>
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
                            {!! Form::text('facebook','',array("class"=>"form-control","placeholder"=>"my@facebook.com")) !!}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Instagram</label>
                            {!! Form::text('instagram','',array("class"=>"form-control","placeholder"=>"Instagram")) !!}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Twitter</label>
                            {!! Form::text('twitter','',array("class"=>"form-control","placeholder"=>"Twitter id")) !!}
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.box -->
            </div>
        </div>
    </section>
    @endif
</div> 
@endsection