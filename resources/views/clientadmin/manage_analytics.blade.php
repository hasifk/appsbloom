@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>App Analytics</center></b></h3>

   <section class="content">
          <div class="row">
            <div class="col-md-12">
               
               
                 <div id="canvas-holder" style="width:30%;">
      <canvas id="chart-area" width="300" height="300"/>
               </div>
              
             
            </div><!-- /.col-->
          </div><!-- ./row -->
        </section>
@endsection