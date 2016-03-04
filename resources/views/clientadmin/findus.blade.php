@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<h3><b><center>Find Us</center></b></h3>
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Find Us</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'coordinates_save','files'=>true,'role'=>"form")) !!}
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
                        <label for="exampleInputEmail1">Location</label>
                        {!! Form::text('location','',array("id"=>"location","class"=>"form-control","placeholder"=>"Cronulla Beach")) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Latitude</label>
                        {!! Form::text('lat','',array("id"=>"lat","class"=>"form-control","placeholder"=>"-33.923036")) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Longitude</label>
                        {!! Form::text('long','',array("id"=>"long","class"=>"form-control","placeholder"=>"151.274856")) !!}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>

        <div class="col-md-6">
<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Places and Geolocation Lists  </h3>
                <div class="box-tools pagination-sm no-margin pull-right">
                    <?php echo $location->links(); ?>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-responsive">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Location</th>
                        <th>Coordinates</th>
                        <th colspan="2">Actions</th>
                    </tr>

                    <?php
                    $loc = "";
                    if (count($location) > 0):
                        $f = 1;
                        $loc = "";
                        foreach ($location as $val):
                            $loc = $loc . '[' . "'$val->place'" . ',' . $val->lat . ',' . $val->long . '],';
                            echo "<tr>";
                            echo "<td>" . $f . "</td><td>" . $val->place . "</td><td>" . $val->lat . "," . $val->long . "</td>";
                            ?>
                            <td><a href="{{url('/findus_update/'.$val->id)}}" class="place_edit"><i class="fa fa-edit"></i></a></td>
                            <?php
                            echo "<td><a class=\"place_delete\" id=\"$val->id\"><i style=\"color:red\" class=\"fa fa-fw fa-trash-o\"></a></i>"
                            . "</td>";
                            echo "</tr>";
                        endforeach;
                    else:
                        ?>
                        <tr><td colspan="3"> No Places Added</td></tr>
                    <?php
                    endif;
                    ?>
                </table>
            </div><!-- /.box-body -->
        </div>
        </div>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div id="map" style="width: 100%; height: 500px;"></div>
        </div>

    </div>
</div>
<?php
if ($loc === "") {
    $loc = $loc . '["New Delhi, India",' . 28.38 . ',' . 77.12 . '],';
}
?>
<script>
// Define your locations: HTML content for the info window, latitude, longitude
var locations = [
<?php echo $loc; ?>
];
// Setup the different icons and shadows
var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: new google.maps.LatLng(locations[0][1], locations[0][2]),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});
var infowindow = new google.maps.InfoWindow();
var marker, i;
for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
    });

    google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
        return function () {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
        }
    })(marker, i));
    google.maps.event.addListener(marker, 'mouseout', (function (marker, i) {
        return function () {
            infowindow.close(map, marker);
        }
    })(marker, i));
}
</script> 
@endsection