@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
               
                <div class="box-body no-padding">
                    <table class="table table-responsive">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th colspan="2">Actions</th>
                        </tr>
                       <?php $f=1; ?>
                                <tr>
                                <td><?php echo $f++; ?></td><td>{{ Auth::user()->name }}</td><td>{{ Auth::user()->email }}</td>
                                
                                <td><a href="{{url(Auth::user()->roleAccess('profile-update'))}}" class="place_edit"><i class="fa fa-edit"></i></a></td>
                                
                                <td><a class="place_delete"><i style="color:red" class="fa fa-fw fa-trash-o"></i></a>
                                </td>
                                </tr>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
@endsection