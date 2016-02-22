@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<div class="container-fluid">
    <div class="row" id='news_add'>
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update News</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'news_save')) !!}
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
                        <label for="exampleInputEmail1">Title</label>
                        {!! Form::text('title',$news[0]->title,array("id"=>"location","class"=>"form-control","placeholder"=>"New item released")) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">News</label>
                        {{ Form::textarea('news',$news[0]->news,['id' => 'news','class'=>'to_ck']) }}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::hidden('id',$news[0]->id) }}
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>



</div>
@endsection
