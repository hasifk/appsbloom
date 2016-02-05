@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Manage Services</center></b></h3>

   <section class="content" id="show_service_list_edit">
         <div class="col-md-6">
         <div class="box box-primary">
              

               {!! Form::open(array('url' => 'saveservice','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
               <div class="form-group">
              <label>Upload Service Image</label>
              <input type="file" name="service_image" class="form-control" id="service_image">
              @if ($errors->has('service_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('service_image') }}</strong>
                                    </span>
                        @endif 
              </div>
          
              
            <div class="form-group">
            <label>Enter Service Description</label>
           <textarea id="service_content" name="service_content" class="form-control" rows="5" cols="80">
                                  
                    </textarea>
                    @if ($errors->has('service_content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('service_content') }}</strong>
                                    </span>
                        @endif 
               
                 </div>   
                 </div> <!-- /.box-body -->
                <div class="box-footer">
                <input type="submit" value="Save Service" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
      </section>
<div class="col-md-12">
    <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row" id="show_service_list">
          @if(isset($service_list))
              @foreach($service_list as $key => $value)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <img class="img-responsive pad" src="{{$value->image}}" alt="Photo">
                  <p>{{$value->description}}</p>
                  <div class="col-md-6">
<button class="glyphicon glyphicon-trash service_delete" style="color:red" name="{{$value->id}}"></button>
<button class="glyphicon glyphicon-pencil service_edit" style="color:red" name="{{$value->id}}"></button>
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