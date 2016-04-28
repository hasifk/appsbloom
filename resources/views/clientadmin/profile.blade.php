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


<div class="list card">
<div class="item">
<h2 class="post-title">Welcome</h2>
</div>

<div class="item item-body"><img ng-src="http://loddonphysiotherapy.co.uk/images/leisurecentre.jpg" src="http://loddonphysiotherapy.co.uk/images/leisurecentre.jpg" width="100%" />
<div class="ng-binding" dir="" ng-bind-html="postDataMain">
<p><strong>Loddon Physiotherapy Clinic is run by Dereham Physiotherapy and sports injury Clinic</strong> opened in April 2006 with the aim of providing a first class service in the diagnosis, treatment, rehabilitation and prevention of musculo-skeletal pain and injury.</p>
</div>
</div>

<div class="item">
<h2 class="post-title">The clinics</h2>
</div>

<div class="item item-body">
<div class="ng-binding" dir="" ng-bind-html="postDataMain">
<p><strong>Dereham Physiotherapy &amp; Sports Injury Clinic</strong> was established by early 2006, and moved into the&nbsp;<strong>Dereham Leisure Centre</strong> &nbsp;in April 2007. It is located within walking distance of the town centre, can be reached easily by public transport, has ample free parking and access for disabled patients.</p>

<p>The clinic has a fully equipped treatment room and as it is situated adjacent to a Fitness Studio, the Clinic has use of a wide range of Cardiovascular machines (including Treadmills, Cross-Trainers, Rowing Machines and Cycling Machines) and resistance machines and weights, allowing patients to be assessed in a functional and sporting environment, and also for individual Rehabilitation programs to be designed to aid recovery.</p>

<p>In a recent survey, 17% of patients rated the clinic&#39;s service as Very Good... the other 83% said it was Excellent!</p>
</div>
</div>
</div>
