@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Manage Services</center></b></h3>
<div class="box-body" id="show_service_list">
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                         @if(isset($service_list))
                       
                         {!! $service_list->links() !!}
                       
              @foreach($service_list as $key => $value)
                       
                       <div class="panel panel-default" id="removal">
                           <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                               <h4 class="panel-title">
                                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">
                        <span class="text">{!!Str::limit($value->description,80)!!}</span>
                                   </a>
                                   <!-- General tools such as edit or delete-->
                                   <span class="tools pull-right">
                                       {!! date('d - m - Y',strtotime($value->created_at))!!} &nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-edit service_edit" name="{{$value->id}}"></i>
                                       <i class="fa fa-trash-o service_delete" name="{{$value->id}}"></i>
                                   </span>
                               </h4>
                           </div>
                           <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                               <div class="panel-body">
                               
                                <img class="img-responsive pad" src="{{$value->image}}" alt="Photo">
                               <p>{{$value->description}}</p>             
                               </div>
                           </div>
                       </div>
                       @endforeach

                       @else
                       <div class="panel panel-default">
                           <div class="panel-heading" role="tab" id="heading">
                               <h4 class="panel-title">
                                       <span class="text">No Services</span>
                               </h4>
                           </div>
                       </div>
                       @endif
                   </div>
               </div>
   <section class="content" id="show_service_list_edit">
         <div class="col-md-12">
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

            
       
@endsection