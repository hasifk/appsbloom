@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Manage Services</center></b></h3>
<section class="content" id="show_service_list_edit">

    <div class="box box-primary">


        {!! Form::open(array('url' => Auth::user()->roleAccess('saveservice'),'files' => true)) !!} 
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label>Services</label>
                @if(count($service_list)>0)
                {{ Form::textarea('service_content',$service_list[0]->services,['id' => 'service_content','class'=>'to_ck']) }}
                <input type="hidden" name="id" value="{{ $service_list[0]->id }}">
                    @else
                    {{ Form::textarea('service_content','',['id' => 'service_content','class'=>'to_ck']) }}
                     @endif
                @if ($errors->has('service_content'))
                <span class="help-block">
                    <strong>{{ $errors->first('service_content') }}</strong>
                </span>
                @endif 
            </div>   
        </div> <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" value="Save" class="btn btn-primary"/>
        </div>
        {!! Form::close() !!}
    </div><!-- /.box -->

</section>



@endsection