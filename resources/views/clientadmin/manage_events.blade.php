@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Manage Events</center></b></h3>

   <section class="content" id="show_event_list_edit">
         <div class="col-md-6">
         <div class="box box-primary">
              

               {!! Form::open(array('url' => 'saveevent','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
            
          
            <div class="form-group">
            <label>Enter event Title</label>
        <input type="text" id="event_title" name="event_title" class="form-control"
         value="{{ old('event_title') }}" placeholder="event Title" >
                                  
                    @if ($errors->has('event_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_title') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

                  <div class="form-group">
            <label>Enter Required count</label>
    <input type="text" id="event_count" name="event_count" class="form-control" 
    value="{{ old('event_count') }}" placeholder="event Count" >
                
                    @if ($errors->has('event_count'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_count') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 
               <div class="form-group">
                    <label>Date and time range:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservationtime1">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
            <label>Enter event Action</label>
           <input type="text" id="event_action" name="event_action" class="form-control"
            value="{{ old('event_action') }}" placeholder="event Action">
                                  
                    @if ($errors->has('event_action'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_action') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

                 </div> <!-- /.box-body -->
                <div class="box-footer">
                <input type="submit" value="Save event" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
      </section>
<div class="col-md-12">
    <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row" id="show_event_list">
          @if(isset($event_list))
              @foreach($event_list as $key => $value)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <p>event Title:{{$value->title}}</p>
                  <p>event Count:{{$value->count}}</p>
                  <p>event Action:{{$value->action}}</p>

                  <div class="col-md-6">
<button class="glyphicon glyphicon-trash event_delete" style="color:red" name="{{$value->id}}"></button>
<button class="glyphicon glyphicon-pencil event_edit" style="color:red" name="{{$value->id}}"></button>
                </div>
              
             
              </div>
            </div>
            </div>
              @endforeach
              @endif
              </div>
              </section>
              </div>
            
       
@endsection