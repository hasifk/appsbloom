@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Manage Languages</center></b></h3>
    <div class="box-body" id="show_language_list">
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if(isset($language_list))
                    @foreach($language_list as $key => $value)
                       
                       <div class="panel panel-default" id="removal">
                           <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                               <h4 class="panel-title">
                                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">

                                       <span class="text">{{$value->language}}</span>
                                   </a>
                                   <!-- General tools such as edit or delete-->
                                   <span class="tools pull-right">
                                       {!! date('d - m - Y',strtotime($value->created_at))!!} &nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-edit language_edit" name="{{$value->id}}"></i>
                                       <i class="fa fa-trash-o language_delete" name="{{$value->id}}"></i>
                                   </span>
                               </h4>
                           </div>
                           <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                               <div class="panel-body">
                                 language Name:{{$value->language}}
                                
                                   
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
   <section class="content" id="show_language_list_edit">
         <div class="col-md-12">
         <div class="box box-primary">
              

               {!! Form::open(array('url' => 'savelanguage','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
            
          
            <div class="form-group">
            <label>Enter language Title</label>
        <input type="text" id="language" name="language" class="form-control"
         value="{{ old('language') }}" placeholder="Language Name" >
                                  
                    @if ($errors->has('language'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

         

                 </div> <!-- /.box-body -->
                <div class="box-footer">
                <input type="submit" value="Save language" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
      </section>
  

            
       
@endsection