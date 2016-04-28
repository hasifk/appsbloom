@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')
<h3><b><center>Welcome To Appsbloom Admin area</center></b></h3>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ url('users') }}" class="small-box-footer"> 
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </a>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ url('manageloyalty') }}" class="small-box-footer"> 
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Loyalty System</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </a>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ url('push_notification') }}" class="small-box-footer">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                        <p>Push Notifications</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </a>
        </div><!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            
            <a href="{{ url('coupons') }}" class="small-box-footer"> 
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Coupons</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </a>
            
        </div><!-- ./col -->
        
    </div><!-- /.row -->

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ url('manageevents') }}" class="small-box-footer">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Events</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </a>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ url('social') }}" class="small-box-footer"> 
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                        <p>Social</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div></a>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ url('manageanalytics') }}" class="small-box-footer"> <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Analytics</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div></a>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ url('feedback') }}" class="small-box-footer"> <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Feedback</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>

                </div></a>
        </div><!-- ./col -->
    </div><!-- /.row -->
</section>
@endsection