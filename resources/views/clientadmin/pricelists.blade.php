@extends('clientadmin.layouts.client_dashboard_layout')
@section('price-lists')

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Price Lists</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
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
                    <div class="box-body pad">
                        @if(!empty($pricelists->price_lists))
                        {!!$pricelists->price_lists!!}
                        @else
                        Empty Price Lists
                        @endif
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add/Update Price lists</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'pricelists_save')) !!} 
                {{ csrf_field() }}
                <textarea id="ck_editor" name="price_lists" rows="10" cols="80">
                                   @if(!empty($pricelists->price_lists) ||$pricelists->price_lists!='') {{$pricelists->price_lists}} @endif
                </textarea>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</div>
@endsection