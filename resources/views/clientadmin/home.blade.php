@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<h3><b><center>Manage Home</center></b></h3>
<section class="content">
    <div class="row" id='home_add'>
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add/Update Home</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => Auth::user()->roleAccess('home_save'))) !!}
                <div class="box-body">
                    @if(count($home)>0)
                    <div class="form-group">
                        {{ Form::textarea('home_content',$home[0]->home,['id' => 'home_content','class'=>'to_ck']) }}
                    </div>
                    <input type="hidden" name="id" value="{{ $home[0]->id }}">
                    @else
                    {{ Form::textarea('home_content','',['id' => 'home_content','class'=>'to_ck']) }}
                    @endif
                </div><!-- /.box-body -->

                <div class="box-footer">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection