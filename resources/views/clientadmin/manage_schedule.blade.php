@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Opening Hours & Days</center></b></h3>

   <section class="content">
          <div class="row">
            <div class="col-md-12">
               <div class="box">
              
                 <div class="box-body pad"> 
                 {!! Form::open(array('url' => 'saveschedule')) !!} 
                      {{ csrf_field() }}
           <textarea id="schedule_info" name="schedule_info" rows="10" cols="80" class="to_ck">
                                   @if(isset($schedule_info)) {{$schedule_info->schedule_info}} @endif
                    </textarea>
                    @if ($errors->has('schedule_info'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('schedule_info') }}</strong>
                                    </span>
                        @endif 
               
                    
                 
                 <input type="submit" value="GO" />
                 {!! Form::close() !!}
               </div>
              </div>
            </div><!-- /.col-->
          </div><!-- ./row -->
        </section>
@endsection