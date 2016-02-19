 @extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Manage Loyalty Program</center></b></h3>
<div class="box-body" id="show_loyalty_list">
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if(isset($loyalty_list))
                        {!! $loyalty_list->links() !!}
                    @foreach($loyalty_list as $key => $value)
                       
                       <div class="panel panel-default" id="removal">
                           <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                               <h4 class="panel-title">
                                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">

                                       <span class="text">{{$value->title}}</span>
                                   </a>
                                   <!-- General tools such as edit or delete-->
                                   <span class="tools pull-right">
                                       {!! date('d - m - Y',strtotime($value->created_at))!!} &nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-edit loyalty_edit" name="{{$value->id}}"></i>
                                       <i class="fa fa-trash-o loyalty_delete" name="{{$value->id}}"></i>
                                   </span>
                               </h4>
                           </div>
                           <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                               <div class="panel-body">
                                <p>Loyalty Title:{{$value->title}}</p>
                                <p>Loyalty Count:{{$value->count}}</p>
                                <p>Stamp Code:{{$value->stamp_code}}</p>
                                <p>Loyalty Action:{{$value->action}}</p>
                                   
                               </div>
                           </div>
                       </div>
                       @endforeach
                       @else
                       <div class="panel panel-default">
                           <div class="panel-heading" role="tab" id="heading">
                               <h4 class="panel-title">
                                       <span class="text">No Language Keys</span>
                               </h4>
                           </div>
                       </div>
                       @endif
                   </div>
               </div>
   <section class="content" id="show_loyalty_list_edit">
         <div class="col-md-12">
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
            <label>Enter 4 digit stamp code</label>
    <input type="text" id="stamp_code" name="stamp_code" class="form-control" 
    value="{{ old('stamp_code') }}" placeholder="Stamp Code" >
                
                    @if ($errors->has('stamp_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stamp_code') }}</strong>
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

            
       
@endsection