@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Booking Details</h3>
                    <div class="box-tools pagination-sm no-margin pull-right">
                        <?php echo $booking->links(); ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="booking">
                            <?php
                            if (count($booking) > 0):
                                $f = 1;
                                foreach ($booking as $val):
                                    echo "<tr id=\"booking_$val->id\">";
                                    echo "<td>" . $f++ . "</td><td class=\"booking_focus\">" . $val->name . "</td><td class=\"booking_focus\">" . $val->phone . "</td><td>" . $val->age . "</td><td>" . $val->date . "</td>";
                                    ?>
                                <td class="booking_focus"><a href="{{url('booking/'.$val->id)}}" class="booking_edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                {!! Form::select('status',array('0'=>'Pending','1' => 'Approved','-1'=>'Cancel'),$booking[0]->status,array('id'=>$booking[0]->id,'class'=>'booking_status')) !!}&nbsp;&nbsp;&nbsp;
                                <a class="booking_delete" id="<?php echo $val->id ?>"><i style="color:red" class="fa fa-fw fa-trash-o"></i></a></td>
                                        <?php
                                        
                                    endforeach;
                                else:
                                    ?>
                            <tr><td colspan="6"> No Booking Added</td></tr>
                        <?php
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>

</div>
@endsection