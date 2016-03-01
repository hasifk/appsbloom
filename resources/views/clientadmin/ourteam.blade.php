@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$ourteam[0]->name}}</h3>
                    <div class="pagination-sm no-margin xs-pull">
                        <a href="{{ url('our-teams') }}">
                            <span class="glyphicon glyphicon-arrow-left"></span>
                        </a>&nbsp;&nbsp;
                        <a href="{{url('update-ourteam/'.$ourteam[0]->id)}}" class="teams_edit"><i class="fa fa-edit"></i></a>
                        <a class="teams_delete" id="{{$ourteam[0]->id}}"><i style="color:red" class="fa fa-fw fa-trash-o"></i></a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="col-xs-12 col-md-2 box-header border-right pull-left image">
                        <img src="{{asset($ourteam[0]->photo)}}" width="150" height="150">
                        <div class="col-xs-12 col-md-12 box-header with-border">
                            {{$ourteam[0]->phone}}
                        </div>
                        <div class="col-xs-12 col-md-12 box-header with-border">
                            {{$ourteam[0]->email}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-10">
                        {!!$ourteam[0]->about!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
