@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Manage Loyalty Program</center></b></h3>

   <section class="content" id="show_loyalty_list_edit">
         <div class="col-md-6">
         <div class="box box-primary">
              

               {!! Form::open(array('url' => 'saveloyalty','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
            
          
            <div class="form-group">
            <label>Enter Loyalty Title</label>
        <input type="text" id="loyalty_title" name="loyalty_title" class="form-control"
         value="{{ old('loyalty_title') }}" placeholder="Loyalty Title" >
                                  
                    @if ($errors->has('loyalty_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loyalty_title') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

                  <div class="form-group">
            <label>Enter Required count</label>
    <input type="text" id="loyalty_count" name="loyalty_count" class="form-control" 
    value="{{ old('loyalty_count') }}" placeholder="Loyalty Count" >
                
                    @if ($errors->has('loyalty_count'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loyalty_count') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

                  <div class="form-group">
            <label>Enter loyalty Action</label>
           <input type="text" id="loyalty_action" name="loyalty_action" class="form-control"
            value="{{ old('loyalty_action') }}" placeholder="Loyalty Action">
                                  
                    @if ($errors->has('loyalty_action'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loyalty_action') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

                 </div> <!-- /.box-body -->
                <div class="box-footer">
                <input type="submit" value="Save loyalty" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
      </section>
<div class="col-md-12">
    <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row" id="show_loyalty_list">
          @if(isset($loyalty_list))
              @foreach($loyalty_list as $key => $value)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <p>Loyalty Title:{{$value->title}}</p>
                  <p>Loyalty Count:{{$value->count}}</p>
                  <p>Loyalty Action:{{$value->action}}</p>

                  <div class="col-md-6">
<button class="glyphicon glyphicon-trash loyalty_delete" style="color:red" name="{{$value->id}}"></button>
<button class="glyphicon glyphicon-pencil loyalty_edit" style="color:red" name="{{$value->id}}"></button>
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