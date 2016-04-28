@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<h3><b><center>Manage Users</center></b></h3>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" id="sorted_result">
                <div class="box-header with-border">


                    <div class="box-title pull-left"><a href="#users_add"> <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add User</button></a></div>
                    <div class="box-tools pagination-sm no-margin pull-right">
                        <?php echo $user_lists->links(); ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 20px">Sl No</th>
                                <th style="width: 10px"><input type="checkbox" id="selectall"/></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($user_lists) > 0):
                                $f = 1;
                                foreach ($user_lists as $val):
                                    ?>
                                    <tr id="booking_<?php echo $val->id; ?>">
                                        <th>{{$f++}}</th>
                                        <th><input type="checkbox" class="checkbox" name="check[]" value="{{$val->id}}" id="{{$val->id}}"/></th>
                                        <td class="booking_focus">{{$val->name}}</td><td>{{$val->email}}</td><td>{{$val->role}}</td><td>{{$val->created_at}}</td>
                                        <td class="booking_focus">
                                            <a class="user_delete" id="<?php echo $val->id ?>">
                                                <i style="color:red" class="fa fa-fw fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                                <tr><th colspan="7"><button class="mbooking_delete btn btn-primary" >Delete</button></th></tr>
                                <?php
                            else:
                                ?>
                                <tr><td colspan="7"> No Booking </td></tr>
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
        <div class="col-md-12" id="users_add">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Users</h3>
                </div><!-- /.box-header -->
                {!! Form::open(array('url' => 'userregistration')) !!}
                <div class="box-body">

                    <div class="row">
                        <div class="form-group col-xs-12">

                            <label>Name</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full name" 
                                       value="{{ old('name') }}" >
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div><!-- /.input group -->

                        <div class="form-group col-xs-12">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"  
                                       value="{{ old('email') }}" >
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div><!-- /.input group -->
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div><!-- /.form group -->
                        <div class="form-group col-xs-12">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div><!-- /.input group -->
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div><!-- /.form group -->
                        <div class="form-group col-xs-12">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="password"name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Retype password">
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            </div><!-- /.input group -->

                        </div><!-- /.form group -->

                        <div class="form-group col-xs-12">
                            <label>Role</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" name="role" id="role" class="form-control" placeholder="User Role cannot contains white space">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div><!-- /.input group -->
                            @if ($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                            @endif
                        </div><!-- /.form group -->

                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        
                    </div>
                </div><!-- /.box-body -->
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection