@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<h3><b><center>Manage Teams</center></b></h3>
<section class="content">
    <div class="row" id='ourteam_add'>
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add/Update Team Memebers</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => Auth::user()->roleAccess('ourteam_save'),'files'=>true,'role'=>"form")) !!}
                <div class="box-body">
                    <div class="form-group col-xs-12">
                        <label for="exampleInputPassword1">Our Teams</label>
                        @if(count($ourteam)>0)
                        {{ Form::textarea('about',$ourteam[0]->ourteams,['id' => 'about','class'=>'to_ck']) }}
                        <input type="hidden" name="id" value="{{ $ourteam[0]->id }}">
                        @else
                        {{ Form::textarea('about','',['id' => 'about','class'=>'to_ck']) }}
                        @endif
                        @if ($errors->has('about'))
                        <span class="help-block error-color">
                            <strong>{{ $errors->first('about') }}</strong>
                        </span>
                        @endif
                        
                    </div>
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.box-body -->
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection